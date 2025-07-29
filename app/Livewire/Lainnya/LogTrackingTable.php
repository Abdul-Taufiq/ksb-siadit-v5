<?php

namespace App\Livewire\Lainnya;

use App\Models\MasterKredit\Kredit;
use App\Models\Output\TrackingSPK;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LogTrackingTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $kc = true, $id_cabang, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    public $tgl_awal;
    public $tgl_akhir;
    public $modal_title, $srcIframe;


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



    // show modal
    // for status
    public function ShowModal($spk, $id)
    {
        $this->modal_title = 'Show Data Tracking - ' . $spk;
        $this->srcIframe = route('tracking.show', ['id' => $id]);
    }

    // for modal hide
    public function HideModal()
    {
        $this->reset((['modal_title', 'srcIframe']));
    }


    public function render()
    {
        $username = Auth::user()->nama;
        $id_cabang = Auth::user()->id_cabang;
        $level = Auth::user()->level;
        $awal = Carbon::parse($this->tgl_awal)->startOfDay();
        $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();


        $kredit = Kredit::with(['debitur', 'cabang'])
            // ->when($this->id_cabang != 99, function ($query) {
            //     $query->where('tb_kredit.id_cabang', $this->id_cabang);
            // })
            ->where(function ($query) {
                $query->search($this->search) // Memanggil scopeSearch
                    ->orWhereHas('debitur', function ($query) {
                        $query->where('nik', 'LIKE', "%{$this->search}%");
                    })
                    ->orWhereHas('debitur', function ($query) {
                        $query->where('nama_debitur', 'LIKE', "%{$this->search}%");
                    })
                    ->orWhereHas('cabang', function ($query) {
                        $query->where('cabang', 'LIKE', "%{$this->search}%");
                    });
            })
            ->when($this->sortBy === 'nik', function ($query) {
                $query->join('debitur', 'tb_kredit.id_debitur', '=', 'debitur.id_debitur')
                    ->orderBy('debitur.nik', $this->sortDir);
            })
            ->when($this->sortBy === 'nama_debitur', function ($query) {
                $query->join('debitur', 'tb_kredit.id_debitur', '=', 'debitur.id_debitur')
                    ->orderBy('debitur.nama_debitur', $this->sortDir);
            })
            ->when($this->tgl_awal && $this->tgl_akhir, function ($query) {
                $awal = Carbon::parse($this->tgl_awal)->startOfDay();
                $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();
                $query->whereBetween('created_at', [$awal, $akhir]);
            });

        // for area 
        if ($id_cabang == 20) {
            if (!empty($this->id_cabang)) {
                if ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
                    $kredit->whereIn('tb_kredit.id_cabang', $this->id_cab_area);
                } else {
                    $kredit->where('tb_kredit.id_cabang', $this->id_cabang);
                }
            } else {
                $kredit->whereIn('tb_kredit.id_cabang', $this->id_cab_area);
            }
        } elseif ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
            # code... for pusat
            switch ($this->id_cabang) {
                case 'AREA 1':
                    # code...
                    $kredit->whereIn('tb_kredit.id_cabang', $this->id_area_1);
                    break;
                case 'AREA 2':
                    # code...
                    $kredit->whereIn('tb_kredit.id_cabang', $this->id_area_2);
                    break;
                case 'AREA 3':
                    # code...
                    $kredit->whereIn('tb_kredit.id_cabang', $this->id_area_3);
                    break;
            }
        } else {
            $kredit->when($this->id_cabang != 99, function ($query) {
                $query->where('tb_kredit.id_cabang', $this->id_cabang);
            });
        }

        if ($level == 'LOW USER') {
            $kredit->where('tb_kredit.petugas_penerima', $username);
        } else if ($level == 'MEDIUM USER') {
            $kredit->where('tb_kredit.id_cabang', Auth::user()->id_cabang);
        } else {
            $kredit;
        }

        // paginate
        if ($this->perPage == 'All') {
            $total = $kredit->count();
            $kredit = $kredit->orderBy($this->sortBy, $this->sortDir)->paginate($total > 0 ? $total : 1);
        } else {
            $kredit = $kredit->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        }

        return view('livewire.lainnya.log-tracking-table', compact('kredit'));
    }
}
