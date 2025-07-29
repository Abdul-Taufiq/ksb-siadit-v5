<?php

namespace App\Models\MasterKredit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PikarEks extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_kredit_pikar_eks';
    protected $dates = ['created_at', 'updated_at', 'tgl_perjanjian'];
    protected $primaryKey = 'id_pikar_eks';
    protected $guarded = ['id_pikar_eks'];

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }
}
