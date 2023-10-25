<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departemen extends Model
{
    protected $table = 'departemens';

    use HasFactory;

    protected $fillable = [
        'name', 'departemen_id'
    ];

    public function location() {
        return $this->hasMany(Location::class, 'departemen_id', 'id');
    }

    public function investigasi() {
        return $this->hasMany(Investigasi::class, 'departemen_id');
    }

    public function investigasipotensi() {
        return $this->hasMany(InvestigasiPotensi::class, 'departemen_id');
    }

    public function potensibahaya() {
        return $this->hasMany(Potensibahaya::class, 'departemen_id');
    }

    public function laporinsiden() {
        return $this->hasMany(Laporinsiden::class, 'departemen_id');
    }

    public function p2k3() {
        return $this->hasMany(P2k3::class, 'departemen_id');
    }

    public function user() {
        return $this->hasMany(User::class, 'departemen_id');
    }

    public function hirarc() {
        return $this->hasMany(User::class, 'departemen_id');
    }

}
