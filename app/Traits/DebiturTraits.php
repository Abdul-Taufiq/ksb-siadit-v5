<?php

namespace App\Traits;

use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterMUK\Muk;
use App\Models\MasterMUK\MukPutusan;
use App\Models\Output\LogActivity;
use App\Models\Output\TrackingSPK;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

trait DebiturTraits
{
    public function dataSPK()
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


    protected $jabatanMap = [
        'AO' => [
            'status_field' => 'status_ao',
            'catatan_field' => 'catatan_ao',
            'label_approve' => 'Data Dikirim Ke Analis Cabang',
            'label_reject' => 'AO Reject',
            'next_jabatan' => 'Analis Cabang',
            'putusan' => ['field_nama' => 'nama_ao', 'field_rekom' => 'rekom_ao'],
            'pemutus_kredit' => 'Ya',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'DITOLAK',
        ],
        'Analis Cabang' => [
            'status_field' => 'status_analis',
            'catatan_field' => 'catatan_analis',
            'label_approve' => 'Analis Cabang Approve',
            'label_reject' => 'Analis Cabang Reject',
            'next_jabatan' => 'Kasi Komersial',
            'putusan' => ['field_nama' => 'nama_analis_cabang', 'field_rekom' => 'rekom_analis_cabang'],
            'pemutus_kredit' => 'Tidak',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'PROSES',
        ],
        'Kasi Komersial' => [
            'status_field' => 'status_kakom',
            'catatan_field' => 'catatan_kakom',
            'label_approve' => 'Kasi Komersial Approve',
            'label_reject' => 'Kasi Komersial Reject',
            'next_jabatan' => 'Pimpinan Cabang',
            'putusan' => ['field_nama' => 'nama_kakom', 'field_rekom' => 'rekom_kakom'],
            'pemutus_kredit' => 'Tidak',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'PROSES',
        ],
        'Pimpinan Cabang' => [
            'status_field' => 'status_pincab',
            'catatan_field' => 'catatan_pincab',
            'label_approve' => 'Pimpinan Cabang Approve',
            'label_reject' => 'Pimpinan Cabang Reject',
            'next_jabatan' => 'Legal',
            'putusan' => ['field_nama' => 'nama_pincab', 'field_rekom' => 'rekom_pincab'],
            'pemutus_kredit' => 'Ya',
            'status_akhir_app' => 'DISETUJUI',
            'status_akhir_rej' => 'DITOLAK',
        ],
        // tinggal tambah jabatan baru di sini
    ];


    public function EditStatus()
    {
        $user = Auth::user();
        $jabatan = $user->jabatan;
        $kredit = Kredit::find($this->id_kredit);
        $muk = Muk::where('id_kredit', $kredit->id_kredit)->first();
        $putusan = MukPutusan::where('id_kredit', $kredit->id_kredit)->first();

        $setting = $this->jabatanMap[$jabatan] ?? null;
        if (!$setting) return;

        // update kredit
        $kredit->{$setting['status_field']} = $this->status;
        $kredit->{$setting['catatan_field']} = $this->catatan . '<br><b> » Added at: ' . now()->format('d-m-Y, H:i') . '</b>';
        $kredit->status_kredit = $this->status == 'Approve' ? $setting['label_approve'] : $setting['label_reject'];
        $kredit->status_akhir = $this->status == 'Approve' ? $setting['status_akhir_app'] : $setting['status_akhir_rej'];
        $kredit->save();

        // tracking lama
        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', $jabatan)
            ->orderByDesc('id_tracking')
            ->first();

        // proses status
        // pemutus kredit
        if ($setting['pemutus_kredit'] == 'Ya') {
            // ao
            if ($jabatan == 'AO') {
                $tracking->update([
                    'nama' => $user->nama,
                    'status' => $this->status == 'Approve' ? 'Created & Sended' : 'Reject',
                    'tgl_status' => now(),
                    'status_spk' => $this->status == 'Approve' ? 'Proses' : 'Ditolak',
                ]);

                // tracking selanjutnya
                if ($this->status == 'Approve') {
                    TrackingSPK::AddTrackingSPK($kredit, [
                        'id_cabang' => $kredit->id_cabang,
                        'id_kredit' => $kredit->id_kredit,
                        'petugas_penerima' => $kredit->petugas_penerima,
                        'nama' => null,
                        'jabatan' => $setting['next_jabatan'],
                        'status' => null,
                        'tgl_masuk' => now(),
                        'status_spk' => 'Proses',
                    ]);
                }
            }
            // pincab
            elseif ($jabatan == 'Pimpinan Cabang') {
                // jika status kakom kosong maka save ini
                $Tkakom = TrackingSPK::where('id_kredit', $kredit->id_kredit)
                    ->where('jabatan', 'Kasi Komersial')
                    ->whereNull('nama')
                    ->whereNull('status')
                    ->orderByDesc('id_tracking')
                    ->first();
                if ($Tkakom !== null) {
                    $Tkakom->update([
                        'nama' => '-',
                        'status' => 'Ditarik Pincab',
                        'tgl_status' => now(),
                        'status_spk' => 'Proses',
                    ]);
                }

                // jika putusan cabang maka jalankan ini
                if ($this->putusan != 'Cabang') {
                    $tracking->update([
                        'nama' => $user->nama,
                        'status' => $this->status == 'Approve' ? 'Approve' : 'Reject',
                        'tgl_status' => now(),
                        'status_spk' => $this->status == 'Approve' ? 'Proses' : 'Proses',
                    ]);

                    // update kredit
                    $kredit->status_akhir = $this->status == 'Approve' ? 'PROSES' : 'PROSES';
                    $kredit->save();

                    // tracking selanjutnya
                    TrackingSPK::AddTrackingSPK($kredit, [
                        'id_cabang' => $kredit->id_cabang,
                        'id_kredit' => $kredit->id_kredit,
                        'petugas_penerima' => $kredit->petugas_penerima,
                        'nama' => null,
                        'jabatan' => 'Analis Area',
                        'status' => null,
                        'tgl_masuk' => now(),
                        'status_spk' => 'Proses',
                    ]);
                }
                // jika selain putusan cabang jalankan ini
                else {
                    $tracking->update([
                        'nama' => $user->nama,
                        'status' => $this->status == 'Approve' ? 'Approve' : 'Reject',
                        'tgl_status' => now(),
                        'status_spk' => $this->status == 'Approve' ? 'Disetujui' : 'Ditolak',
                    ]);

                    // tracking selanjutnya
                    if ($this->status == 'Approve') {
                        TrackingSPK::AddTrackingSPK($kredit, [
                            'id_cabang' => $kredit->id_cabang,
                            'id_kredit' => $kredit->id_kredit,
                            'petugas_penerima' => $kredit->petugas_penerima,
                            'nama' => null,
                            'jabatan' => $setting['next_jabatan'],
                            'status' => null,
                            'tgl_masuk' => now(),
                            'status_spk' => 'Proses',
                        ]);
                    }
                }
            }
            // pemutus kredit selain ao dan pincab
            else {
                $tracking->update([
                    'nama' => $user->nama,
                    'status' => $this->status == 'Approve' ? 'Approve' : 'Reject',
                    'tgl_status' => now(),
                    'status_spk' => $this->status == 'Approve' ? 'Disetujui' : 'Ditolak',
                ]);
            }
        }
        // bukan pemutus kredit/direject pun masih bisa jalan keatas
        else {
            $tracking->update([
                'nama' => $user->nama,
                'status' => $this->status == 'Approve' ? 'Approve' : 'Reject',
                'tgl_status' => now(),
                'status_spk' => $this->status == 'Approve' ? 'Proses' : 'Proses',
            ]);

            // tracking selanjutnya
            TrackingSPK::AddTrackingSPK($kredit, [
                'id_cabang' => $kredit->id_cabang,
                'id_kredit' => $kredit->id_kredit,
                'petugas_penerima' => $kredit->petugas_penerima,
                'nama' => null,
                'jabatan' => $setting['next_jabatan'],
                'status' => null,
                'tgl_masuk' => now(),
                'status_spk' => 'Proses',
            ]);
        }

        // update putusan untuk MUK
        if ($jabatan === 'AO' && $putusan === null) {
            if ($this->status == 'Approve') {
                MukPutusan::create([
                    'id_kredit' => $kredit->id_kredit,
                    $setting['putusan']['field_nama'] => $user->nama,
                    $setting['putusan']['field_rekom'] => $this->rekomendasi,
                ]);
            }
        } else {
            $putusan->update([
                'id_kredit' => $kredit->id_kredit,
                'id_muk' => $muk->id_muk,
                $setting['putusan']['field_nama'] => $user->nama,
                $setting['putusan']['field_rekom'] => $this->rekomendasi,
            ]);
        }

        // log & dispatch event
        LogActivity::AddLog("(cs) Data SPK | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} <br> Perubahan Status SPK: {$kredit->status_kredit} |");
        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil diubah status!', 'id' => Crypt::encrypt($kredit->id_kredit)]);
    }
}
