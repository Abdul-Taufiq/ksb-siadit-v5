<?php

namespace App\Models\Output;

use App\Models\Cabang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonitoringAo extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_monitoring_ao';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at', 'tgl_awal', 'tgl_akhir'];
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_kunjungan' => 'datetime',
    ];


    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('no_hp_cadeb', 'like', "%{$search}%")
                ->orWhere('nama_cadeb', 'like', "%{$search}%")
                ->orWhere('usaha', 'like', "%{$search}%")
                ->orWhere('dusun', 'like', "%{$search}%")
                ->orWhere('desa', 'like', "%{$search}%")
                ->orWhere('kecamatan', 'like', "%{$search}%")
                ->orWhere('kabupaten', 'like', "%{$search}%")
                ->orWhere('klasifikasi', 'like', "%{$search}%")
                ->orWhere('potensi_plafond', 'like', "%{$search}%")
                ->orWhere('nama_ao', 'like', "%{$search}%");
        });
    }
}
