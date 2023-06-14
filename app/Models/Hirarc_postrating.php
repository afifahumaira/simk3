<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hirarc_postrating extends Model
{
    public $table = "hirarc_postratings";
    protected $guarded;

    public function hirarc_details()
    {
        return $this->belongsTo('App\Models\Hirarc_detail');
    }

    public function hirarc()
    {
        return $this->belongsTo(Hirarc::class);
    }
}
