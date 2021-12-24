<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'kg',
        'zone_1',
        'zone_2',
        'zone_3',
        'zone_4',
        'zone_5',
        'zone_6',
        'zone_7',
        'zone_8',
        'dimensi'
    ];
    public static function create(
        $kg,   
        $zone_1,
        $zone_2,
        $zone_3,
        $zone_4,
        $zone_5,
        $zone_6,
        $zone_7,
        $zone_8,
        $dimensi
    )
    {
        $data = new static;
        $data->kg = $kg;
        $data->zone_1 = $zone_1;
        $data->zone_2 = $zone_2;
        $data->zone_3 = $zone_3;
        $data->zone_4 = $zone_4;
        $data->zone_5 = $zone_5;
        $data->zone_6 = $zone_6;
        $data->zone_7 = $zone_7;
        $data->zone_8 = $zone_8;
        $data->dimensi = $dimensi;
        return $data->save() ? $data : false;
    }
}
