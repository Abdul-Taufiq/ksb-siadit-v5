<?php

namespace App\Livewire\Lainnya;

use App\Models\Output\Version;
use App\Services\Lainnya\VersionServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LogAppVersion extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // For filter
    public $sortBy = 'created_at', $sortDir = 'desc';
    public $kc = false, $id_cabang = 99, $tgl_awal,  $tgl_akhir;
    // for modal
    public $modal_title, $metode, $id_table, $kode_versi, $pembaruan, $pembaruan_detail, $file, $tgl_rilis, $config_hapus = false;

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'updateSummernote', 'StoreData', 'UpdateData'];

    // load services
    protected VersionServices $versi_service;

    public function boot(VersionServices $versionServices)
    {
        $this->versi_service = $versionServices;
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
            $this->modal_title = 'Add Data Log Version';
            $this->dispatch('initializeSummernote');
        } else if ($metode == 'Edit') {
            $this->modal_title = 'Add Data Log Version';
            $this->id_table = $id;
            $versi = $this->versi_service->showData($id);
            $this->fill($versi);
            $this->tgl_rilis = Carbon::parse($this->tgl_rilis)->format('Y-m-d');
            $this->dispatch('setSummernoteContent', [
                'pembaruan' => $this->pembaruan,
                'pembaruan_detail' => $this->pembaruan_detail
            ]);
        } else {
            $versi = $this->versi_service->showData($id);
            $this->fill($versi);
            $this->tgl_rilis = Carbon::parse($this->tgl_rilis)->translatedFormat('d F Y');
        }

        $this->metode = $metode; //untuk edit/create
    }

    // for modal hide
    public function HideModal()
    {
        $this->reset(['metode', 'modal_title', 'kode_versi', 'pembaruan', 'pembaruan_detail', 'file', 'tgl_rilis', 'id_table']);
        $this->js("window.dispatchEvent(new Event('resetSummernote'))");
    }


    public function updateSummernote($field, $value)
    {
        $this->$field = $value;
    }


    public function StoreData()
    {
        $data = $this->versi_service->addData($this->all());
        $this->reset(['metode', 'modal_title', 'kode_versi', 'pembaruan', 'pembaruan_detail', 'file', 'tgl_rilis', 'id_table']);

        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', [
            'message' => 'Data berhasil ditambahkan!',
            'userId' => Crypt::encrypt($data->id)
        ]);
    }


    public function UpdateData()
    {
        $data = $this->versi_service->editData($this->all());
        $this->reset(['metode', 'modal_title', 'kode_versi', 'pembaruan', 'pembaruan_detail', 'file', 'tgl_rilis', 'id_table']);

        // 🔥 Kirim event ke Livewire atau JavaScript
        $this->dispatch('AlertSuccess', [
            'message' => 'Data berhasil diubah!',
            'userId' => Crypt::encrypt($data->id)
        ]);
    }


    public function render()
    {
        $version = Version::search($this->search)
            ->when($this->tgl_awal && $this->tgl_akhir, function ($query) {
                $awal = Carbon::parse($this->tgl_awal)->startOfDay();
                $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();
                $query->whereBetween('tgl_rilis', [$awal, $akhir]);
            })
            ->orderBy($this->sortBy, $this->sortDir);

        // paginate
        if ($this->perPage == 'All') {
            $total = $version->count();
            $version = $version->paginate($total > 0 ? $total : 1);
        } else {
            $version = $version->paginate($this->perPage);
        }

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.log-app-version', compact('version'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Log Version'])->section('livewire-konten');
    }
}
