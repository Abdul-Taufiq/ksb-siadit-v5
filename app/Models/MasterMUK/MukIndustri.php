<?php

namespace App\Models\MasterMUK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MukIndustri extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_muk_industri';
    protected $primaryKey = 'id_industri';
    protected $guarded = ['id_industri'];

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
