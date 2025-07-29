<?php

namespace App\Livewire\MasterPK;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Models\Output\LogActivity;
use App\Models\Output\TrackingSPK;
use App\Services\PerjanjianKredit\PK\AddendumServices;
use App\Services\PerjanjianKredit\PK\PkServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AddendumLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    // For filter
    public $sortBy = 'created_at', $sortDir = 'desc', $search = '', $perPage = 10;
    public $kc = false, $id_cabang, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    // for modal
    public $modal_title, $spk = [], $status, $catatan, $keterangan_kaops = 0, $id;
    // load services
    protected PkServices $pk_services;
    protected AddendumServices $add_services;
    public function boot(PkServices $pk_services, AddendumServices $add_services)
    {
        $this->pk_services = $pk_services;
        $this->add_services = $add_services;
    }

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'updateSummernote', 'StoreData', 'UpdateData', 'UpdateStatus'];

    public function mount()
    {
        switch (Auth::user()->level) {
            case 'DIREKTUR':
            case 'SUPER USER':
                $this->kc = true;
                $this->id_cabang = 99;
                $this->id_area_1 = [1, 2, 3, 7, 10, 11];
                $this->id_area_2 = [4, 5, 6, 8, 9];
                $this->id_area_3 = [3, 10];
                break;

            case 'AREA 1':
                $this->kc = true;
                $this->id_cabang = null;
                $this->id_cab_area = [1, 2, 3, 7, 10, 11];
                break;

            case 'AREA 2':
                $this->kc = true;
                $this->id_cabang = null;
                $this->id_cab_area = [4, 5, 6, 8, 9];
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
    public function ShowModal($metode, $id)
    {
        $this->reset('spk'); // Reset untuk mencegah cache data lama
        if ($metode == 'Add') {
            $this->modal_title = 'Add Data MUK';
        } else {
            $pkpmk = PkPmkAddendum::find(base64_decode($id));
            $this->modal_title = 'Approve Data Perjanjian Kredit SPK: ' . $pkpmk->kredit->no_spk;
        }
        $this->dispatch('initializeSummernote');
        // pemanggilan ulang JS
        $this->dispatch('RebindJS');
        $this->dispatch('inisialSelect2');
        $this->id = $id;
    }

    // hide modal
    public function HideModal()
    {
        $this->reset(['modal_title', 'catatan', 'id']);
        $this->js("window.dispatchEvent(new Event('resetSummernote'))");
    }


    // approve
    public function SendKaops($status, $id)
    {
        $ids = base64_decode($id);
        $pkpmk = PkPmkAddendum::find($ids);
        $user = Auth::user();

        // update kredit
        $kredit = Kredit::find($pkpmk->id_kredit);
        $kredit->update([
            'status_legal' => 'Terkirim',
            'status_kredit' => 'Data Dikirim Ke Kasi Operasional',
        ]);

        // Log Aktivitas
        LogActivity::AddLog("(cs) Data PK | SPK: {$pkpmk->kredit->no_spk} | NIK: {$pkpmk->debitur->nik} | Nama: {$pkpmk->debitur->nama_debitur}");

        // tracking lama
        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', $user->jabatan)
            ->orderByDesc('id_tracking')
            ->first();
        $tracking->update([
            'nama' => $user->nama,
            'status' => $this->status == 'Approve' ? 'Selesai' : 'Created & Sended',
            'tgl_status' => now(),
            'status_spk' => $this->status == 'Approve' ? 'Selesai' : 'Created & Sended',
        ]);

        // tracking selanjutnya
        TrackingSPK::AddTrackingSPK($kredit, [
            'id_cabang' => $kredit->id_cabang,
            'id_kredit' => $kredit->id_kredit,
            'petugas_penerima' => $kredit->petugas_penerima,
            'nama' => null,
            'jabatan' => 'Kasi Operasional',
            'status' => null,
            'tgl_masuk' => now(),
            'status_spk' => 'Disetujui',
        ]);

        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil diubah status!', 'id' => Crypt::encrypt($kredit->id_kredit)]);
    }


    // kaops
    public function UpdateStatus()
    {
        $ids = base64_decode($this->id);
        $pkpmk = PkPmkAddendum::find($ids);
        $user = Auth::user();

        // update kredit
        $kredit = Kredit::find($pkpmk->id_kredit);
        $kredit->update([
            'status_kaops' => 'Approve',
            'status_kredit' => 'Kasi Operasional Approve',
            'catatan_kaops' => $this->catatan . '<b> » Added at: ' . now()->format('d-m-Y, H:i') . '</b>',
            'keterangan_kaops' => $this->keterangan_kaops
        ]);

        // Log Aktivitas
        LogActivity::AddLog("(cs) Data PK | SPK: {$pkpmk->kredit->no_spk} | NIK: {$pkpmk->debitur->nik} | Nama: {$pkpmk->debitur->nama_debitur}");

        // tracking lama
        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', $user->jabatan)
            ->orderByDesc('id_tracking')
            ->first();

        $tracking->update([
            'nama' => $user->nama,
            'status' => 'Approve',
            'tgl_status' => now(),
            'status_spk' => 'Disetujui',
        ]);

        // tracking selanjutnya
        TrackingSPK::AddTrackingSPK($kredit, [
            'id_cabang' => $kredit->id_cabang,
            'id_kredit' => $kredit->id_kredit,
            'petugas_penerima' => $kredit->petugas_penerima,
            'nama' => null,
            'jabatan' => 'Legal',
            'status' => null,
            'tgl_masuk' => now(),
            'status_spk' => 'Disetujui',
        ]);

        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil diubah status!', 'id' => Crypt::encrypt($kredit->id_kredit)]);
    }

    public function render()
    {
        // ini untuk show SPK yang akan ditambahkan MUK
        $this->spk = Kredit::where('id_cabang', Auth::user()->id_cabang)
            ->where('status_akhir', 'DISETUJUI')
            ->where('status_pincab', 'Approve')
            ->where('status_analis', '!=', 'Dikembalikan')
            ->where('status_legal', '=', null)
            ->where('kategori_spk', '!=', 'SPK')
            ->orderBy('no_spk', 'desc')
            ->get();

        $pkpmk = $this->add_services->index($this->all());

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.master-p-k.addendum-livewire', compact('pkpmk'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Data Addendum'])
            ->section('livewire-konten');
    }
}
