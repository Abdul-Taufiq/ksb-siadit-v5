<?php

namespace App\Models\MasterAgunan;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterMUK\SC_Kendaraan;
use App\Models\MasterMUK\SC_Kendaraan_Vanalis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JamKenda extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_jaminan_kendaraan';
    protected $dates = ['tgl_akta_fidusia', 'tgl_bpkb'];
    protected $primaryKey = 'id_jaminan_kendaraan';
    protected $guarded = ['id_jaminan_kendaraan'];
    protected $casts = [
        'tgl_akta_fidusia' => 'datetime',
        'tgl_bpkb' => 'datetime',
    ];


    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function sc_kenda_agunan(): BelongsTo
    {
        return $this->belongsTo(SC_Kendaraan::class, 'id_jaminan_kendaraan', 'id_jaminan_kendaraan');
    }

    public function sc_kenda_agunan_vanalis(): BelongsTo
    {
        return $this->belongsTo(SC_Kendaraan_Vanalis::class, 'id_jaminan_kendaraan', 'id_jaminan_kendaraan');
    }
}
