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
        'name',
    ];

    public function apar():HasOne
    {
        return $this->hasOne(Apar::class, 'id');
    }

    public function location() {
        return $this->hasMany(Location::class, 'departemen_id', 'id');
    }

}
