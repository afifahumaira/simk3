<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hirarc extends Model
{
    use SoftDeletes;

    protected $guarded;

    public function hirarcdetails()
    {
        return $this->belongsToMany(Hirarcdetails::class);
    }

    public function prerating()
    {
        return $this->hasOne(Hirarc_prerating::class, 'hirarc_id', 'id');
    }

    public function postrating()
    {
        return $this->hasOne(Hirarc_postrating::class, 'hirarc_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location_masters::class, 'location_id', 'id', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function departemen() {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }

    public function activitie()
    {
        return $this->belongsTo(Activitie_master::class, 'activitie_id', 'id');
    }

    public function hazard()
    {
        return $this->belongsTo(Hazard::class, 'hazard_id', 'id');
    }

    public function risk()
    {
        return $this->belongsTo(Risk::class, 'risk_id', 'id');
    }

    

    // public function hazard()
    // {
    //     return $this->belongsTo('App\Models\Hazard');
    // }

    // public function risk()
    // {
    //     return $this->belongsTo('App\Models\Risk');
    // }

    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];

}
