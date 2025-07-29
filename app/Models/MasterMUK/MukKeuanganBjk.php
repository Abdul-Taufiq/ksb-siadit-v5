<?php

namespace App\Models\MasterMUK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MukKeuanganBjk extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_keuangan_bjk';
    protected $primaryKey = 'id_keuangan_bjk';
    protected $guarded = ['id_keuangan_bjk'];

    public $casts = [
        'created_at' => 'date',
        'updated_at' => 'datetime'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function muk(): BelongsTo
    {
        return $this->belongsTo(Muk::class, 'id_muk', 'id_muk');
    }
}
