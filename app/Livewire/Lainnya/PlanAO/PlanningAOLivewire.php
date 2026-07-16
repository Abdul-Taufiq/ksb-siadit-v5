<?php

namespace App\Livewire\Lainnya\PlanAO;

use App\Models\Output\MonitoringPlanAO;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;


class PlanningAOLivewire extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '', $id_cabang;
    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $tgl_awal,  $tgl_akhir, $page_view = 'Rencana Prospek';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $kc = false, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'tableUpdated'];


    public function mount()
    {
        if (! function_exists('defaultCabang')) {
            function defaultCabang($current, $fallback)
            {
                return $current ?: $fallback;
            }
        }

        switch (Auth::user()->level) {
            case 'DIREKTUR':
            case 'SUPER USER':
                $this->kc = true;
                $this->id_cabang = defaultCabang($this->id_cabang, 99);
                $this->id_area_1 = [4, 5, 6, 8, 9];
                $this->id_area_2 = [1, 2, 3, 7, 10, 11];
                $this->id_area_3 = [3, 10];
                break;

            case 'AREA 1':
                $this->kc = true;
                $this->id_cabang = defaultCabang($this->id_cabang, null);
                $this->id_cab_area = [4, 5, 6, 8, 9];
                break;

            case 'AREA 2':
                $this->kc = true;
                $this->id_cabang = defaultCabang($this->id_cabang, null);
                $this->id_cab_area = [1, 2, 3, 7, 10, 11];
                break;

            case 'AREA 3':
                $this->kc = true;
                $this->id_cabang = defaultCabang($this->id_cabang, null);
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
        $id_cabang = Auth::user()->id_cabang;
        $jabatan = Auth::user()->jabatan;
        $nama = Auth::user()->nama;

        if ($this->id_cabang == 99) {
            $userModels = User::where('jabatan', 'AO')->where('status', 'Aktif')->where('email', 'NOT LIKE', '%dummy%')->orderBy('nama', 'ASC')->get();
        } else if ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
            switch ($this->id_cabang) {
                case 'AREA 1':
                    $userModels = User::whereIn('id_cabang', $this->id_area_1)->where('jabatan', 'AO')->where('status', 'Aktif')
                        ->where('email', 'NOT LIKE', '%dummy%')->orderBy('nama', 'ASC')->get();
                    break;
                case 'AREA 2':
                    $userModels = User::whereIn('id_cabang', $this->id_area_2)->where('jabatan', 'AO')->where('status', 'Aktif')
                        ->where('email', 'NOT LIKE', '%dummy%')->orderBy('nama', 'ASC')->get();
                    break;
                case 'AREA 3':
                    $userModels = User::whereIn('id_cabang', $this->id_area_3)->where('jabatan', 'AO')->where('status', 'Aktif')
                        ->where('email', 'NOT LIKE', '%dummy%')->orderBy('nama', 'ASC')->get();
                    break;
            }
        } else {
            $userModels = User::where('id_cabang', $this->id_cabang)->where('jabatan', 'AO')->where('status', 'Aktif')
                ->where('email', 'NOT LIKE', '%dummy%')->orderBy('nama', 'ASC')->get();
        }

        $monitoring = MonitoringPlanAO::with(['cabang'])
            ->where(function ($query) {
                $query->search($this->search) // scopeSearch di JamTanah
                    ->orWhereHas('cabang', function ($query) {
                        $query->where('cabang', 'LIKE', "%{$this->search}%");
                    });
            })
            ->when($this->tgl_awal && $this->tgl_akhir, function ($query) {
                $awal = Carbon::parse($this->tgl_awal)->startOfDay();
                $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();
                $query->whereBetween('tgl_plan', [$awal, $akhir]);
            });

        // for area 
        if ($id_cabang == 20) {
            if (!empty($this->id_cabang)) {
                if ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
                    $monitoring->whereIn('id_cabang', $this->id_cab_area);
                } else {
                    $monitoring->where('id_cabang', $this->id_cabang);
                }
            } else {
                $monitoring->whereIn('id_cabang', $this->id_cab_area);
            }
        } elseif ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
            # code... for pusat
            switch ($this->id_cabang) {
                case 'AREA 1':
                    # code...
                    $monitoring->whereIn('id_cabang', $this->id_area_1);
                    break;
                case 'AREA 2':
                    # code...
                    $monitoring->whereIn('id_cabang', $this->id_area_2);
                    break;
                case 'AREA 3':
                    # code...
                    $monitoring->whereIn('id_cabang', $this->id_area_3);
                    break;
            }
        } else {
            $monitoring->when($this->id_cabang != 99, function ($query) {
                $query->where('id_cabang', $this->id_cabang);
            });
        }


        if ($jabatan == 'AO') {
            $monitoring->where('nama_ao', $nama);
        } else {
            $monitoring->whereIn('nama_ao', $userModels->pluck('nama')->toArray());
        }

        $monitoring->where('kategori_plan', $this->page_view);

        // order by
        $monitoring->orderBy($this->sortBy, $this->sortDir);

        // paginate
        if ($this->perPage == 'All') {
            $total = $monitoring->count();
            $monitoring  = $monitoring->paginate($total > 0 ? $total : 1);
        } else {
            $monitoring = $monitoring->paginate($this->perPage);
        }

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.plan-a-o.planning-a-o-livewire', compact('monitoring'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Data Rencana Harian AO'])
            ->section('livewire-konten');
    }
}
