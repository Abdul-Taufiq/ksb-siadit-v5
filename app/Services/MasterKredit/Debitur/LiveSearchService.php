<?php

namespace App\Services\MasterKredit\Debitur;

use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LiveSearchService
{
    // SEARCHING LIVE
    public function search(Request $request)
    {
        $key = $request->input('key');
        // Memastikan $key tidak kosong sebelum melanjutkan
        if (!empty($key)) {
            $results = Debitur::with('kredit', 'kredit.jamtanah', 'kredit.jamkenda')
                ->where('nik', '=', $key)
                ->orWhere('nik_pasangan', '=', $key)
                ->get();

            // Mengenkripsi ID setiap debitur
            $results->transform(function ($debitur) {
                $debitur->encrypted_id = Crypt::encrypt($debitur->id_debitur);
                return $debitur;
            });

            return response()->json($results);
        } else {
            // Jika $key kosong, Anda dapat mengembalikan respons kosong atau respons yang sesuai dengan kebutuhan Anda.
            return response()->json(['message' => 'Key tidak boleh kosong'], 400);
        }
    }



    // show modal search
    public function showModal($idEncrypt)
    {
        $ids = Crypt::decrypt($idEncrypt); //decript link
        $debitur = Debitur::where('id_debitur', $ids)->first();

        if (!empty($debitur->kredit->id_kredit)) {
            $id_kredit = $debitur->kredit->id_kredit;
        } else {
            $id_kredit = 0;
        }
        $penjamins = Penjamin::where('id_kredit', $id_kredit)->get();
        $jam_tanah = JamTanah::where('id_kredit', $id_kredit)->get();
        $jam_kenda = JamKenda::where('id_kredit', $id_kredit)->get();
        $jam_depo = JamDeposito::where('id_kredit', $id_kredit)->get();

        return view('page.master-kredit.debitur.debitur-detail-modal', compact('debitur', 'jam_tanah', 'jam_kenda', 'penjamins', 'id_kredit', 'jam_depo'));
    }



    public function searchAgunan(Request $request)
    {
        $key = $request->input('key');
        $results = JamTanah::with('kredit', 'kredit.debitur')
            ->where('no_shm_shgb', '=',  $key)
            ->orderBy('created_at', 'asc')
            ->get();

        // Mengenkripsi ID setiap debitur
        $results->transform(function ($jam_tanah) {
            $jam_tanah->encrypted_id = Crypt::encrypt($jam_tanah->id_jaminan_pertanahan);
            return $jam_tanah;
        });
        return response()->json($results);
    }



    public function searchAgunanKenda(Request $request)
    {
        $key = $request->input('key');
        $results = JamKenda::with('kredit', 'kredit.debitur')
            ->where('no_bpkb', '=',  $key)
            ->orderBy('created_at', 'asc')
            ->get();

        // Mengenkripsi ID setiap debitur
        $results->transform(function ($jam_kenda) {
            $jam_kenda->encrypted_id = Crypt::encrypt($jam_kenda->id_jaminan_kendaraan);
            return $jam_kenda;
        });
        return response()->json($results);
    }




    public function showModalAgunan($idEncrypt)
    {
        $ids = Crypt::decrypt($idEncrypt); //decript link
        $jam_tanah = JamTanah::where('id_jaminan_pertanahan', $ids)->first();
        $jam_kenda = JamKenda::where('id_jaminan_kendaraan', $ids)->first();
        $jam_depo = JamDeposito::where('id_jaminan_deposito', $ids)->first();

        return view('page.master-kredit.debitur.modal-agunan-show', compact('jam_tanah', 'jam_kenda', 'jam_depo'));
    }
}
