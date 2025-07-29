<?php

namespace App\Http\Middleware;

use App\Models\Output\TApht;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class SendEmailTAPHT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hitung tanggal 10 hari dari sekarang
        $dateExp = Carbon::now()->addDays(10)->toDateString();

        // Ambil data yang tanggal akhirnya 10 hari atau kurang dari sekarang
        $data = TApht::whereDate('tgl_akhir', '<=', $dateExp)
            ->where(function ($query) {
                $query->whereNull('mail_notif') // Jika mail_notif belum diisi
                    ->orWhere('mail_notif', '!=', 'Terkirim'); // Jika mail_notif tidak sama dengan 'Terkirim'
            })
            ->get();


        foreach ($data as $item) {
            // Kirim email kepada user
            $user = User::where('id_cabang', $item->id_cabang)
                ->where('jabatan', 'Kasi Operasional')
                ->where('sub_jabatan', 'Kasi Operasional')
                ->where('status', 'Aktif')
                // ->where('email', 'like', '%dummy%')
                ->whereNot('email', 'like', '%dummy%')
                // ->whereNot('nama', 'like', '%ALT%')
                ->first();

            if ($user) {
                # code...
                Mail::send('email.notif-exp-apht', [
                    'kc' => $item->cabang->cabang,
                    'kode' => $item->kode,
                    'tgl_awal' => $item->tgl_awal,
                    'tgl_akhir' => $item->tgl_akhir,
                    'nomor' => $item->nomor,
                    'jns_perikatan' => $item->jns_perikatan,
                    'keterangan' => $item->keterangan,
                ], function ($message) use ($user) {
                    $message->from('tsiksb@bprkusumasumbing.com', 'KSB | Si-ADIT');
                    $message->to($user->send_mail);
                    $message->subject('Reminder Covernote');
                });

                $item->mail_notif = 'Terkirim';
                $item->save();
                Log::info('Email sent to: ' . $user->send_mail);
            } else {
                Log::warning('Tidak ada User yg ditemukan :D ');
            }
        }
        return $next($request);
    }
}
