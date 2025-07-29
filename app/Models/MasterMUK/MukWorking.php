<?php

namespace App\Models\MasterMUK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MukWorking extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_working';
    protected $primaryKey = 'id_working';
    protected $guarded = ['id_working'];

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
