<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_masters extends Model
{
    public $timestamps = false;
    protected $guarded;

    public function location_masters()
    {
        return $this->belongsTo('App\Models\Location_masters');
    }


}
