<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'departemen_id',
        'name',
        'id_benda',
        'tipe',
        'departemen_id',
        'lokasi',
        'berat',
        'tanggal_kadaluwarsa',
        'kondisi',
        'gambar',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function inspeksi_apar()
    {
        return $this->hasOne(Apar::class, 'inventory_id');
    }

    public function inspeksi_p3k()
    {
        return $this->hasOne(P3k::class, 'p3k_inventory_id');
    }

}
