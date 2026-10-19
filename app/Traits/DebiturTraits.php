<?php

namespace App\Traits;

use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Persetujuan;
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
            'label_cancel' => 'AO Canceled',
            'next_jabatan' => 'Analis Cabang',
            'putusan' => ['field_nama' => 'nama_ao', 'field_rekom' => 'rekom_ao', 'catatan' => 'catatan_ao'],
            'pemutus_kredit' => 'Ya',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'DITOLAK',
        ],
        'Analis Cabang' => [
            'status_field' => 'status_analis',
            'catatan_field' => 'catatan_analis',
            'label_approve' => 'Analis Cabang Approve',
            'label_reject' => 'Analis Cabang Reject',
            'label_cancel' => 'Analis Cabang Canceled',
            'next_jabatan' => 'Kasi Komersial',
            'putusan' => ['field_nama' => 'nama_analis_cabang', 'field_rekom' => 'rekom_analis_cabang', 'catatan' => 'catatan_analis_cabang'],
            'pemutus_kredit' => 'Tidak',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'PROSES',
        ],
        'Kasi Komersial' => [
            'status_field' => 'status_kakom',
            'catatan_field' => 'catatan_kakom',
            'label_approve' => 'Kasi Komersial Approve',
            'label_reject' => 'Kasi Komersial Reject',
            'label_cancel' => 'Kasi Komersial Canceled',
            'next_jabatan' => 'Pimpinan Cabang',
            'putusan' => ['field_nama' => 'nama_kakom', 'field_rekom' => 'rekom_kakom', 'catatan' => 'catatan_kakom'],
            'pemutus_kredit' => 'Tidak',
            'status_akhir_app' => 'PROSES',
            'status_akhir_rej' => 'PROSES',
        ],
        'Pimpinan Cabang' => [
            'status_field' => 'status_pincab',
            'catatan_field' => 'catatan_pincab',
            'label_approve' => 'Pimpinan Cabang Approve',
            'label_reject' => 'Pimpinan Cabang Reject',
            'label_cancel' => 'Pimpinan Cabang Canceled',
            'next_jabatan' => 'Legal',
            'putusan' => ['field_nama' => 'nama_pincab', 'field_rekom' => 'rekom_pincab', 'catatan' => 'catatan_pincab'],
            'pemutus_kredit' => 'Ya',
            'status_akhir_app' => 'DISETUJUI',
            'status_akhir_rej' => 'DITOLAK',
        ],
        // tinggal tambah jabatan baru di sini
    ];

    public function EditStatus()
    {
        $user = Auth::user();
        $kredit = Kredit::find($this->id_kredit);
        $muk = Muk::where('id_kredit', $kredit->id_kredit)->first();
        $putusan = MukPutusan::where('id_kredit', $kredit->id_kredit)->first();

        $setting = $this->jabatanMap[$user->jabatan] ?? null;
        if (!$setting) return;

        // update kredit awal
        $kredit->{$setting['status_field']} = $this->status;
        $kredit->{$setting['catatan_field']} = $this->catatan . '<br><b> » Added at: ' . now()->format('d-m-Y, H:i') . '</b>';
        $kredit->status_kredit = $this->status == 'Approve' ? $setting['label_approve'] : ($this->status == 'Reject' ? $setting['label_reject'] : $setting['label_cancel']);
        $kredit->status_akhir = $this->status == 'Approve' ? $setting['status_akhir_app'] : ($this->status == 'Reject' ? $setting['status_akhir_rej'] : 'DEBITUR CANCEL');
        $kredit->save();

        $tracking = TrackingSPK::where('id_kredit', $kredit->id_kredit)
            ->where('jabatan', $user->jabatan)
            ->orderByDesc('id_tracking')
            ->first();

        if ($setting['pemutus_kredit'] == 'Ya') {
            switch ($user->jabatan) {
                case 'AO':
                    if ($tracking) {
                        $tracking->update([
                            'nama' => $user->nama,
                            'status' => $this->status == 'Approve' ? 'Created & Sent' : ($this->status == 'Reject' ? 'Rejected' : 'Debitur Cancel'),
                            'tgl_status' => now(),
                            'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Ditolak' : 'Debitur Cancel'),
                        ]);
                    }

                    if ($this->status == 'Approve') {
                        $this->AddTrackingNext($kredit, $setting);
                    }
                    break;

                case 'Pimpinan Cabang':
                    if (($muk?->deviasi?->perihal !== null && $muk?->deviasi?->perihal !== '<p>-</p>') || $this->putusan != 'Cabang') {

                        $kredit->status_kredit = $this->status == 'Approve' ? $setting['label_approve'] . ' - Menunggu Putusan ' . $this->status : ($this->status == 'Reject' ? $setting['label_reject'] : $setting['label_cancel']);
                        $kredit->status_akhir = 'PROSES';
                        $kredit->save();

                        $Tkakom = TrackingSPK::where('id_kredit', $kredit->id_kredit)
                            ->where('jabatan', 'Kasi Komersial')
                            ->whereNull('nama')
                            ->whereNull('status')
                            ->orderByDesc('id_tracking')
                            ->first();

                        // AMAN: Gunakan optional chaining/fallback untuk persetujuan
                        $putusanText = $kredit->persetujuan->putusan ?? $this->putusan ?? 'Area/Pusat';

                        if ($Tkakom !== null) {
                            $Tkakom->update([
                                'nama' => '-',
                                'status' => 'Ditarik Pincab',
                                'tgl_status' => now(),
                                'status_spk' => 'Proses',
                            ]);

                            TrackingSPK::AddTrackingSPK($kredit, [
                                'id_cabang' => $kredit->id_cabang,
                                'id_kredit' => $kredit->id_kredit,
                                'creator' => $kredit->petugas_penerima,
                                'nama' => $user->nama,
                                'jabatan' => 'Pimpinan Cabang',
                                'status' => $this->status == 'Approve' ? 'Approve - Menunggu Putusan ' . $putusanText : ($this->status == 'Reject' ? 'Reject' : 'Debitur Cencel'),
                                'tgl_masuk' => now(),
                                'tgl_status' => now(),
                                'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Ditolak' : 'Debitur Cencel'),
                            ]);
                        } else if ($tracking) {
                            $tracking->update([
                                'nama' => $user->nama,
                                'status' => $this->status == 'Approve' ? 'Approve - Menunggu Putusan ' . $putusanText : ($this->status == 'Reject' ? 'Reject' : 'Debitur Cencel'),
                                'tgl_status' => now(),
                                'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Ditolak' : 'Debitur Cencel'),
                            ]);
                        }

                        if ($this->status == 'Approve') {
                            if ($muk) {
                                $muk->update(['status_pincab' => 'Approve']);
                            }

                            TrackingSPK::AddTrackingSPK($kredit, [
                                'id_cabang' => $kredit->id_cabang,
                                'id_kredit' => $kredit->id_kredit,
                                'creator' => $kredit->petugas_penerima,
                                'nama' => null,
                                'jabatan' => 'Analis/KAKOM',
                                'status' => null,
                                'tgl_masuk' => now(),
                                'tgl_status' => null,
                                'status_spk' => 'Proses',
                            ]);
                        }
                    } else {
                        // Putusan Cabang
                        $persetujuan = Persetujuan::firstOrNew(['id_kredit' => $kredit->id_kredit]);

                        $persetujuan->besar_bunga = $this->bunga_cek ? $persetujuan->besar_bunga_muk : $this->normalizeNumber($this->bunga);
                        $persetujuan->save();

                        $kredit->jumlah_disetujui = $this->plafond_cek ? $kredit->jumlah_muk : $this->normalizeNumber($this->plafond);
                        $kredit->jkw = $this->jkw_cek ? $kredit->jkw_muk : $this->normalizeNumber($this->jkw);
                        $kredit->save();

                        if (!$this->bunga_cek || !$this->plafond_cek || !$this->jkw_cek) {
                            if ($persetujuan->jns_kredit == 'Berjangka') {
                                $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * ($persetujuan->besar_bunga / 100) * 31) / 360);
                            } else {
                                if ($persetujuan->jns_bunga == 'ANUITAS') {
                                    $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * (($kredit->besar_bunga / 12) * (1 + $kredit->besar_bunga / 12) ** $kredit->jkw)) / ((1 + $kredit->besar_bunga / 12) ** $kredit->jkw - 1));
                                } else {
                                    $persetujuan->jumlah_angsuran = round(($kredit->jumlah_disetujui * ($persetujuan->besar_bunga / 100) / 12) + ($kredit->jumlah_disetujui / $kredit->jkw));
                                }
                            }
                        } else {
                            $persetujuan->jumlah_angsuran = $persetujuan->jumlah_angsuran_muk;
                        }

                        $persetujuan->jumlah_provisi = ($kredit->jumlah_disetujui * $persetujuan->provisi) / 100;
                        $persetujuan->biaya_adm = ($kredit->jumlah_disetujui * $persetujuan->besar_adm) / 100;
                        $persetujuan->biaya_survey = ($kredit->jumlah_disetujui * $persetujuan->besar_survey) / 100;
                        $persetujuan->denda_hari = (2 / 1000) * $persetujuan->jumlah_angsuran;
                        $persetujuan->save();

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

                            TrackingSPK::AddTrackingSPK($kredit, [
                                'id_cabang' => $kredit->id_cabang,
                                'id_kredit' => $kredit->id_kredit,
                                'creator' => $kredit->petugas_penerima,
                                'nama' => $user->nama,
                                'jabatan' => 'Pimpinan Cabang',
                                'status' => $this->status == 'Approve' ? 'Approve' : ($this->status == 'Reject' ? 'Reject' : 'Debitur Cencel'),
                                'tgl_masuk' => now(),
                                'tgl_status' => now(),
                                'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Ditolak' : 'Debitur Cencel'),
                            ]);
                        } else if ($tracking) {
                            $tracking->update([
                                'nama' => $user->nama,
                                'status' => $this->status == 'Approve' ? 'Approve' : ($this->status == 'Reject' ? 'Reject' : 'Debitur Cencel'),
                                'tgl_status' => now(),
                                'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Ditolak' : 'Debitur Cencel'),
                            ]);
                        }

                        if ($this->status == 'Approve') {
                            if ($muk) {
                                $muk->update(['status_pincab' => 'Approve']);
                            }
                            $this->AddTrackingNext($kredit, $setting);
                        }
                    }
                    break;
            }
        } else {
            if ($tracking != null) {
                $tracking->update([
                    'nama' => $user->nama,
                    'status' => $this->status == 'Approve' ? 'Approve' : ($this->status == 'Reject' ? 'Reject' : 'Debitur Cancel'),
                    'tgl_status' => now(),
                    'status_spk' => $this->status == 'Approve' ? 'Proses' : ($this->status == 'Reject' ? 'Proses' : 'Debitur Cancel'),
                ]);
            }

            if ($this->status != 'Cancel') {
                $this->AddTrackingNext($kredit, $setting);
            }
        }

        // Muk Putusan
        if ($putusan === null) {
            if ($user->jabatan === 'AO') {
                if ($this->status === 'Approve') {
                    MukPutusan::create([
                        'id_kredit' => $kredit->id_kredit,
                        $setting['putusan']['field_nama'] => $user->nama,
                        $setting['putusan']['field_rekom'] => $this->rekomendasi,
                        $setting['putusan']['catatan'] => $this->catatan,
                    ]);
                }
            } else {
                MukPutusan::create([
                    'id_kredit' => $kredit->id_kredit,
                    'nama_ao' => $kredit->nama_ao,
                    'rekom_ao' => 'Rekomendasi',
                    'catatan_ao' => preg_replace('/<b>.*$/', '', $kredit->catatan_ao ?? ''),
                    $setting['putusan']['field_nama'] => $user->nama,
                    $setting['putusan']['field_rekom'] => $this->rekomendasi,
                    $setting['putusan']['catatan'] => $this->catatan,
                ]);
            }
        } else {
            $putusan->update([
                'id_kredit' => $kredit->id_kredit,
                'id_muk' => $muk->id_muk ?? null,
                'sub_jabatan_kakom' => Auth::user()->jabatan !== 'Kasi Komersial' ? null : Auth::user()->sub_jabatan,
                $setting['putusan']['field_nama'] => $user->nama,
                $setting['putusan']['field_rekom'] => $this->rekomendasi,
                $setting['putusan']['catatan'] => $this->catatan,
            ]);
        }

        LogActivity::AddLog("(cs) Data SPK | No SPK: {$kredit->no_spk} | Nama: {$kredit->debitur->nama_debitur} <br> Perubahan Status SPK: {$kredit->status_kredit}");
        $this->dispatch('AlertSuccess', ['message' => 'Data berhasil diubah status!', 'id' => Crypt::encrypt($kredit->id_kredit)]);
    }



    private function AddTrackingNext($kredit, $setting)
    {
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


    // fungsi normal untuk setting number
    function normalizeNumber($value)
    {
        if ($value === '∞') {
            return 0;
        }

        $value = str_replace('.', '', $value); // hapus ribuan
        $value = str_replace(',', '.', $value); // ubah desimal
        return floatval($value);

        // normalnya
        // $nilai = "49.000,89";
        // $jumlah_pengajuan = str_replace(',', '.', str_replace('.', '', $data['rate_1']));
    }
}
