<?php

namespace App\Http\Middleware;

use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailKreditLengkap
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek hari ini apakah hari kirim email
        $now = Carbon::now('Asia/Jakarta');
        // email akan dikirim setiap hari senin
        if ($now->isMonday()) {
            // ambil data dulu
            $kredit = Kredit::where('keterangan_kaops', 'Tidak Lengkap')
                ->whereBetween('created_at', [Carbon::today()->subDays(180), Carbon::today()->endOfDay()])
                ->get();

            foreach ($kredit as $item) {
                // Kirim email kepada user
                $user = Cabang::where('id_cabang', $item->id_cabang)->first();

                // cek user dan apakah sebelumnya email sudah dikirim dengan cara kita lihat updated_at nya != hari ini, jika sama maka tandanya udah dikirim
                if (
                    $user && $user->email_kaops && !$item->updated_at->isSameDay(Carbon::today('Asia/Jakarta'))
                ) {
                    # code...
                    Mail::send('email.notif-berkas-lengkap', [
                        'kc' => $item->cabang->cabang,
                        'spk' => $item->no_spk,
                        'nama_debitur' => $item->debitur->nama_debitur,
                        'keterangan' => $item->keterangan_kaops,
                        'catatan' => $item->catatan_kaops,
                    ], function ($message) use ($user) {
                        $message->from('tsiksb@bprkusumasumbing.com', 'KSB | Si-ADIT');
                        $message->to($user->email_kaops);
                        $message->subject('Reminder Kelengkapan Berkas Kredit');
                    });

                    // update untuk yang udah dikirim email
                    $item->update(['updated_at' => Carbon::now('Asia/Jakarta')]);

                    Log::info('Email sent to: ' . $user->email_kaops);
                } else {
                    Log::warning('Tidak ada User yg ditemukan :D ');
                }
            }
        }





        return $next($request);
    }
}
