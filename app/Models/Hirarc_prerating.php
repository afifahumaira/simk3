<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hirarc_prerating extends Model
{
    public $table = "hirarc_preratings";
    protected $guarded;

    public function hirarc()
    {
        return $this->hasMany('App\Models\Hirarc', 'hirarc_detail_id');
    }

    public function hirarc_details()
    {
        return $this->belongsTo('App\Models\Hirarc_detail');
    }
}
