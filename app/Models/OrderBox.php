<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBox extends Model
{
    protected $fillable = [
        'order_id',
        'p',
        'l',
        't'
    ];

    public static function create(
        $order_id,
        $p,
        $l,
        $t
    )
    {
        $data = new static;
        $data->order_id = $order_id;
        $data->p = $p;
        $data->l = $l;
        $data->t = $t;
        return $data->save() ? $data : false;
    }

    public function items()
    {
        return $this->hasMany(OrderBoxItem::class, "box_id", "id");
    }
}
