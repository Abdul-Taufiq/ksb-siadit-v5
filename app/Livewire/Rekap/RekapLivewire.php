<?php

namespace App\Livewire\Rekap;

use App\Traits\RekapTraits;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RekapLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, RekapTraits;
    // for filter
    public $sortBy = 'created_at', $sortDir = 'desc', $search = '', $perPage = 10;
    public $kc = false, $id_cabang, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    // for modal
    // public $modal_title, $spk = [], $status, $catatan, $keterangan_kaops = 0, $id;

    public function boot()
    {
        // $this->pk_services = $pk_services;
        // $this->add_services = $add_services;
    }


    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'tableUpdated'];

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
        $this->reset(['search', 'tgl_awal', 'tgl_akhir', 'id_cabang', 'sortBy']);
        $this->resetPage();
        $this->mount();
    }


    public function render()
    {
        $kredit = $this->index();


        /** @disregard P1013 Undifined method */
        return view('livewire.rekap.rekap-livewire', compact('kredit'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Rekap Data SPK'])
            ->section('livewire-konten');
    }
}
