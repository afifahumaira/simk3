<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class P3k extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class,'inventory_id');
    }
}
