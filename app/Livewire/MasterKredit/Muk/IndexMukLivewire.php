<?php

namespace App\Livewire\MasterKredit\Muk;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Persetujuan;
use App\Models\MasterMUK\Muk;
use App\Models\Output\TrackingSPK;
use App\Services\MasterKredit\Muk\MukService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class IndexMukLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    // For filter
    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $tgl_awal,  $tgl_akhir, $search = '';

    public $sortBy = 'created_at', $sortDir = 'desc', $perPage = 10;
    public $kc = false, $id_cabang, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    // for modal
    public $modal_title, $spk = [], $id_kredit, $file_putusan, $metode;
    public $plafond, $jkw, $bunga, $plafond_cek, $jkw_cek, $bunga_cek = null;
    // load services
    protected MukService $mukservice;
    public function boot(MukService $muk_service)
    {
        $this->mukservice = $muk_service;
    }

    // public function __construct()
    // {
    //     $this->mukservice = app(MukService::class);
    // }



    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'updateSummernote', 'StoreData', 'UpdateData', 'ChangeStatus'];

    public function mount()
    {
        switch (Auth::user()->level) {
            case 'DIREKTUR':
            case 'SUPER USER':
                $this->kc = true;
                $this->id_cabang = 99;
                $this->id_area_1 = [4, 5, 6, 7, 8, 9];
                $this->id_area_2 = [1, 2, 3, 10, 11];
                $this->id_area_3 = [3, 10];
                break;

            case 'AREA 1':
                $this->kc = true;
                $this->id_cabang = null;
                $this->id_cab_area = [4, 5, 6, 7, 8, 9];
                break;

            case 'AREA 2':
                $this->kc = true;
                $this->id_cabang = null;
                $this->id_cab_area = [1, 2, 3, 10, 11];
                break;

            case 'AREA 3':
                $this->kc = true;
                $this->id_cabang = null;
                $this->id_cab_area = [3, 10];
                break;

            default:
                $this->kc = false;
                $this->id_cabang = Auth::user()->id_cabang;
                break;
        }
    }


    // sett sortir
    public function setSortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDir = 'asc';
        }
        $this->sortBy = $field;
    }


    public function resetFilter()
    {
        $this->reset(['search', 'tgl_awal', 'tgl_akhir', 'id_cabang']);
        $this->resetPage();
        $this->mount();
    }


    // modal
    public function ShowModal($status, $no_spk, $id)
    {
        $this->reset('spk'); // Reset untuk mencegah cache data lama

        if ($status == 'Approve') {
            $this->modal_title = 'Approve Data MUK - ' . $no_spk;
            $this->id_kredit = $id;
        } else if ($status == 'Reject') {
            $this->modal_title = 'Reject Data MUK - ' . $no_spk;
            $this->id_kredit = $id;
        }
        $this->dispatch('inisialSelect2');

        $this->metode = $status;
    }

    // hide modal
    public function HideModal()
    {
        $this->reset(['modal_title', 'id_kredit', 'file_putusan']);
        $this->js("window.dispatchEvent(new Event('resetSelect2'))");
    }

    public function addData()
    {
        return view('livewire.master-kredit.muk.add-muk');
    }


    // status MUK selain cabang
    public function ChangeStatus()
    {
        $file = $this->file_putusan;
        $fileName = 'putusan_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('file_upload/putusan', $fileName, 'public'); // lebih aman dan Livewire-friendly

        $id_kre = base64_decode($this->id_kredit);
        $muk = Muk::where('id_kredit', $id_kre)->first();
        $muk->file_putusan = $fileName;
        $muk->status_kakom = $this->metode;
        $muk->save();

        // update kredit
        $kredit = Kredit::find($id_kre);
        $kredit->status_akhir = $this->metode == 'Approve' ? 'DISETUJUI' : 'DITOLAK';
        $kredit->status_kredit = $this->metode == 'Approve' ? 'DISETUJUI Oleh ' . $kredit->persetujuan->putusan : 'DITOLAK Oleh ' . $kredit->persetujuan->putusan;
        $kredit->save();

        // tracking lama
        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', 'Analis Cabang')
            ->orderByDesc('id_tracking')
            ->first();
        // update trackingnya
        $tracking->update([
            'nama' => Auth::user()->nama,
            'status' => $this->metode == 'Approve' ? 'Approve' : ($this->metode == 'Reject' ? 'Reject' : 'Debitur Cencel'),
            'tgl_status' => now(),
            'status_spk' =>  $this->metode == 'Approve' ? 'DISETUJUI Oleh ' . $kredit->persetujuan->putusan : 'DITOLAK Oleh ' . $kredit->persetujuan->putusan,
        ]);

        if ($this->metode == 'Approve') {
            TrackingSPK::AddTrackingSPK($kredit, [
                'id_cabang' => $kredit->id_cabang,
                'id_kredit' => $kredit->id_kredit,
                'petugas_penerima' => $kredit->petugas_penerima,
                'nama' => null,
                'jabatan' => 'Legal',
                'status' => null,
                'tgl_masuk' => now(),
                'status_spk' => 'Proses',
            ]);
        }


        // UPDATE PLAFOND, JKW, BUNGA DAN P.A.S
        // PERSETUJUAN PINCAB
        $persetujuan = Persetujuan::where('id_kredit', $kredit->id_kredit)->first();
        if ($this->bunga_cek == true) {
            $persetujuan->besar_bunga = $persetujuan->besar_bunga_muk;
        } else {
            $persetujuan->besar_bunga = $this->normalizeNumber($this->bunga);
        }
        // save
        $persetujuan->save();

        if ($this->plafond_cek == true) {
            $kredit->jumlah_disetujui = $kredit->jumlah_muk;
        } else {
            $kredit->jumlah_disetujui = $this->normalizeNumber($this->plafond);
        }

        if ($this->jkw_cek == true) {
            $kredit->jkw = $kredit->jkw_muk;
        } else {
            $kredit->jkw = $this->normalizeNumber($this->jkw);
        }
        // save
        $kredit->save();

        // UPDATE JUMLAH ANGSURAN DAN BIAYA P.A.S
        if ($this->bunga_cek == false || $this->plafond_cek == false || $this->jkw_cek == false) {
            if ($persetujuan->jns_kredit == 'Berjangka') {
                $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * ($persetujuan->besar_bunga / 100) * 31) / 360);
            } else {
                if ($persetujuan->jns_bunga == 'ANUITAS') {
                    $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * (($kredit->besar_bunga / 12) * (1 + $kredit->besar_bunga / 12) ** $kredit->jkw)) / ((1 +  $kredit->besar_bunga / 12) ** $kredit->jkw - 1));
                    // total = (plafond * ((bungaValue / 12) * (1 + bungaValue / 12) ** jkwValue)) / ((1 + bungaValue / 12) ** jkwValue - 1);
                } else {
                    $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * ($persetujuan->besar_bunga / 100) / 12) + ($kredit->jumlah_disetujui / $kredit->jkw));
                }
            }

            // biaya pas
            $persetujuan->jumlah_provisi = ($kredit->jumlah_disetujui * $persetujuan->provisi) / 100;
            $persetujuan->biaya_adm = ($kredit->jumlah_disetujui * $persetujuan->besar_adm) / 100;
            $persetujuan->biaya_survey = ($kredit->jumlah_disetujui * $persetujuan->besar_survey) / 100;
            $persetujuan->save();

            $persetujuan->update([
                'denda_hari' => (2 / 1000) * $persetujuan->jumlah_angsuran
            ]);
        }

        $this->reset('file_putusan');
        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', [
            'message' => 'Data berhasil diubah!',
            'userId' => sha1($muk->id_muk)
        ]);
    }


    public function render()
    {

        // ini untuk show SPK yang akan ditambahkan MUK
        // $this->spk = Kredit::whereNull('status_analis')
        $query = Kredit::whereNull('status_analis')
            ->whereNull('status_muk')
            ->where(function ($query) {
                $query->where('status_ao', 'Terkirim')
                    ->orWhere('status_ao', 'Approve');
            })
            ->orderBy('id_kredit', 'desc');

        switch (Auth::user()->sub_jabatan) {
            case 'Analis Cabang (ALT)':
                $query->where('id_cabang', Auth::user()->id_cabang);
                break;
            case 'Staf Analis Area':
                $query->whereIn('id_cabang', $this->id_cab_area);
                break;

            default:
                $query->where('id_cabang', Auth::user()->id_cabang);
                break;
        }

        $this->spk = $query->get();

        // ini untuk data yg tampil di table
        $muk = $this->mukservice->index($this->all());


        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.master-kredit.muk.index-muk-livewire', compact('muk'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Data MUK'])
            ->section('livewire-konten');
    }



    // fungsi normal untuk setting number
    function normalizeNumber($value)
    {
        if ($value === '∞') {
            return 0;
        }

        $value = str_replace('.', '', $value); // hapus ribuan
        $value = str_replace(',', '.', $value); // ubah desimal
        return floatval($value);

        // normalnya
        // $nilai = "49.000,89";
        // $jumlah_pengajuan = str_replace(',', '.', str_replace('.', '', $data['rate_1']));
    }
}
