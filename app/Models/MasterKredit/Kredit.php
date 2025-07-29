<?php

namespace App\Models\MasterKredit;

use App\Models\Cabang;
use App\Models\MasterAgunan\JamDeposito;
use App\Models\MasterAgunan\JamKenda;
use App\Models\MasterAgunan\JamTanah;
use App\Models\MasterMUK\Muk;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Models\Output\TrackingSPK;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kredit extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit';
    protected $primaryKey = 'id_kredit';
    protected $guarded = ['id_kredit'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime',
        'tgl_pengajuan' => 'datetime',
        'tgl_print_spk' => 'datetime',
        'tgl_awal' => 'datetime',
        'tgl_akhir' => 'datetime'
    ];
    protected $dates = ['created_at', 'updated_at', 'tgl_pengajuan', 'tgl_print_spk', 'tgl_awal', 'tgl_akhir'];

    protected $with = [
        'debitur',
    ];

    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'id_debitur', 'id_debitur');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function penjamin(): HasMany
    {
        return $this->hasMany(Penjamin::class, 'id_kredit', 'id_kredit');
    }

    public function jamtanah(): HasMany
    {
        return $this->hasMany(JamTanah::class, 'id_kredit', 'id_kredit');
    }

    public function jamkenda(): HasMany
    {
        return $this->hasMany(JamKenda::class, 'id_kredit', 'id_kredit');
    }

    public function jamdeposito(): HasMany
    {
        return $this->hasMany(JamDeposito::class, 'id_kredit', 'id_kredit');
    }

    public function pikareks(): BelongsTo
    {
        return $this->belongsTo(PikarEks::class, 'id_kredit', 'id_kredit');
    }

    public function persetujuan(): BelongsTo
    {
        return $this->belongsTo(Persetujuan::class, 'id_kredit', 'id_kredit');
    }

    public function pkpmk(): HasMany
    {
        return $this->hasMany(PkPmk::class, 'id_kredit', 'id_kredit');
    }

    public function addendum(): BelongsTo
    {
        return $this->belongsTo(PkPmkAddendum::class, 'id_kredit', 'id_kredit');
    }

    public function ktracking(): HasMany
    {
        return $this->hasMany(TrackingSPK::class, 'id_kredit', 'id_kredit');
    }

    // muk
    public function muk(): HasMany
    {
        return $this->hasMany(Muk::class, 'id_kredit', 'id_kredit');
    }


    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('no_spk', 'like', "%{$search}%")
                ->orWhere('petugas_penerima', 'like', "%{$search}%");
        });
    }
}
