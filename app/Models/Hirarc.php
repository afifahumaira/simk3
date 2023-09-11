<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hirarc extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    
    public function location()
    {
        return $this->belongsTo(Location_masters::class, 'location_id', 'id', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function departemen() 
    {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }

    public function activitie()
    {
        return $this->belongsTo(Activitie_master::class);
    }

    public function hazard()
    {
        return $this->belongsTo(Hazard::class);
    }

    public function risk()
    {
        return $this->belongsTo(Risk::class);
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
