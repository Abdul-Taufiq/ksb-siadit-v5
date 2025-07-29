<?php

namespace App\Models\MasterKredit;

use App\Models\Cabang;
use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persetujuan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_persetujuan';
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'id_persetujuan';
    protected $guarded = ['id_persetujuan'];

    public function debitur(): BelongsTo
    {
        return $this->belongsTo(Debitur::class, 'id_debitur', 'id_debitur');
    }

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function pkpmk(): BelongsTo
    {
        return $this->belongsTo(PkPmk::class, 'id_pkpmk', 'id_pkpmk');
    }

    public function addendum(): BelongsTo
    {
        return $this->belongsTo(PkPmkAddendum::class, 'id_addendum', 'id_addendum');
    }

    public function cabang(): HasMany
    {
        return $this->hasMany(Cabang::class, 'id_cabang', 'id_cabang');
    }
}
