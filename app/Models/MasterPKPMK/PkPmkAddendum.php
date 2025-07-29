<?php

namespace App\Models\MasterPKPMK;

use App\Models\Cabang;
use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use App\Models\MasterKredit\Persetujuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PkPmkAddendum extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_pkpmk_addendum';

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime',
        'tgl_addendum' => 'datetime',
        'tgl_awal' => 'datetime',
        'tgl_akhir' => 'datetime',
        'tgl_akta_notaris' => 'datetime',
        'tgl_print_sp_agunan' => 'datetime',
        'tgl_print_sp_asuransi' => 'datetime',
        'tgl_print_addendum' => 'datetime',
        'tgl_print_sp_bawah_tangan' => 'datetime',
        'tgl_print_tpbj' => 'datetime',
        'tgl_print_sppk' => 'datetime'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'tgl_awal',
        'tgl_akhir',
        'tgl_akta_notaris',
        'tgl_addendum',
        'tgl_print_addendum',
        'tgl_print_sp_agunan',
        'tgl_print_sp_asuransi',
        'tgl_print_tpbj',
        'tgl_print_sppk'
    ];

    protected $primaryKey = 'id_addendum';
    protected $guarded = ['id_addendum'];


    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function debitur(): BelongsTo
    {
        return $this->belongsTo(Debitur::class, 'id_debitur', 'id_debitur');
    }

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function persetujuan(): BelongsTo
    {
        return $this->belongsTo(Persetujuan::class, 'id_persetujuan', 'id_persetujuan');
    }

    public function pkpmk(): BelongsTo
    {
        return $this->belongsTo(PKPmk::class, 'id_pkpmk', 'id_pkpmk');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('no_addendum', 'like', "%{$search}%")
                ->orWhere('no_sppk', 'like', "%{$search}%")
                ->orWhere('tgl_addendum', 'like', "%{$search}%");
        });
    }
}
