<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie_master extends Model
{
    use HasFactory;

    protected $guarded;
    public $timestamps = false;

    public function countLocations()
    {
        $locations = explode(',', $this->lokasi);

        return count($locations);
    }

    public function countHazards()
    {
        $activity_id = $this->id;

        return Hazard::whereRaw("FIND_IN_SET($activity_id, aktifitas)")->count();
    }

    public function hirarc()
    {
        return $this->hasMany(Hirarc::class);
    }

}
