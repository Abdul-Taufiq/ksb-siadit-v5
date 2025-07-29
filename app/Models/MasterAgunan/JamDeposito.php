<?php

namespace App\Models\MasterAgunan;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterMuk\SC_Deposito;
use App\Models\MasterMuk\SC_Tabungan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JamDeposito extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_jaminan_deposito';
    protected $dates = ['tgl_berakhir'];
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
}
