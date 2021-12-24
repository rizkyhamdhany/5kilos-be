<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'zone_id',
        'country_name',
        'country_code'
    ];

    public static function create($zone_id, $country_name, $country_code)
    {
        $data = new static;
        $data->zone_id = $zone_id;
        $data->country_name = $country_name;
        $data->country_code = $country_code;
        return $data->save() ? $data : false;
    }
}
