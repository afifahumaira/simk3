<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_masters extends Model
{
    public $timestamps = false;
    protected $guarded;

    
    public function hirarc()
    {
        return $this->hasMany(Hirarc::class);
    }


}
