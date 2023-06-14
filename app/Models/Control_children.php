<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_children extends Model
{
    public $table = "control_childrens";
    public $timestamps = false;

    public function control() {
        return $this->belongsTo(Control::class, 'parent_id', 'id');
    }
}
