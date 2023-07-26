<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hirarcdetails extends Model
{
    use SoftDeletes;
    protected $guarded;

    public $timestamps = true;

    // public $table = "hirarc_details";

    public function activity()
    {
        return $this->belongsTo(Activitie::class, 'activity_id', 'id');
    }

    public function hazard()
    {
        return $this->belongsTo(Hazard::class, 'hazard_id', 'id');
    }

    public function risk()
    {
        return $this->belongsTo(Risk::class, 'risk_id', 'id');
    }

    public function control_child()
    {
        return $this->belongsTo('App\Models\Control_children');
    }

    public function hirarcdetails()
    {
        return $this->hasOne(Hirarcdetails::class, 'hirarcdetails', 'id');
        // return $this->hasOne('App\Models\Hirarc_detail_control');
        // return $this->belongsTo('App\Models\Hirarc_detail_control');
    }
    public function prerating()
    {
        return $this->hasOne(Hirarc_prerating::class);
    }

    public function postrating()
    {
        return $this->hasOne(Hirarc_postrating::class);
    }

    public function hirarc()
    {
        return $this->belongsTo(Hirarc::class);
    }

}
