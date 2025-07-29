<?php

namespace App\Models\MasterKredit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjamin extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_penjamin';
    protected $dates = ['created_at', 'updated_at', 'tgl_lahir', 'tgl_lahir_pasangan', 'tgl_akta'];
    protected $primaryKey = 'id_kredit_penjamin';
    protected $guarded = ['id_kredit_penjamin'];

    public $casts = [
        'tgl_lahir' => 'date',
        'tgl_lahir_pasangan' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_akta' => 'date'
    ];

    public function debitur(): HasMany
    {
        return $this->hasMany(Debitur::class, 'id_debitur', 'id_debitur');
    }

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }
}
