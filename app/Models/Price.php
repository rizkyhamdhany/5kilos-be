<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'country',
        'postalcode',
        'is_remote_area',
        'price'
    ];

    public static function create($country, $postalcode, $is_remote_area, $price)
    {
        $data = new static;
        $data->country = $country;
        $data->postalcode = $postalcode;
        $data->is_remote_area = $is_remote_area;
        $data->price = $price;
        return $data->save() ? $data : false;
    }
}
