<?php

namespace App\Models\Output;

use App\Models\Cabang;
use App\Models\MasterKredit\Kredit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class TrackingSPK extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tb_tracking_spk';
    protected $dates = ['created_at', 'updated_at', 'tgl_status', 'tgl_masuk'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tgl_status' => 'datetime',
        'tgl_masuk' => 'datetime',
    ];
    protected $primaryKey = 'id_tracking';
    protected $guarded = ['id_tracking'];

    public function kredit(): BelongsTo
    {
        return $this->belongsTo(Kredit::class, 'id_kredit', 'id_kredit');
    }

    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }


    public static function AddTrackingSPK($kredit, $data)
    {
        self::create([
            'id_cabang' => $kredit['id_cabang'],
            'id_kredit' => $kredit['id_kredit'],
            'creator' => $kredit['petugas_penerima'],
            'nama' => $data['nama'], // nama user up
            'jabatan' => $data['jabatan'],
            'status' => $data['status'],
            'tgl_masuk' => $data['tgl_masuk'],
            'status_spk' => $data['status_spk'],
        ]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('creator', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%")
                ->orWhere('jabatan', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        });
    }
}
