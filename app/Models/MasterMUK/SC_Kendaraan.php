<?php

namespace App\Models\MasterMuk;

use App\Models\MasterAgunan\JamKenda;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SC_Kendaraan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_sc_kendaraan';
    protected $primaryKey = 'id_sc_kendaraan';
    protected $guarded = ['id_sc_kendaraan'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime',
        'tgl_pemeriksaan' => 'datetime',
        'tgl_dokumen' => 'datetime',
        'd1_tgl' => 'datetime',
        'd2_tgl' => 'datetime',
        'd3_tgl' => 'datetime',
    ];
    protected $dates = ['created_at', 'updated_at', 'tgl_pemeriksaan', 'tgl_dokumen', 'd1_tgl', 'd2_tgl', 'd3_tgl'];

    public function muk(): BelongsTo
    {
        return $this->belongsTo(Muk::class, 'id_muk', 'id_muk');
    }

    public function kenda(): BelongsTo
    {
        return $this->belongsTo(JamKenda::class, 'id_jaminan_kendaraan', 'id_jaminan_kendaraan');
    }
}
