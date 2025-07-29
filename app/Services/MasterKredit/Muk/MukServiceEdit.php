<?php

namespace App\Services\MasterKredit\Muk;

use App\Models\Cabang;
use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Persetujuan;
use App\Models\MasterMUK\{Muk, MukData, MukDeviasi, MukIndustri, MukKeuangan, MukKeuanganBjk, MukSlik, MukWorking, SC_Deposito, SC_Kendaraan, SC_Tabungan, SC_Tanah_Agunan, SC_Tanah_Perhitungan, SC_Tanah_Rekap_1, SC_Tanah_Rekap_2, SC_Tanah_Scoring};
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MukServiceEdit
{

    // =================================
    // edit
    public function editPartSatu($data)
    {
        $id_muk = base64_decode($data['id_muk']);
        $id_cabang = Auth::user()->id_cabang;
        $kredit = Kredit::find(base64_decode(($data['id_kredit'])));

        // update muk
        $muk = Muk::find($id_muk)->update([
            'jns_kredit_muk' => $data['jns_kredit'],
        ]);

        // slik
        for ($slikCount = 1; $slikCount < 201; $slikCount++) {
            if (!empty($data['nama_bank_' . $slikCount]) && !empty($data['plafond_' . $slikCount])) {
                // untuk update slik
                if (!empty($data['id_slik_' . $slikCount])) {
                    if ($data['aksi_data_slik_' . $slikCount] == 'Edit') {
                        $slik = MukSlik::find(base64_decode($data['id_slik_' . $slikCount]))->update([
                            'id_muk' => $id_muk,
                            'nama_bank' => $data['nama_bank_' . $slikCount],
                            'plafond' => $this->normalizeNumber($data['plafond_' . $slikCount]),
                            'baki_debet' => $this->normalizeNumber($data['baki_debet_' . $slikCount]),
                            'tujuan_kredit' => $data['tujuan_kredit_' . $slikCount],
                            'rate' => $this->normalizeNumber($data['rate_' . $slikCount]),
                            'angsuran' => $this->normalizeNumber($data['angsuran_' . $slikCount]),
                            'kol' => $this->normalizeNumber($data['kol_' . $slikCount]),
                            'dpd' => $this->normalizeNumber($data['dpd_' . $slikCount]),
                            'tgl_awal' => $data['tgl_awal_slik_' . $slikCount],
                            'tgl_akhir' => $data['tgl_akhir_slik_' . $slikCount],
                            'pernah_restruck' => $data['pernah_restruck_' . $slikCount],
                            'alasan_restruck' => $data['alasan_restruck_' . $slikCount],
                        ]);
                    } else {
                        $slik = MukSlik::find(base64_decode($data['id_slik_' . $slikCount]))->delete();
                    }
                } else {
                    $slik = MukSlik::create([
                        'id_muk' => $id_muk,
                        'nama_bank' => $data['nama_bank_' . $slikCount],
                        'plafond' => $this->normalizeNumber($data['plafond_' . $slikCount]),
                        'baki_debet' => $this->normalizeNumber($data['baki_debet_' . $slikCount]),
                        'tujuan_kredit' => $data['tujuan_kredit_' . $slikCount],
                        'rate' => $this->normalizeNumber($data['rate_' . $slikCount]),
                        'angsuran' => $this->normalizeNumber($data['angsuran_' . $slikCount]),
                        'kol' => $this->normalizeNumber($data['kol_' . $slikCount]),
                        'dpd' => $this->normalizeNumber($data['dpd_' . $slikCount]),
                        'tgl_awal' => $data['tgl_awal_slik_' . $slikCount],
                        'tgl_akhir' => $data['tgl_akhir_slik_' . $slikCount],
                        'pernah_restruck' => $data['pernah_restruck_' . $slikCount],
                        'alasan_restruck' => $data['alasan_restruck_' . $slikCount],
                    ]);
                }
            }
        }

        // update keuangan
        // $nilai = "49.000,89";
        // $jumlah_pengajuan = $this->normalizeNumber($data['rate_1']);

        if ($data['jns_kredit'] == 'Angsuran') {
            $angsuran = MukKeuangan::where('id_muk', $id_muk)->first()->update([
                'id_muk' => $id_muk,
                'omset_usaha' => $this->normalizeNumber($data['omset_usaha']),
                'omset_harga_pokok' => $this->normalizeNumber($data['omset_harga_pokok']),
                'omset_sewa' => $this->normalizeNumber($data['omset_sewa']),
                'omset_gaji_pegawai' => $this->normalizeNumber($data['omset_gaji_pegawai']),
                'omset_listrik' => $this->normalizeNumber($data['omset_listrik']),
                'omset_transportasi' => $this->normalizeNumber($data['omset_transportasi']),
                'omset_pengeluaran_lainnya' => $this->normalizeNumber($data['omset_pengeluaran_lainnya']),
                'pengeluaran_usaha' => $this->normalizeNumber($data['pengeluaran_usaha']),
                'keuntungan_usaha' => $this->normalizeNumber($data['keuntungan_usaha']),
                'penghasilan_deb' => $this->normalizeNumber($data['penghasilan_deb']),
                'penghasilan_lainnya' => $this->normalizeNumber($data['penghasilan_lainnya']),
                'total_penghasilan' => $this->normalizeNumber($data['total_penghasilan']),
                'belanja_rt' => $this->normalizeNumber($data['belanja_rt']),
                'sewa_rumah' => $this->normalizeNumber($data['sewa_rumah']),
                'pendidikan' => $this->normalizeNumber($data['pendidikan']),
                'listrik' => $this->normalizeNumber($data['listrik']),
                'transportasi' => $this->normalizeNumber($data['transportasi']),
                'pengeluaran_lainnya' => $this->normalizeNumber($data['pengeluaran_lainnya']),
                'total_pengeluaran' => $this->normalizeNumber($data['total_pengeluaran']),
                'sisa_penghasilan' => $this->normalizeNumber($data['sisa_penghasilan']),
                'keu_angsuran_pinjaman' => $this->normalizeNumber($data['keu_angsuran_pinjaman']),
                'rekomendasi_asr' => $this->normalizeNumber($data['rekomendasi_asr']),
                'dis_income' => $this->normalizeNumber($data['dis_income']),
                'idir' => $this->normalizeNumber($data['idir']),
            ]);
        } else {
            $bjk = MukKeuanganBjk::where('id_muk', $id_muk)->first()->update([
                'id_muk' => $id_muk,
                'bjk_periode_usaha' => $this->normalizeNumber($data['bjk_periode_usaha']),
                'bjk_omset' => $this->normalizeNumber($data['bjk_omset']),
                'bjk_pupuk' => $this->normalizeNumber($data['bjk_pupuk']),
                'bjk_biaya_tenaga_kerja' => $this->normalizeNumber($data['bjk_biaya_tenaga_kerja']),
                'bjk_biaya_operasional' => $this->normalizeNumber($data['bjk_biaya_operasional']),
                'bjk_biaya_bahan_baku' => $this->normalizeNumber($data['bjk_biaya_bahan_baku']),
                'bjk_biaya_lainnya' => $this->normalizeNumber($data['bjk_biaya_lainnya']),
                'bjk_pengeluaran_usaha' => $this->normalizeNumber($data['bjk_pengeluaran_usaha']),
                'bjk_keuntungan_usaha' => $this->normalizeNumber($data['bjk_keuntungan_usaha']),
                'bjk_keuntungan_bulan' => $this->normalizeNumber($data['bjk_keuntungan_bulan']),
                'bjk_penghasilan_lainnya' => $this->normalizeNumber($data['bjk_penghasilan_lainnya']),
                'bjk_total_penghasilan' => $this->normalizeNumber($data['bjk_total_penghasilan']),
                'bjk_belanja_rumah' => $this->normalizeNumber($data['bjk_belanja_rumah']),
                'bjk_sewa_rumah' => $this->normalizeNumber($data['bjk_sewa_rumah']),
                'bjk_pendidikan' => $this->normalizeNumber($data['bjk_pendidikan']),
                'bjk_listrik' => $this->normalizeNumber($data['bjk_listrik']),
                'bjk_transportasi' => $this->normalizeNumber($data['bjk_transportasi']),
                'bjk_pengeluaran_lainnya' => $this->normalizeNumber($data['bjk_pengeluaran_lainnya']),
                'bjk_total_pengeluaran' => $this->normalizeNumber($data['bjk_total_pengeluaran']),
                'bjk_sisa_penghasilan' => $this->normalizeNumber($data['bjk_sisa_penghasilan']),
                'bjk_angsuran_pinjaman' => $this->normalizeNumber($data['bjk_angsuran_pinjaman']),
                'bjk_kewajiban_bunga' => $this->normalizeNumber($data['bjk_kewajiban_bunga']),
                'bjk_kewajiban_akhir' => $this->normalizeNumber($data['bjk_kewajiban_akhir']),
                'bjk_idir' => $this->normalizeNumber($data['bjk_idir']),
                'nominal' => $this->normalizeNumber($data['nominal']),
                'selisih_penghasilan' => $this->normalizeNumber($data['selisih_penghasilan']),
                'selisih_persen' => $this->normalizeNumber($data['selisih_persen']),
                'sumber_pengembalian' => $data['sumber_pengembalian'],
                'keterangan' => $data['keterangan'],
            ]);
        }

        // update kmk
        $kmk = MukWorking::where('id_muk', $id_muk)->first()->update([
            'id_muk' => $id_muk,
            'inventory' => $this->normalizeNumber($data['inventory']),
            'piutang_usaha' => $this->normalizeNumber($data['piutang_usaha']),
            'utang_usaha' => $this->normalizeNumber($data['utang_usaha']),
            'kmk' => $this->normalizeNumber($data['kmk']),
            'doh_1' => $data['doh_1'] == '∞' ? '0' : $this->normalizeNumber($data['doh_1']),
            'doh_2' => $data['doh_2'] == '∞' ? '0' : $this->normalizeNumber($data['doh_2']),
            'doh_3' => $data['doh_3'] == '∞' ? '0' : $this->normalizeNumber($data['doh_3']),
        ]);

        // update Persetujuan
        $persetujuan = Persetujuan::where('id_kredit', $kredit->id_kredit)->first()->update([
            'id_kredit' => base64_decode(($data['id_kredit'])),
            'id_cabang' => $id_cabang,
            'id_debitur' => $kredit->id_debitur,
            'jns_kredit' => $data['jns_kredit'],
            'pertimbangan' => $data['pertimbangan'],
            'putusan' => $data['putusan'],
            'jns_bunga' => $data['jns_bunga'],
            'besar_bunga' =>  $this->normalizeNumber($data['besar_bunga']),
            'jumlah_angsuran' => $this->normalizeNumber($data['jumlah_angsuran']),
            'provisi' =>  $this->normalizeNumber($data['provisi']),
            'jumlah_provisi' => $this->normalizeNumber($data['jumlah_provisi']),
            'besar_adm' =>  $this->normalizeNumber($data['besar_adm']),
            'biaya_adm' => $this->normalizeNumber($data['biaya_adm']),
            'besar_survey' =>  $this->normalizeNumber($data['besar_survey']),
            'biaya_survey' =>  $this->normalizeNumber($data['biaya_survey']),
            'denda_hari' => $this->normalizeNumber($data['denda_hari']),
        ]);

        // update kredit
        $kredit->update([
            'jumlah_disetujui' => $this->normalizeNumber($data['jumlah_disetujui']),
            'jkw' => $data['jkw'],
            'status_muk' => 'created'
        ]);

        return $muk;
    }



    public function editPartDua($data)
    {
        $id_muk = base64_decode($data['id_muk']);
        // Data Management
        $manag = MukData::find(base64_decode($data['id_data']))->update([
            'id_muk' => base64_decode($data['id_muk']),
            'tujuan_pinjaman' => $data['tujuan_pinjaman'],
            'pengalaman_usaha' => $data['pengalaman_usaha'],
            'reputasi_lokal' => $data['reputasi_lokal'],
            'hubungan_bank' => $data['hubungan_bank'],
            'prospek_usaha' => $data['prospek_usaha'],
            'pemasok_dan_pelanggan' => $data['pemasok_dan_pelanggan'],
        ]);

        // Analisa Industri
        for ($i = 1; $i < 51; $i++) {
            // for edit
            if (!empty($data['id_industri_' . $i])) {
                if ($data['aksi_data_industri_' . $i] == 'Edit') {
                    $industri = MukIndustri::find(base64_decode($data['id_industri_' . $i]))->update([
                        'id_muk' => $id_muk,
                        'type_data' => $data['type_data_' . $i],
                        'nama' => $data['nama_' . $i],
                        'hubungan' => $data['hubungan_' . $i],
                        'lama_hubungan' => $data['lama_hubungan_' . $i],
                        'no_hp' => $data['no_hp_' . $i],
                        'keterangan' => $data['keterangan_' . $i],
                    ]);
                } else {
                    $industri = MukIndustri::find(base64_decode($data['id_industri_' . $i]))->delete();
                }
            }
            // for tambah
            else {
                if (!empty($data['type_data_' . $i])) {
                    // for untuk input
                    for ($a = 1; $a < 3; $a++) {
                        // cek kosong input
                        if (!empty($data['nama_' . $i . '_' . $a])) {
                            $industri = MukIndustri::create([
                                'id_muk' => $id_muk,
                                'type_data' => $data['type_data_' . $i],
                                'nama' => $data['nama_' . $a . '_' . $i],
                                'hubungan' => $data['hubungan_' . $a . '_' . $i],
                                'lama_hubungan' => $data['lama_hubungan_' . $a . '_' . $i],
                                'no_hp' => $data['no_hp_' . $a . '_' . $i],
                                'keterangan' => $data['keterangan_' . $a . '_' . $i],
                            ]);
                        }
                    }
                }
            }
        }

        // penyimpangan / deviasi
        // for ($dev = 1; $dev < 51; $dev++) {
        //     if (!empty($data['jns_penyimpangan_' . $dev])) {
        $deviasi = MukDeviasi::find(base64_decode($data['id_deviasi']))->update([
            'id_muk' => $id_muk,
            'perihal' => $data['perihal'],
            // 'jns_penyimpangan' => $data['jns_penyimpangan'],
            'ketentuan_berlaku' => $data['ketentuan_berlaku'],
            'penyimpangan_diajukan' => $data['penyimpangan_diajukan'],
            'pertimbangan' => $data['pertimbangan'],
        ]);
        //     }
        // }

        return $manag;
    }


    // part tiga berasal dari JaminanService
    public function editTanah($data)
    {
        $id_kredit = base64_decode($data['id_kredit']);
        $id_muk = base64_decode($data['id_muk']);
        $nama_user = Auth::user()->nama;

        for ($i = 1; $i < 201; $i++) {
            if (!empty($data['nama_deb_' . $i])) {
                $id_tanah = base64_decode($data['id_jaminan_pertanahan_' . $i]);

                // update nilai agunan dan nilai taksasi di tanah
                $jamTanah = JamTanah::find($id_tanah);
                if (!empty($data['data_1_' . $i]) && empty($data['bangunan_1_' . $i])) {
                    $jamTanah->update([
                        'nilai_jaminan' => $this->normalizeNumber($data['kes_nilai_pasar_' . $i]),
                        'nilai_taksasi' => $this->normalizeNumber($data['kes_nilai_taksasi_' . $i])
                    ]);
                }
                if (!empty($data['bangunan_1_' . $i])) {
                    $jamTanah->update([
                        'nilai_jaminan' => $this->normalizeNumber($data['kes_total_nilai_pasar_' . $i]),
                        'nilai_taksasi' => $this->normalizeNumber($data['kes_total_nilai_taksasi_' . $i])
                    ]);
                }

                // Penilaian Agunan
                if (!empty($data['tgl_penilaian_' . $i])) {
                    $pen = SC_Tanah_Agunan::find(base64_decode($data['id_sc_agunan_' . $i]));
                    $pen->id_muk = $id_muk;
                    $pen->id_jaminan_pertanahan = $id_tanah;
                    $pen->nama_deb = $data['nama_deb_' . $i];
                    $pen->tgl_penilaian = $data['tgl_penilaian_' . $i];
                    $pen->lokasi = $data['lokasi_' . $i];
                    $pen->penilai = $data['penilai_' . $i];
                    $pen->luas_tanah = $data['luas_tanah_' . $i];
                    $pen->batas_utara = $data['batas_utara_' . $i];
                    $pen->batas_selatan = $data['batas_selatan_' . $i];
                    $pen->batas_timur = $data['batas_timur_' . $i];
                    $pen->batas_barat = $data['batas_barat_' . $i];
                    $pen->hak_kepemilikan = $data['hak_kepemilikan_' . $i];
                    $pen->nomor = $data['nomor_' . $i];
                    $pen->atas_nama = $data['atas_nama_' . $i];
                    $pen->tgl_berakhir_sertif = $data['tgl_berakhir_sertif_' . $i];
                    $pen->no_gs = $data['no_gs_' . $i];

                    // untuk Ruko dan Bangunan
                    if (!empty($data['luas_bangunan_' . $i])) {
                        $pen->luas_bangunan = $data['luas_bangunan_' . $i];
                        $pen->luas_bangunan_fisik = $data['luas_bangunan_fisik_' . $i];
                        $pen->beda_luas_bangunan = $data['beda_luas_bangunan_' . $i];
                        $pen->thn_pembangunan = $data['thn_pembangunan_' . $i];
                        $pen->thn_renov_akhir = $data['thn_renov_akhir_' . $i];
                        $pen->umur_efektif = $data['umur_efektif_' . $i];
                        $pen->kamar_tidur = $data['kamar_tidur_' . $i];
                        $pen->jumlah_kt = $data['jumlah_kt_' . $i];
                        $pen->kamar_mandi = $data['kamar_mandi_' . $i];
                        $pen->jumlah_km = $data['jumlah_km_' . $i];
                        $pen->jumlah_lantai = $data['jumlah_lantai_' . $i];
                        $pen->jaringan_listrik = $data['jaringan_listrik_' . $i] != 'Lainnya' ? $data['jaringan_listrik_' . $i] : $data['jaringan_listrik_detail_' . $i];
                        $pen->jaringan_air_bersih = $data['jaringan_air_bersih_' . $i];
                        $pen->jaringan_telepon = $data['jaringan_telepon_' . $i];
                    }

                    // untuk bangunan
                    if (!empty($data['penggunaan_bangunan_' . $i])) {
                        $pen->penggunaan_bangunan = $data['penggunaan_bangunan_' . $i];
                    }
                    $pen->save();
                }

                // Scoring
                if (!empty($data['tempat_ibadah_' . $i])) {
                    $scTanah = SC_Tanah_Scoring::find(base64_decode($data['id_sc_scoring_' . $i]));
                    $scTanah->id_muk = $id_muk;
                    $scTanah->id_jaminan_pertanahan = $id_tanah;
                    $scTanah->tempat_ibadah = $data['tempat_ibadah_' . $i];
                    $scTanah->pasar = $data['pasar_' . $i];
                    $scTanah->sekolah = $data['sekolah_' . $i];
                    $scTanah->perkantoran = $data['perkantoran_' . $i];
                    $scTanah->sutet = $data['sutet_' . $i];
                    $scTanah->lokalisasi = $data['lokalisasi_' . $i];
                    $scTanah->tps = $data['tps_' . $i];
                    $scTanah->pemakaman = $data['pemakaman_' . $i];
                    $scTanah->resiko_longsor = $data['resiko_longsor_' . $i];
                    $scTanah->resiko_banjir = $data['resiko_banjir_' . $i];
                    $scTanah->zonasi = $data['zonasi_' . $i];
                    $scTanah->akses_jalan = $data['akses_jalan_' . $i];
                    $scTanah->kondisi_jalan = $data['kondisi_jalan_' . $i];
                    $scTanah->tusuk_sate = $data['tusuk_sate_' . $i];
                    $scTanah->bentuk_tanah = $data['bentuk_tanah_' . $i];
                    $scTanah->lebar_muka = $data['lebar_muka_' . $i];
                    $scTanah->kontur = $data['kontur_' . $i];
                    $scTanah->elevasi = $data['elevasi_' . $i];
                    $scTanah->rel_kereta = $data['rel_kereta_' . $i];
                    $scTanah->total_score_tanah = $data['total_score_tanah_' . $i];

                    // for rukan dan bangunan
                    if (!empty($data['pondasi_' . $i])) {
                        $scTanah->pondasi = $data['pondasi_' . $i];
                        $scTanah->rangka_atap = $data['rangka_atap_' . $i];
                        $scTanah->plafon = $data['plafon_' . $i];
                        $scTanah->pintu = $data['pintu_' . $i];
                        $scTanah->imb = $data['imb_' . $i];
                        $scTanah->penutup_atap = $data['penutup_atap_' . $i];
                        $scTanah->dinding = $data['dinding_' . $i];
                        $scTanah->lantai = $data['lantai_' . $i];
                        $scTanah->total_skor_bangunan = $data['total_score_bangunan_' . $i];
                        $scTanah->total_skor_rukan = !empty($data['total_skor_rukan_' . $i]) ? ($data['total_skor_rukan_' . $i]) : null;

                        if (!empty($data['struktur_' . $i])) {
                            $scTanah->struktur = $data['struktur_' . $i];
                        }
                    }

                    $scTanah->save();
                }

                // Perhitungan
                for ($a = 1; $a < 51; $a++) {
                    if (!empty($data['nama_' . $i . '_' . $a])) {
                        $per = SC_Tanah_Perhitungan::find(base64_decode($data['id_sc_perhitungan_' . $i]));
                        $per->id_muk = $id_muk;
                        $per->id_jaminan_pertanahan = $id_tanah;
                        $per->nama = $data['nama_' . $i . '_' . $a];
                        $per->hubungan = $data['hubungan_' . $i . '_' . $a];
                        $per->no_telp = $data['no_telp_' . $i . '_' . $a];
                        $per->alamat = $data['alamat_' . $i . '_' . $a];
                        $per->harga_per_meter = $this->normalizeNumber($data['harga_tanah_' . $i . '_' . $a]);
                        $per->harga_bangunan = $this->normalizeNumber($data['harga_bangunan_' . $i . '_' . $a]);
                        $per->keterangan = $data['keterangan_' . $i . '_' . $a];
                        $per->save();
                    }
                }

                // Rekap 1 untuk Tanah serta Ruko dan Rukan
                $rekap1 = SC_Tanah_Rekap_1::find(base64_decode($data['id_sc_rekap']));
                $rekap2 = SC_Tanah_Rekap_2::find(base64_decode($data['id_sc_rekap']));

                if ($rekap1 != null && !empty($data['data_1_' . $i]) && empty($data['bangunan_1_' . $i])) {
                    $rekap1->id_muk = $id_muk;
                    $rekap1->id_jaminan_pertanahan = $id_tanah;
                    $rekap1->nilai_njop = $this->normalizeNumber($data['nilai_njop_' . $i]);
                    $rekap1->pbb_tahun = $data['pbb_tahun_' . $i];
                    $rekap1->data_1 = $this->normalizeNumber($data['data_1_' . $i]);
                    $rekap1->data_2 = $this->normalizeNumber($data['data_2_' . $i]);
                    $rekap1->data_3 = $this->normalizeNumber($data['data_3_' . $i]);
                    $rekap1->data_luas_1 = $data['data_luas_1_' . $i];
                    $rekap1->data_luas_2 = $data['data_luas_2_' . $i];
                    $rekap1->data_luas_3 = $data['data_luas_3_' . $i];
                    $rekap1->data_total_1 = $this->normalizeNumber($data['data_total_1_' . $i]);
                    $rekap1->data_total_2 = $this->normalizeNumber($data['data_total_2_' . $i]);
                    $rekap1->data_total_3 = $this->normalizeNumber($data['data_total_3_' . $i]);
                    $rekap1->nilai_pasar = $this->normalizeNumber($data['nilai_pasar_' . $i]);
                    $rekap1->nilai_agunan = $this->normalizeNumber($data['nilai_agunan_' . $i]);
                    $rekap1->safety_margin = $data['safety_margin_' . $i];
                    $rekap1->kes_nilai_pasar = $this->normalizeNumber($data['kes_nilai_pasar_' . $i]);
                    $rekap1->kes_nilai_taksasi_persen = $data['kes_nilai_taksasi_persen_' . $i];
                    $rekap1->kes_nilai_taksasi = $this->normalizeNumber($data['kes_nilai_taksasi_' . $i]);
                    $rekap1->kesimpulan = $data['kesimpulan_' . $i];
                    $rekap1->rekomendasi_penilai = $data['rekomendasi_penilai_' . $i];
                    $rekap1->save();
                }

                // Rekap 2 for bangunan
                if ($rekap2 != null && !empty($data['bangunan_1_' . $i])) {
                    $rekap2->id_muk = $id_muk;
                    $rekap2->id_jaminan_pertanahan = $id_tanah;
                    $rekap2->nilai_njop = $this->normalizeNumber($data['nilai_njop_' . $i]);
                    $rekap2->pbb_tahun = $data['pbb_tahun_' . $i];
                    $rekap2->tanah_1 = $this->normalizeNumber($data['data_1_' . $i]);
                    $rekap2->tanah_2 = $this->normalizeNumber($data['data_2_' . $i]);
                    $rekap2->tanah_3 = $this->normalizeNumber($data['data_3_' . $i]);
                    $rekap2->tanah_luas_1 = $data['data_luas_1_' . $i];
                    $rekap2->tanah_luas_2 = $data['data_luas_2_' . $i];
                    $rekap2->tanah_luas_3 = $data['data_luas_3_' . $i];
                    $rekap2->tanah_total_1 = $this->normalizeNumber($data['data_total_1_' . $i]);
                    $rekap2->tanah_total_2 = $this->normalizeNumber($data['data_total_2_' . $i]);
                    $rekap2->tanah_total_3 = $this->normalizeNumber($data['data_total_3_' . $i]);
                    $rekap2->bangunan_1 = $this->normalizeNumber($data['bangunan_1_' . $i]);
                    $rekap2->bangunan_2 = $this->normalizeNumber($data['bangunan_2_' . $i]);
                    $rekap2->bangunan_3 = $this->normalizeNumber($data['bangunan_3_' . $i]);
                    $rekap2->bangunan_luas_1 = $data['bangunan_luas_1_' . $i];
                    $rekap2->bangunan_luas_2 = $data['bangunan_luas_2_' . $i];
                    $rekap2->bangunan_luas_3 = $data['bangunan_luas_3_' . $i];
                    $rekap2->bangunan_total_1 = $this->normalizeNumber($data['bangunan_total_1_' . $i]);
                    $rekap2->bangunan_total_2 = $this->normalizeNumber($data['bangunan_total_2_' . $i]);
                    $rekap2->bangunan_total_3 = $this->normalizeNumber($data['bangunan_total_3_' . $i]);
                    $rekap2->rekom_pasar_tanah = $this->normalizeNumber($data['nilai_pasar_' . $i]);
                    $rekap2->rekom_agunan_tanah = $this->normalizeNumber($data['nilai_agunan_' . $i]);
                    $rekap2->margin_tanah = $data['safety_margin_' . $i];
                    $rekap2->rekom_pasar_bangunan = $this->normalizeNumber($data['rekom_pasar_bangunan_' . $i]);
                    $rekap2->rekom_agunan_bangunan = $this->normalizeNumber($data['rekom_agunan_bangunan_' . $i]);
                    $rekap2->margin_bangunan = $data['margin_bangunan_' . $i];
                    $rekap2->rekom_total = $this->normalizeNumber($data['rekom_total_' . $i]);
                    $rekap2->kes_tanah_nilai_pasar = $this->normalizeNumber($data['kes_nilai_pasar_' . $i]);
                    $rekap2->kes_taksasi_persen_1 = $data['kes_nilai_taksasi_persen_' . $i];
                    $rekap2->kes_tanah_nilai_taksasi = $this->normalizeNumber($data['kes_nilai_taksasi_' . $i]);
                    $rekap2->kes_bangunan_nilai_pasar = $this->normalizeNumber($data['kes_bangunan_nilai_pasar_' . $i]);
                    $rekap2->kes_taksasi_persen_2 = $data['kes_taksasi_persen_2_' . $i];
                    $rekap2->kes_bangunan_nilai_taksasi = $this->normalizeNumber($data['kes_bangunan_nilai_taksasi_' . $i]);
                    $rekap2->kes_total_nilai_pasar = $this->normalizeNumber($data['kes_total_nilai_pasar_' . $i]);
                    $rekap2->kes_total_nilai_taksasi = $this->normalizeNumber($data['kes_total_nilai_taksasi_' . $i]);
                    $rekap2->kesimpulan = $data['kesimpulan_' . $i];
                    $rekap2->rekomendasi_penilai = $data['rekomendasi_penilai_' . $i];
                    $rekap2->save();
                }
            }
        }
    }


    // edit sc kendaraan
    public function editKenda($data)
    {
        $id_kredit = base64_decode($data['id_kredit']);
        $id_muk = base64_decode($data['id_muk']);
        $nama_user = Auth::user()->nama;

        for ($i = 1; $i < 201; $i++) {
            // cek 
            if (!empty($data['jns_kendaraan_' . $i])) {
                $id_kenda = base64_decode($data['id_jaminan_kendaraan_' . $i]);

                // update JamKenda
                $jamKenda = JamKenda::find($id_kenda);
                $jamKenda->update([
                    'nilai_jaminan' => $this->normalizeNumber($data['harga_pasar_keseluruhan_' . $i]),
                    'nilai_taksasi' => $this->normalizeNumber($data['harga_pasar_diterima_' . $i])
                ]);

                $scKenda = SC_Kendaraan::find(base64_decode($data['id_sc_kendaraan_' . $i]));
                $scKenda->id_muk = $id_muk;
                $scKenda->id_jaminan_kendaraan = $id_kenda;
                $scKenda->tgl_pemeriksaan = now()->format('Y-m-d');
                $scKenda->penilai = $nama_user;
                $scKenda->jns_kendaraan = $data['jns_kendaraan_' . $i];
                $scKenda->umur = $data['umur_' . $i];
                $scKenda->pembelian = $data['pembelian_' . $i];
                $scKenda->thn_pembuatan = $data['thn_pembuatan_' . $i];
                $scKenda->merk = $data['merk_' . $i];
                $scKenda->type = $data['type_' . $i];
                $scKenda->no_rangka = $data['no_rangka_' . $i];
                $scKenda->no_mesin = $data['no_mesin_' . $i];
                $scKenda->nopol = $data['nopol_' . $i];
                $scKenda->kondisi = $data['kondisi_' . $i];
                $scKenda->perawatan = $data['perawatan_' . $i];
                $scKenda->dokumen_kepemilikan = $data['dokumen_kepemilikan_' . $i];
                $scKenda->no_dokumen = $data['no_dokumen_' . $i];
                $scKenda->tgl_dokumen = $data['tgl_dokumen_' . $i];
                $scKenda->dokumen_pembelian = $data['dokumen_pembelian_' . $i];
                $scKenda->atas_nama = $data['atas_nama_kenda_' . $i];
                $scKenda->asuransi = $data['asuransi_' . $i];
                $scKenda->jns_penutupan = $data['jns_penutupan_' . $i];
                $scKenda->nilai_pertanggungan = $data['nilai_pertanggungan_' . $i];
                $scKenda->perusahaan_asuransi = $data['perusahaan_asuransi_' . $i];
                $scKenda->tujuan_penilaian = $data['tujuan_penilaian_' . $i];
                $scKenda->d1_harga = $this->normalizeNumber($data['d1_harga_' . $i]);
                $scKenda->d2_harga = $this->normalizeNumber($data['d2_harga_' . $i]);
                $scKenda->d3_harga = $this->normalizeNumber($data['d3_harga_' . $i]);
                $scKenda->d1_instansi = $data['d1_instansi_' . $i];
                $scKenda->d2_instansi = $data['d2_instansi_' . $i];
                $scKenda->d3_instansi = $data['d3_instansi_' . $i];
                $scKenda->d1_alamat = $data['d1_alamat_' . $i];
                $scKenda->d2_alamat = $data['d2_alamat_' . $i];
                $scKenda->d3_alamat = $data['d3_alamat_' . $i];
                $scKenda->d1_tgl = $data['d1_tgl_' . $i];
                $scKenda->d2_tgl = $data['d2_tgl_' . $i];
                $scKenda->d3_tgl = $data['d3_tgl_' . $i];
                $scKenda->harga_pasar_keseluruhan = $this->normalizeNumber($data['harga_pasar_keseluruhan_' . $i]);
                $scKenda->safety_margin = $data['safety_margin_kenda_' . $i];
                $scKenda->score = $data['score_kenda_' . $i];
                $scKenda->harga_pasar_diterima = $this->normalizeNumber($data['harga_pasar_diterima_' . $i]);
                $scKenda->market = $data['market_kenda_' . $i];
                $scKenda->permasalahan = $data['permasalahan_kenda_' . $i];
                $scKenda->pengikatan_sempurna = $data['pengikatan_sempurna_' . $i];
                $scKenda->penguasaan = $data['penguasaan_' . $i];
                $scKenda->lainnya = $data['lainnya_' . $i];
                $scKenda->save();
            }
        }
    }


    // edit Deposito & tabungan
    public function editDepo($data)
    {
        $id_kredit = base64_decode($data['id_kredit']);
        $id_muk = base64_decode($data['id_muk']);
        $nama_user = Auth::user()->nama;

        for ($i = 1; $i < 201; $i++) {
            // cek 
            if (!empty($data['id_jaminan_deposito_' . $i])) {
                // cek jenis: deposito/tabungan
                $id_depo = base64_decode($data['id_jaminan_deposito_' . $i]);
                $deposito = JamDeposito::find($id_depo);
                // update jamDepo
                $deposito->update([
                    'nilai_jaminan' => $this->normalizeNumber($data['depo_nilai_pasar_agunan_' . $i]),
                    'nilai_taksasi' => $this->normalizeNumber($data['depo_nilai_pasar_setelah_sm_' . $i])
                ]);

                // kondisi
                if ($deposito->jns_jaminan == 'Deposito') {
                    $depo = SC_Deposito::find(base64_decode($data['id_sc_depo_tab_' . $i]));
                    $depo->id_jaminan_deposito = $id_depo;
                    $depo->id_muk = $id_muk;
                    $depo->tgl_pemeriksaan = now()->format('Y-m-d');
                    $depo->penilai = $nama_user;
                    $depo->no_bilyet = $data['no_bilyet_' . $i];
                    $depo->tgl_jatuh_tempo = $data['tgl_jatuh_tempo_' . $i];
                    $depo->nama_pemilik = $data['nama_pemilik_' . $i];
                    $depo->nominal = $this->normalizeNumber($data['nominal_' . $i]);
                    $depo->alamat_pemilik = $data['alamat_pemilik_' . $i];
                    $depo->aro = $data['aro_' . $i];
                    $depo->bank_penerbit = $data['bank_penerbit_' . $i];
                    $depo->jns_aro = $data['jns_aro_' . $i];
                    $depo->tgl_bilyet = $data['tgl_bilyet_' . $i];
                    $depo->hubungan_dgn_debitur = $data['hubungan_dgn_debitur_' . $i];
                    $depo->keterangan_lainnya = $data['keterangan_lainnya_' . $i];
                    $depo->tujuan_penilaian = $data['depo_tujuan_penilaian_' . $i];
                    $depo->jns_pengikatan = $data['jns_pengikatan_depo_' . $i];
                    $depo->nilai_pasar_agunan = $this->normalizeNumber($data['depo_nilai_pasar_agunan_' . $i]);
                    $depo->safety_margin = $data['depo_safety_margin_' . $i];
                    $depo->score = $data['depo_score_' . $i];
                    $depo->nilai_pasar_setelah_sm = $this->normalizeNumber($data['depo_nilai_pasar_setelah_sm_' . $i]);
                    $depo->market = $data['market_depo_' . $i];
                    $depo->permasalahan = $data['permasalahan_depo_' . $i];
                    $depo->penguasaan = $data['penguasaan_depo_' . $i];
                    $depo->lainnya = $data['lainnya_depo_' . $i];
                    $depo->save();
                }
                // untuk tabungan
                else {
                    $tabu = SC_Tabungan::find(base64_decode($data['id_sc_depo_tab_' . $i]));
                    $tabu->id_jaminan_deposito = $id_depo;
                    $tabu->id_muk = $id_muk;
                    $tabu->penilai = $nama_user;
                    $tabu->tgl_pemeriksaan = now()->format('Y-m-d');
                    $tabu->norek = $data['norek_tab_' . $i];
                    $tabu->saldo_tabungan = $this->normalizeNumber($data['saldo_tabungan_' . $i]);
                    $tabu->nama_pemilik = $data['nama_pemilik_tab_' . $i];
                    $tabu->alamat_pemilik = $data['alamat_pemilik_tab_' . $i];
                    $tabu->saldo_dijaminkan = $this->normalizeNumber($data['saldo_dijaminkan_' . $i]);
                    $tabu->suku_bunga = $this->normalizeNumber($data['suku_bunga_' . $i]);
                    $tabu->bank_penerbit = $data['bank_penerbit_tab_' . $i];
                    $tabu->hubungan_dgn_debitur = $data['hubungan_dgn_debitur_tab_' . $i];
                    $tabu->jns_rek = $data['jns_rek_tab_' . $i];
                    $tabu->keterangan_lainnya = $data['keterangan_lainnya_tab_' . $i];
                    $tabu->tujuan_penilaian = $data['depo_tujuan_penilaian_' . $i];
                    $tabu->jns_pengikatan = $data['jns_pengikatan_depo_' . $i];
                    $tabu->nilai_pasar = $this->normalizeNumber($data['depo_nilai_pasar_agunan_' . $i]);
                    $tabu->safety_margin = $data['depo_safety_margin_' . $i];
                    $tabu->score = $data['depo_score_' . $i];
                    $tabu->nilai_pasar_setelah_sm = $this->normalizeNumber($data['depo_nilai_pasar_setelah_sm_' . $i]);
                    $tabu->market = $data['market_depo_' . $i];
                    $tabu->permasalahan = $data['permasalahan_depo_' . $i];
                    $tabu->penguasaan = $data['penguasaan_depo_' . $i];
                    $tabu->lainnya = $data['lainnya_depo_' . $i];
                    $tabu->save();
                }
            }
        }
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
