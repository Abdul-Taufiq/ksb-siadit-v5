<?php

namespace App\Models\MasterAgunan;

use App\Models\MasterKredit\Kredit;
use App\Models\MasterMuk\{SC_Tanah_Agunan, SC_Tanah_Perhitungan, SC_Tanah_Rekap_1, SC_Tanah_Rekap_2, SC_Tanah_Scoring};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JamTanah extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_jaminan_pertanahan';
    protected $casts = [
        'tgl_sertifikat' => 'datetime',
        'tgl_surat_ukur' => 'datetime',
        'tgl_akta_perikatan' => 'datetime',
    ];
    protected $dates = ['created_at', 'updated_at', 'tgl_sertifikat', 'tgl_surat_ukur', 'tgl_akta_perikatan'];
    protected $primaryKey = 'id_jaminan_pertanahan';
    protected $guarded = ['id_jaminan_pertanahan'];


    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function sc_tanah_agunan(): BelongsTo
    {
        return $this->belongsTo(SC_Tanah_Agunan::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }

    public function sc_tanah_perhitungan(): HasMany
    {
        return $this->hasMany(SC_Tanah_Perhitungan::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }

    public function sc_tanah_rekap_1(): BelongsTo
    {
        return $this->belongsTo(SC_Tanah_Rekap_1::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }

    public function sc_tanah_rekap_2(): BelongsTo
    {
        return $this->belongsTo(SC_Tanah_Rekap_2::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }

    public function sc_tanah_scoring(): BelongsTo
    {
        return $this->belongsTo(SC_Tanah_Scoring::class, 'id_jaminan_pertanahan', 'id_jaminan_pertanahan');
    }
}
