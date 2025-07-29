<?php

namespace App\Livewire\Lainnya;

use App\Models\Output\TApht;
use App\Services\Lainnya\TAphtServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TAphtLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    public $perPage = 10;
    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';
    // For filter
    public $sortBy = 'created_at', $sortDir = 'desc';
    public $kc = false, $id_cabang = 99, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    // for modal
    public $modal_title, $metode, $id_table;
    public $nomor, $sertifikat, $jns_perikatan, $progress, $inp_tgl_awal, $inp_tgl_akhir, $keterangan, $status_akhir, $data = [];

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'updateSummernote', 'StoreData', 'UpdateData'];

    // load service
    protected TAphtServices $tapht_services;
    public function boot(TAphtServices $tapht_services)
    {
        $this->tapht_services = $tapht_services;
    }

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
    }



    // for status
    public function ShowModal($metode, $id)
    {
        if ($metode == 'Add') {
            $this->modal_title = 'Add Data Tracking APHT';
            $this->dispatch('initializeSummernote');
        } else if ($metode == 'Edit') {
            $this->modal_title = 'Edit Data Tracking APHT';
            $this->id_table = $id;

            $tapht = $this->tapht_services->showEdit($id);
            $this->fill($tapht);
            $this->inp_tgl_awal = Carbon::parse($this->inp_tgl_awal)->format('Y-m-d');
            $this->inp_tgl_akhir = Carbon::parse($this->inp_tgl_akhir)->format('Y-m-d');
            $this->dispatch('setSummernoteContent', [
                'keterangan' => $this->keterangan,
            ]);
        }

        $this->metode = $metode; //untuk edit/create
    }

    // for modal hide
    public function HideModal()
    {
        $this->reset(['metode', 'modal_title', 'nomor', 'sertifikat', 'jns_perikatan', 'progress', 'inp_tgl_awal', 'inp_tgl_akhir', 'keterangan', 'status_akhir', 'id_table']);
        $this->js("window.dispatchEvent(new Event('resetSummernote'))");
    }


    public function updateSummernote($field, $value)
    {
        $this->$field = $value;
    }



    public function StoreData()
    {
        $data = $this->tapht_services->addData($this->all());
        $this->reset(['metode', 'modal_title', 'nomor', 'sertifikat', 'jns_perikatan', 'progress', 'inp_tgl_awal', 'inp_tgl_akhir', 'keterangan', 'status_akhir', 'id_table']);

        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', [
            'message' => 'Data berhasil ditambahkan!',
            'userId' => Crypt::encrypt($data->id)
        ]);
    }



    public function UpdateData()
    {
        $data = $this->tapht_services->editData($this->all());
        $this->reset(['metode', 'modal_title', 'nomor', 'sertifikat', 'jns_perikatan', 'progress', 'inp_tgl_awal', 'inp_tgl_akhir', 'keterangan', 'status_akhir', 'id_table']);

        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', [
            'message' => 'Data berhasil diubah!',
            'userId' => Crypt::encrypt($data->id_tapht)
        ]);
    }



    public function render()
    {
        $tapht = $this->tapht_services->index($this->all());

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.tapht.t-apht-livewire', compact('tapht'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Tracking APHT'])->section('livewire-konten');
    }


    // BARU SAMPE SINI SHOW/ADD/EDIT BELOM
}
