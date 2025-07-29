<?php

namespace App\Models\MasterMuk;

use App\Models\MasterAgunan\JamTanah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SC_Tanah_Rekap_2 extends Model
{

    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_sc_tanah_rekap_2';
    protected $primaryKey = 'id_sc_rekap_2';
    protected $guarded = ['id_sc_rekap_2'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function muk(): BelongsTo
    {
        return $this->belongsTo(Muk::class, 'id_muk', 'id_muk');
    }

    public function tanah(): BelongsTo
    {
        return $this->belongsTo(JamTanah::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }
}
