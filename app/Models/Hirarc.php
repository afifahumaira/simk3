<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hirarc extends Model
{
    use SoftDeletes;

    protected $guarded;

    public function hirarc_detail()
    {
        return $this->hasMany(Hirarc_detail::class, 'hirarc_id', 'id');
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
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function departemen() {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }

    // public function activity()
    // {
    //     return $this->belongsTo('App\Models\Activitie');
    // }

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
