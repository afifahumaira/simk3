<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_master extends Model
{
    public $timestamps = false;
    protected $guarded;

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi_master');
    }

   

}