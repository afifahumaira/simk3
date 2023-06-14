<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    protected $guarded;

    public function departemen()
    {
        return $this->belongsTo('App\Models\Departemen');
    }

    public function countActivities()
    {
        $locationId = $this->id;

        return Activitie::whereRaw("FIND_IN_SET($locationId, lokasi)")->count();
    }

}
