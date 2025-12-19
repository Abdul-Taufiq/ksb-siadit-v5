<?php

namespace App\Livewire\Lainnya;

use App\Traits\JaminanTrait;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class JaminanTanahLivewire extends Component
{
    use WithPagination, WithoutUrlPagination, JaminanTrait;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $kc = false, $id_cabang, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'tableUpdated'];


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
        $this->reset(['search', 'tgl_awal', 'tgl_akhir']);
        $this->resetPage();
    }


    public function render()
    {
        $jaminan = $this->index();

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.jaminan-tanah-livewire', compact('jaminan'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Data Jaminan Pertanahan'])
            ->section('livewire-konten');
    }
}
