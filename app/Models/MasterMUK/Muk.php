<?php

namespace App\Models\MasterMUK;

use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterMuk\SC_Deposito;
use App\Models\MasterMuk\SC_Kendaraan;
use App\Models\MasterMuk\SC_Tabungan;
use App\Models\MasterMuk\SC_Tanah_Agunan;
use App\Models\MasterMuk\SC_Tanah_Perhitungan;
use App\Models\MasterMuk\SC_Tanah_Rekap_1;
use App\Models\MasterMuk\SC_Tanah_Rekap_2;
use App\Models\MasterMuk\SC_Tanah_Scoring;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Muk extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk';
    protected $primaryKey = 'id_muk';
    protected $guarded = ['id_muk'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime',
        'tgl_muk' => 'datetime',
    ];
    protected $dates = ['created_at', 'updated_at', 'tgl_muk'];

    public function kredit()
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function data(): BelongsTo
    {
        return $this->belongsTo(MukData::class, 'id_muk', 'id_muk');
    }

    public function industri(): HasMany
    {
        return $this->hasMany(MukIndustri::class, 'id_muk', 'id_muk');
    }

    public function deviasi(): BelongsTo
    {
        return $this->belongsTo(MukDeviasi::class, 'id_muk', 'id_muk');
    }

    public function keuangan(): BelongsTo
    {
        return $this->belongsTo(MukKeuangan::class, 'id_muk', 'id_muk');
    }

    public function keuanganBjk(): BelongsTo
    {
        return $this->belongsTo(MukKeuanganBjk::class, 'id_muk', 'id_muk');
    }

    public function putusan(): BelongsTo
    {
        return $this->belongsTo(MukPutusan::class, 'id_muk', 'id_muk');
    }

    public function slik(): HasMany
    {
        return $this->hasMany(MukSlik::class, 'id_muk', 'id_muk');
    }

    public function working(): BelongsTo
    {
        return $this->belongsTo(MukWorking::class, 'id_muk', 'id_muk');
    }


    // for scoring
    public function sc_depo(): HasMany
    {
        return $this->hasMany(SC_Deposito::class, 'id_muk', 'id_muk');
    }

    public function sc_kenda(): HasMany
    {
        return $this->hasMany(SC_Kendaraan::class, 'id_muk', 'id_muk');
    }

    public function sc_tabungan(): HasMany
    {
        return $this->hasMany(SC_Tabungan::class, 'id_muk', 'id_muk');
    }

    public function sc_tanah_agunan(): HasMany
    {
        return $this->hasMany(SC_Tanah_Agunan::class, 'id_muk', 'id_muk');
    }

    public function sc_tanah_perhitungan(): HasMany
    {
        return $this->hasMany(SC_Tanah_Perhitungan::class, 'id_muk', 'id_muk');
    }

    public function sc_tanah_rekap_1(): HasMany
    {
        return $this->hasMany(SC_Tanah_Rekap_1::class, 'id_muk', 'id_muk');
    }

    public function sc_tanah_rekap_2(): HasMany
    {
        return $this->hasMany(SC_Tanah_Rekap_2::class, 'id_muk', 'id_muk');
    }

    public function sc_tanah_scoring(): HasMany
    {
        return $this->hasMany(SC_Tanah_Scoring::class, 'id_muk', 'id_muk');
    }


    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('no_muk', 'like', "%{$search}%")
                ->orWhere('tgl_muk', 'like', "%{$search}%");
        });
    }
}
