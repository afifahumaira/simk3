<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi_risk_detail extends Model
{
    protected $fillable = [
        'hirarc_id',
        'risk_id',
        'multi_activity_detail_id',
        'multi_hazard_detail_id'
    ];

    public function risk()
    {
        return $this->belongsTo('App\Models\Risk');
    }
}
