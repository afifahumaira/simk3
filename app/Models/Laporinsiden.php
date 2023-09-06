<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporinsiden extends Model
{
    use SoftDeletes;

    protected $guarded;

    protected $casts = [
        'waktu_kejadian' => 'date:Y-m-d'
    ];

    public function p2k3()
    {
        return $this->belongsTo(P2k3::class, 'p2k3_id', 'id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id', 'id');
    }

    public function investigasi()
    {
        return $this->hasMany(Investigasi::class);
    }

    public static function generateCode()
    {
        $latestRecord = self::latest()->first(); // Retrieve the latest record from the table

        if ($latestRecord) {
            $latestCode = $latestRecord->kode_laporinsiden;
            $number = intval(substr($latestCode, strpos($latestCode, '-') + 1)) + 1;
        } else {
            $number = 1;
        }

        return 'INSDN-' . str_pad($number, 2, '0', STR_PAD_LEFT);
    }

}
