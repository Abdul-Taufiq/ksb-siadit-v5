<?php

namespace App\Models\Output;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class LogActivity extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_log_activity';
    protected $primaryKey = 'id_log';
    protected $guarded = ['id_log'];

    protected $casts = [
        'created_at',
        'updated_at'
    ];

    protected $date = [
        'created_at',
        'updated_at'
    ];


    public static function AddLog($aksi)
    {
        self::create([
            'id_cabang' => Auth::user()->id_cabang,
            'username' => Auth::user()->nama,
            'email' => Auth::user()->email,
            'level' => Auth::user()->level,
            'jabatan' => Auth::user()->jabatan,
            'aksi' => $aksi,
        ]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('aksi', 'like', "%{$search}%");
        });
    }


    public function cabang(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Cabang::class, 'id_cabang', 'id_cabang');
    }
}
