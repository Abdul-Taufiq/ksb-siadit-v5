<?php

namespace App\Models\MasterAgunan;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterMUK\SC_Deposito;
use App\Models\MasterMUK\SC_Deposito_Vanalis;
use App\Models\MasterMUK\SC_Tabungan;
use App\Models\MasterMUK\SC_Tabungan_Vanalis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JamDeposito extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_jaminan_deposito';
    protected $dates = ['tgl_deposito'];
    protected $casts = ['tgl_deposito' => 'datetime'];
    protected $primaryKey = 'id_jaminan_deposito';
    protected $guarded = ['id_jaminan_deposito'];


    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function sc_depo(): BelongsTo
    {
        return $this->belongsTo(SC_Deposito::class, 'id_jaminan_deposito', 'id_jaminan_deposito');
    }

    public function sc_tabungan(): BelongsTo
    {
        return $this->belongsTo(SC_Tabungan::class, 'id_jaminan_deposito', 'id_jaminan_deposito');
    }

    public function sc_depo_vanalis(): BelongsTo
    {
        return $this->belongsTo(SC_Deposito_Vanalis::class, 'id_jaminan_deposito', 'id_jaminan_deposito');
    }

    public function sc_tabungan_vanalis(): BelongsTo
    {
        return $this->belongsTo(SC_Tabungan_Vanalis::class, 'id_jaminan_deposito', 'id_jaminan_deposito');
    }
}
