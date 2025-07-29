<?php

namespace App\Traits;

use App\Models\Cabang;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\LogActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait RekapTraits
{
    public function index()
    {
        $id_cabang = Auth::user()->id_cabang;
        $jabatan = Auth::user()->jabatan;
        $nama = Auth::user()->nama;
        $kredit = Kredit::with(['debitur', 'cabang'])
            ->where(function ($query) {
                $query->search($this->search) // Memanggil scopeSearch
                    ->orWhereHas('debitur', function ($query) {
                        $query->where('nama_debitur', 'LIKE', "%{$this->search}%");
                    })
                    ->orWhereHas('cabang', function ($query) {
                        $query->where('cabang', 'LIKE', "%{$this->search}%");
                    });
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

        if ($jabatan == 'AO') {
            $kredit->where('tb_kredit.petugas_penerima', $nama);
        } else {
            $kredit;
        }

        // order by
        if ($this->sortBy === 'nama_debitur') {
            $kredit->with('debitur')
                ->orderBy(
                    Debitur::select('nama_debitur')
                        ->whereColumn('debitur.id_debitur', 'tb_kredit.id_debitur'),
                    $this->sortDir
                );
        } else {
            $kredit->orderBy($this->sortBy, $this->sortDir);
        }

        // paginate
        if ($this->perPage == 'All') {
            $total = $kredit->count();
            return $kredit->paginate($total > 0 ? $total : 1);
        } else {
            return $kredit->paginate($this->perPage);
        }
    }
}
