<?php

namespace App\Livewire\MasterKredit\Debitur;

use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\TrackingSPK;
use App\Models\User;
use App\Traits\DebiturTraits;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\{Component, WithPagination, WithoutUrlPagination};
use Livewire\Attributes\Url;

class DebiturTable extends Component
{
    use WithPagination, WithoutUrlPagination, DebiturTraits;

    // #[Url(history: true)] //jika ini aktif maka akan ada url tambahan dikomen/dihapus aja
    public $search = '';
    // #[Url(history: true)]
    public $sortBy = 'created_at';
    // #[Url(history: true)]
    public $sortDir = 'desc';
    public $tgl_awal, $tgl_akhir, $perPage = 10;
    public $kc = true, $id_cabang, $id_cab_area, $id_area_1, $id_area_2, $id_area_3;
    public $modal_title, $status, $catatan, $id_kredit, $rekomendasi = '0', $putusan = '';
    public $analis_area_selected = null;
    public $analis_komite_selected = null;
    public $analis_area = [], $analis_komite = [];

    protected $listeners = ['refreshTable' => '$refresh', 'UpdateStatus', 'reCallSelect'];

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


    public function resetFilter()
    {
        $this->reset(['search', 'tgl_awal', 'tgl_akhir', 'id_cabang', 'sortBy']);
        $this->resetPage();
        $this->mount();
    }

    public function reCallSelect()
    {
        $this->dispatch('inisialSelect2');
    }


    // for status
    public function ShowModal($status, $spk, $id)
    {
        if ($status == 'Approve') {
            $this->modal_title = 'Approve Data - ' . $spk;
            $this->status = 'Approve';
        } elseif ($status == 'Tidak Diambil') {
            $this->modal_title = 'Tidak Diambil Nasabah - ' . $spk;
            $this->status = 'Tidak Diambil';
        } else {
            $this->modal_title = 'Reject Data - ' . $spk;
            $this->status = 'Reject';
        }

        $this->analis_area = User::where('jabatan', 'Analis Area')
            ->whereNot('nama', 'Like', '%dummy%')->get();
        $this->analis_komite = User::where('jabatan', 'like', 'Analis%')
            ->whereNot('nama', 'Like', '%dummy%')->get();

        $this->id_kredit = base64_decode($id);
        $kredit = Kredit::find(base64_decode($id));
        $this->putusan = $kredit->persetujuan?->putusan ?? 'Cabang'; //this penentunya

        $this->dispatch('initializeSummernote');
        // pemanggilan ulang JS
        $this->dispatch('RebindJS');
        $this->dispatch('inisialSelect2');
    }

    // for modal hide
    public function HideModal()
    {
        $this->reset(([
            'modal_title',
            'catatan',
            'status',
            'id_kredit',
            'rekomendasi',
            'analis_area',
            'analis_area_selected',
            'analis_komite',
            'analis_komite_selected',
            'putusan',
        ]));
        $this->js("window.dispatchEvent(new Event('resetSummernote'))");
    }


    // update status
    public function UpdateStatus()
    {
        if (Auth::user()->jabatan == 'Legal') {
            $kredit = Kredit::find($this->id_kredit);
            $kredit->status_legal = $this->status;
            $kredit->catatan_tambahan = $this->catatan . '<b> » Added at: ' . now()->format('d-m-Y, H:i') . '</b>';
            $kredit->status_kredit = 'DISETUJUI (TIDAK DIAMBIL)';
            $kredit->status_akhir = 'DISETUJUI (TIDAK DIAMBIL)';
            $kredit->save();

            // tracking lama
            $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
                ->where('jabatan', 'Legal')
                ->orderByDesc('id_tracking')
                ->first();
            $tracking->update([
                'nama' => Auth::user()->nama,
                'status' => $this->status,
                'tgl_status' => now(),
                'status_spk' => 'DISETUJUI (TIDAK DIAMBIL)',
            ]);
        } else {
            $this->EditStatus();
        }
    }



    public function render()
    {
        $kredit = $this->dataSPK();

        return view('livewire.master-kredit.debitur.debitur-table', compact('kredit'));
    }
}
