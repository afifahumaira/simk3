<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi_hazard_detail extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'hirarc_id',
        'hazard_id',
        'multi_activity_detail_id'
    ];

    public function hazard()
    {
        return $this->belongsTo('App\Models\Hazard');
    }
}
