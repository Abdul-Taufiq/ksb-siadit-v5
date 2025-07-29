<?php

namespace App\Models\Output;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_version';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at', 'tgl_rilis'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_rilis' => 'datetime',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('kode_versi', 'like', "%{$search}%")
                ->orWhere('pembaruan', 'like', "%{$search}%")
                ->orWhere('file', 'like', "%{$search}%");
        });
    }
}
