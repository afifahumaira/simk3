<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi_activity_detail extends Model
{
    protected $fillable = [
        'hirarc_id',
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo('App\Models\Activitie');
    }
}
