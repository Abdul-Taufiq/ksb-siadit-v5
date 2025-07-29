<?php

namespace App\Models\Output;

use App\Models\Cabang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TApht extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_tapht';
    protected $primaryKey = 'id_tapht';
    protected $dates = ['created_at', 'updated_at', 'tgl_awal', 'tgl_akhir'];
    protected $guarded = ['id_tapht'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_awal' => 'datetime',
        'tgl_akhir' => 'datetime',
    ];


    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('kode', 'like', "%{$search}%")
                ->orWhere('sertifikat', 'like', "%{$search}%")
                ->orWhere('nomor', 'like', "%{$search}%");
        });
    }
}
