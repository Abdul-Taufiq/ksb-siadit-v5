<?php

namespace App\Models\MasterKredit;

use App\Models\Cabang;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debitur extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'debitur';
    protected $dates = ['created_at', 'tgl_lahir', 'tgl_lahir_pasangan', 'tgl_pernikahan', 'tgl_akta'];
    protected $primaryKey = 'id_debitur';
    protected $guarded = ['id_debitur'];

    public $casts = [
        'created_at',
        'tgl_lahir' => 'datetime',
        'tgl_lahir_pasangan' => 'datetime',
        'tgl_pernikahan' => 'datetime',
        'tgl_akta' => 'datetime'
    ];


    public function Cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_debitur', 'id_debitur');
    }

    public function persetujuan(): BelongsTo
    {
        return $this->belongsTo(Persetujuan::class, 'id_debitur', 'id_debitur');
    }

    public function pkpmk(): BelongsTo
    {
        return $this->belongsTo(PkPmk::class, 'id_debitur', 'id_debitur');
    }

    public function addendum(): BelongsTo
    {
        return $this->belongsTo(PkPmkAddendum::class, 'id_debitur', 'id_debitur');
    }

    public function penjamin(): HasMany
    {
        return $this->hasMany(Penjamin::class, 'id_debitur', 'id_debitur');
    }



    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('nama_debitur', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%");
        });
    }
}
