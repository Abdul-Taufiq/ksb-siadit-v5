<?php

namespace App\Models;

use App\Models\MasterMUK\Muk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabang extends Model
{
    //
    use HasFactory;

    protected $connection = 'mysql';
    protected $primaryKey = 'id_cabang';
    protected $table = 'cabang';

    protected $casts = [
        'tgl_lahir' => 'datetime',
        'tgl_surat_kuasa' => 'datetime'
    ];

    protected $date = [
        'tgl_lahir',
        'tgl_surat_kuasa',
    ];

    public function User(): HasMany
    {
        return $this->hasMany(User::class, 'id_cabang', 'id_cabang');
    }


    public function logActivity(): HasMany
    {
        return $this->hasMany(Output\LogActivity::class, 'id_cabang', 'id_cabang');
    }


    public function Kredit(): HasMany
    {
        return $this->hasMany(MasterKredit\Kredit::class, 'id_cabang', 'id_cabang');
    }

    public function Debitur(): HasMany
    {
        return $this->hasMany(MasterKredit\Debitur::class, 'id_cabang', 'id_cabang');
    }

    public function Muk(): HasMany
    {
        return $this->hasMany(Muk::class, 'id_cabang', 'id_cabang');
    }
}
