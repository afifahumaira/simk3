<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investigasi extends Model
{
    use SoftDeletes;

    protected $guarded;

    protected $casts = [
        'tenggat_waktu' => 'date:Y-m-d'
    ];

    public function laporinsiden()
    {
        return $this->belongsTo(Laporinsiden::class, 'laporinsiden_id', 'id');
    }

    public function p2k3()
    {
        return $this->belongsTo(P2k3::class, 'p2k3_id', 'id', 'nama')->withDefault([
            'nama' => '']);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }


}
