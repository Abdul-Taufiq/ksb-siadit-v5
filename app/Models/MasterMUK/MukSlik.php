<?php

namespace App\Models\MasterMUK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MukSlik extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_slik';
    protected $primaryKey = 'id_slik';
    protected $guarded = ['id_slik'];

    public $casts = [
        'tgl_awal' => 'datetime',
        'tgl_akhir' => 'datetime',
        'created_at' => 'date',
        'updated_at' => 'datetime'
    ];
    protected $dates = ['tgl_awal', 'tgl_akhir', 'created_at', 'updated_at'];

    public function muk(): BelongsTo
    {
        return $this->belongsTo(Muk::class, 'id_muk', 'id_muk');
    }
}
