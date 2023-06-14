<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class P2k3 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'nama',
        'avatar',
        'jabatan',
        'departemen',
        'password',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
