<?php

namespace App\Livewire\Lainnya;

use App\Models\Cabang;
use App\Models\Output\MonitoringAo;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowRekapMonitoringAOLivewire extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 'All';

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $kc = false, $id_cabang, $nama, $tgl_awal,  $tgl_akhir, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;

    // listener
    protected $listeners = ['refreshTable' => '$refresh', 'tableUpdated'];


    public function mount($nama, $tgl_awal, $tgl_akhir)
    {
        $this->nama = $nama;
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;

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
        $this->reset(['search']);
        $this->resetPage();
    }


    public function render()
    {
        $namas = Crypt::decrypt($this->nama);
        $user = User::where('nama', $namas)->first();
        $cabang = Cabang::where('id_cabang', $user->id_cabang)->first();

        $monitoring = MonitoringAo::where('nama_ao', $namas)
            ->where(function ($query) {
                $query->search($this->search) // scopeSearch di JamTanah
                    ->orWhereHas('cabang', function ($query) {
                        $query->where('cabang', 'LIKE', "%{$this->search}%");
                    });
            })
            ->whereBetween('tgl_kunjungan', [$this->tgl_awal, $this->tgl_akhir]);

        // paginate
        if ($this->perPage == 'All') {
            $total = $monitoring->count();
            $monitoring  = $monitoring->paginate($total > 0 ? $total : 1);
        }

        // Persentase Kunjungan
        $persen_kunjungan = number_format(($monitoring->count() / 160) * 100, 2);
        // persentase aplikasi masuk terhadap jumlah prospek/ yang sampe create spk
        $sukses_rate = number_format(($monitoring->where('status', 'Create SPK')->count() / $monitoring->count()) * 100, 2);
        // persentase rate noa terhadap aplikasi masuk/ yang sampe cair
        $sukses_noa = number_format(($monitoring->where('status_pk', 'Cetak PK')->count() / $monitoring->where('status', 'Create SPK')->count()) * 100, 2);
        // persentase rate noa terhadap prospek ao
        $sukses_prospek = number_format(($monitoring->where('status_pk', 'Cetak PK')->count() / $monitoring->count()) * 100, 2);

        // tgl
        $tgl = Carbon::parse($this->tgl_awal)->Translatedformat('d F Y') . ' s/d ' . Carbon::parse($this->tgl_akhir)->Translatedformat('d F Y');
        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.lainnya.show-rekap-monitoring-a-o-livewire', compact('monitoring', 'cabang', 'user', 'tgl', 'persen_kunjungan', 'sukses_rate', 'sukses_noa', 'sukses_prospek'))
            ->extends('livewire.komponen.layouts.app', ['title' => 'Rekap Data Aktivitas Harian AO'])
            ->section('livewire-konten');
    }
}
