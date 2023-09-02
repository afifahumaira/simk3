<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Potensibahaya extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded;

    public function p2k3()
    {
        return $this->belongsTo(P2k3::class);
    }

    public function departemen()
    {
        return $this->belongsTo('App\Models\Departemen');
    }

    public static function generateCode()
    {
        $latestRecord = self::latest()->first(); // Retrieve the latest record from the table

        if ($latestRecord) {
            $latestCode = $latestRecord->kode_potensibahaya;
            $number = intval(substr($latestCode, strpos($latestCode, '-') + 1)) + 1;
        } else {
            $number = 1;
        }

        return 'PTNBHYA-' . str_pad($number, 2, '0', STR_PAD_LEFT);
    }
}
