<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBoxItem extends Model
{
    protected $fillable = [
        'box_id',
        'berat',
        'desc',
        'nilai'
    ];

    public static function create($box_id, $berat, $desc, $nilai)
    {
        $data = new static;
        $data->box_id = $box_id;
        $data->berat = $berat;
        $data->desc = $desc;
        $data->nilai = $nilai;
        return $data->save() ? $data : false;
    }
}
