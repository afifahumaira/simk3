<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class P2k3 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'nama',
        'avatar',
        'jabatan',
        'departemen',
        'password',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function insiden()
    {
        return $this->hasMany(Laporinsiden::class, 'p2k3_id');
    }
    
    public function investigasi()
    {
        return $this->hasMany(Investigasi::class, 'p2k3_id');
    }

    public function investigasipotensi()
    {
        return $this->hasMany(InvestigasiPotensi::class, 'p2k3');
    }

    public function potensibahaya()
    {
        return $this->hasMany(Potensibahaya::class, 'p2k3_id');
    }
}
