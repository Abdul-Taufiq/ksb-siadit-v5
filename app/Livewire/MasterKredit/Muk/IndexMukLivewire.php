<?php

namespace App\Livewire\MasterKredit\Muk;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterMUK\Muk;
use App\Services\MasterKredit\Muk\MukService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class IndexMukLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    // For filter
    public $sortBy = 'created_at', $sortDir = 'desc', $search = '', $perPage = 10;
    public $kc = false, $id_cabang, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    // for modal
    public $modal_title, $spk = [];
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
    protected $listeners = ['refreshTable' => '$refresh', 'updateSummernote', 'StoreData', 'UpdateData'];

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
    public function showModal($metode, $id)
    {
        $this->reset('spk'); // Reset untuk mencegah cache data lama

        if ($metode == 'Add') {
            $this->modal_title = 'Add Data MUK';
        } else if ($metode == 'Show') {
            $this->modal_title = 'Show Data MUK';
        }
        $this->dispatch('inisialSelect2');
    }

    // hide modal
    public function HideModal()
    {
        $this->reset(['modal_title']);
        $this->js("window.dispatchEvent(new Event('resetSelect2'))");
    }

    public function addData()
    {
        return view('livewire.master-kredit.muk.add-muk');
    }


    public function render()
    {

        // ini untuk show SPK yang akan ditambahkan MUK
        $this->spk = Kredit::where('id_cabang', Auth::user()->id_cabang)
            ->whereNull('status_analis')
            ->whereNull('status_muk')
            ->where(function ($query) {
                $query->where('status_ao', 'Terkirim')
                    ->orWhere('status_ao', 'Approve');
            })
            ->orderBy('id_kredit', 'desc')
            ->get();

        // ini untuk data yg tampil di table
        $muk = $this->mukservice->index($this->all());


        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.master-kredit.muk.index-muk-livewire', compact('muk'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Data MUK'])
            ->section('livewire-konten');
    }
}
