<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hirarc_detail_control extends Model
{

    protected $guarded;
    public $timestamps = false;
    // public $table = "hirarc_detail_controls";

    public function activity()
    {
        return $this->belongsTo('App\Models\Activitie');
        // return $this->belongsTo(Activitie::class);
    }

    public function hazard()
    {
        return $this->belongsTo('App\Models\Hazard');
    }

    public function risk()
    {
        return $this->belongsTo('App\Models\Risk');
    }

    public function control_child()
    {
        return $this->belongsTo('App\Models\Control_children');
    }

    public function hirarc_details()
    {
        return $this->belongsTo(Hirarc_detail::class, 'hirarc_detail_id', 'id');
    }

}
