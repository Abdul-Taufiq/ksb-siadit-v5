<?php

namespace App\Livewire\Lainnya\PlanAO;

use App\Models\Cabang;
use App\Models\Output\MonitoringPlanAO;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowRekapPlanAOLivewire extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 'All';

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '', $id_cabang;
    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $tgl_awal,  $tgl_akhir;

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $kc = false, $nama, $id_cab_area, $id_area_1, $id_area_2, $id_area_3, $kategori_plan;

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'tableUpdated'];


    public function mount($kategori_plan, $nama, $tgl_awal, $tgl_akhir)
    {
        $this->nama = $nama;
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
        $this->kategori_plan = $kategori_plan;

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
        $this->reset(['search']);
        $this->resetPage();
    }


    public function render()
    {
        $namas = base64_decode($this->nama);
        $user = User::where('nama', $namas)->first();
        $cabang = Cabang::where('id_cabang', $user->id_cabang)->first();

        $baseQuery  = MonitoringPlanAO::where('nama_ao', $namas)
            ->where(function ($query) {
                $query->search($this->search)
                    ->orWhereHas('cabang', function ($query) {
                        $query->where('cabang', 'LIKE', "%{$this->search}%");
                    });
            })
            ->whereBetween('tgl_plan', [$this->tgl_awal, $this->tgl_akhir])
            ->orderBy('tgl_plan', 'asc');

        // Prospek
        $total_pros = (clone $baseQuery)->where('kategori_plan', 'Rencana Prospek')->count();
        $monPro = (clone $baseQuery)->where('kategori_plan', 'Rencana Prospek')
            ->paginate($total_pros > 0 ? $total_pros : 1);

        // Penagihan
        $total_pena = (clone $baseQuery)->where('kategori_plan', 'Rencana Penagihan')->count();
        $monPen = (clone $baseQuery)->where('kategori_plan', 'Rencana Penagihan')
            ->paginate($total_pena > 0 ? $total_pena : 1);

        // Lainnya
        $total_lain = (clone $baseQuery)->where('kategori_plan', 'Rencana Lainnya')->count();
        $monLan = (clone $baseQuery)->where('kategori_plan', 'Rencana Lainnya')
            ->paginate($total_lain > 0 ? $total_lain : 1);


        // tgl
        $tgl = Carbon::parse($this->tgl_awal)->Translatedformat('d F Y') . ' s/d ' . Carbon::parse($this->tgl_akhir)->Translatedformat('d F Y');
        $tgl_awal = $this->tgl_awal;
        $tgl_akhir = $this->tgl_akhir;
        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.plan-a-o.show-rekap-plan-a-o-livewire', compact('cabang', 'user', 'tgl', 'monPro', 'monPen', 'monLan', 'tgl_awal', 'tgl_akhir'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Rekap Data Rencana Harian AO'])
            ->section('livewire-konten');
    }
}
