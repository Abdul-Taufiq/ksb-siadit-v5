<?php

namespace App\Models\Output;

use App\Models\Cabang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonitoringPlanAO extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_monitoring_plan_ao';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at', 'tgl_plan'];
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_plan' => 'datetime',
    ];


    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('no_telp', 'like', "%{$search}%")
                ->orWhere('nama_deb', 'like', "%{$search}%")
                ->orWhere('alamat_jns_kegiatan', 'like', "%{$search}%")
                // ->orWhere('dusun', 'like', "%{$search}%")
                // ->orWhere('desa', 'like', "%{$search}%")
                // ->orWhere('kecamatan', 'like', "%{$search}%")
                // ->orWhere('kabupaten', 'like', "%{$search}%")
                ->orWhere('jns_usaha', 'like', "%{$search}%")
                ->orWhere('visit_asr_ke', 'like', "%{$search}%")
                ->orWhere('nama_ao', 'like', "%{$search}%");
        });
    }
}
