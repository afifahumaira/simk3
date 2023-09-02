<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestigasiPotensi extends Model
{
    use SoftDeletes;

    protected $guarded;

    protected $casts = [
        'tenggat_waktu' => 'date:Y-m-d'
    ];

    public function potensibahaya()
    {
        return $this->belongsTo(Potensibahaya::class, 'potensibahaya_id', 'id');
    }

    public function p2k3_data()
    {
        return $this->belongsTo(P2k3::class, 'p2k3', 'id', 'nama')->withDefault([
            'nama' => '']);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }
}
