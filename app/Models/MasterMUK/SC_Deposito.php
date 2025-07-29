<?php

namespace App\Models\MasterMuk;

use App\Models\MasterAgunan\JamDeposito;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SC_Deposito extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_sc_deposito';
    protected $primaryKey = 'id_sc_deposito';
    protected $guarded = ['id_sc_deposito'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime',
        'tgl_pemeriksaan' => 'datetime',
        'tgl_bilyet' => 'datetime',
        'tgl_jatuh_tempo' => 'datetime',
    ];
    protected $dates = ['created_at', 'updated_at', 'tgl_pemeriksaan', 'tgl_bilyet', 'tgl_jatuh_tempo'];

    public function muk(): BelongsTo
    {
        return $this->belongsTo(Muk::class, 'id_muk', 'id_muk');
    }

    public function depo(): BelongsTo
    {
        return $this->belongsTo(JamDeposito::class, 'id_jaminan_deposito', 'id_jaminan_deposito');
    }
}
