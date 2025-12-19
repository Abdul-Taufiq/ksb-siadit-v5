<?php

namespace App\Traits;

use App\Models\Cabang;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\LogActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait JaminanTrait
{
    public function index()
    {
        $id_cabang = Auth::user()->id_cabang;
        $jabatan = Auth::user()->jabatan;
        $nama = Auth::user()->nama;

        $jaminan = JamTanah::with(['kredit', 'kredit.cabang'])
            ->where(function ($query) {
                $query->search($this->search) // scopeSearch di JamTanah
                    ->orWhereHas('kredit', function ($q) {
                        $q->whereHas('cabang', function ($qc) {
                            $qc->where('cabang', 'LIKE', "%{$this->search}%");
                        });
                    });
            })
            ->when($this->tgl_awal && $this->tgl_akhir, function ($query) {
                $awal = Carbon::parse($this->tgl_awal)->startOfDay();
                $akhir = Carbon::parse($this->tgl_akhir)->endOfDay();
                $query->whereBetween('tb_kredit_jaminan_pertanahan.created_at', [$awal, $akhir]);
            });

        // for area 
        if ($id_cabang == 20) {
            if (!empty($this->id_cabang)) {
                if ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
                    $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                        ->whereIn('tb_kredit.id_cabang', $this->id_cabang);
                } else {
                    $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                        ->where('tb_kredit.id_cabang', $this->id_cabang);
                }
            } else {
                $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                    ->whereIn('tb_kredit.id_cabang', $this->id_cab_area);
            }
        } elseif ($this->id_cabang == 'AREA 1' || $this->id_cabang == 'AREA 2' || $this->id_cabang == 'AREA 3') {
            # code... for pusat
            switch ($this->id_cabang) {
                case 'AREA 1':
                    $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                        ->where('tb_kredit.id_cabang', $this->id_area_1);
                    break;
                case 'AREA 2':
                    $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                        ->where('tb_kredit.id_cabang', $this->id_area_2);
                    break;
                case 'AREA 3':
                    $jaminan->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                        ->where('tb_kredit.id_cabang', $this->id_area_3);
                    break;
            }
        } else {
            $jaminan->when($this->id_cabang != 99, function ($query) {
                $query->join('tb_kredit', 'tb_kredit_jaminan_pertanahan.id_kredit', '=', 'tb_kredit.id_kredit')
                    ->where('tb_kredit.id_cabang', $this->id_cabang);
            });
        }

        if ($jabatan == 'AO') {
            $jaminan->where('tb_kredit.petugas_penerima', $nama);
        } else {
            $jaminan;
        }

        // order by
        if ($this->sortBy === 'id_cabang') {
            $jaminan->with('kredit')
                ->orderBy(
                    Kredit::select('id_cabang')
                        ->whereColumn('tb_kredit_jaminan_pertanahan.id_kredit', 'tb_kredit.id_kredit'),
                    $this->sortDir
                );
        } elseif ($this->sortBy === 'info_shm') {
            $jaminan->orderBy('tb_kredit_jaminan_pertanahan.no_shm_shgb', $this->sortDir);
        } elseif ($this->sortBy === 'alamat_shm') {
            $jaminan->orderBy('tb_kredit_jaminan_pertanahan.desa', $this->sortDir);
        } else {
            $jaminan->orderBy('tb_kredit_jaminan_pertanahan.' . $this->sortBy, $this->sortDir);
        }

        // paginate
        if ($this->perPage == 'All') {
            $total = $jaminan->count();
            return $jaminan->paginate($total > 0 ? $total : 1);
        } else {
            return $jaminan->paginate($this->perPage);
        }
    }
}
