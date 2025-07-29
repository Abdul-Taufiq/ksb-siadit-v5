<?php

namespace App\Livewire\Lainnya;

use Livewire\Component;
use App\Models\Output\LogActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LogActivityTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;

    #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';

    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $tgl_awal;
    public $tgl_akhir;
    public $kc = false;
    public $id_cabang;


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
        $username = Auth::user()->nama;
        $awal = Carbon::parse($this->tgl_awal)->startOfDay();
        $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();

        $log = LogActivity::where('username', $username)
            ->search($this->search)
            ->when($this->tgl_awal && $this->tgl_akhir, function ($query) {
                $awal = Carbon::parse($this->tgl_awal)->startOfDay();
                $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();
                $query->whereBetween('created_at', [$awal, $akhir]);
            })
            ->orderBy($this->sortBy, $this->sortDir);

        // paginate
        if ($this->perPage == 'All') {
            $total = $log->count();
            $log = $log->paginate($total > 0 ? $total : 1);
        } else {
            $log = $log->paginate($this->perPage);
        }

        $this->id_cabang = Auth::user()->id_cabang;

        return view('livewire.lainnya.log-activity-table', compact('log'));
    }
}
