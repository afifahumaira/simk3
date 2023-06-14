<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class P3k_inventories extends Model
{
    use SoftDeletes;
    
    public function departemen()
    {
        return $this->belongsTo('App\Models\Departemen');
    }
}
