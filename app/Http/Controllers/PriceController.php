<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Zone;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get(Request $request) {
        $zone = Zone::where('country_code', $request->country_code)->first();
        $weight = ceil($request->weight);
        if ($request->p && $request->l && $request->t) {
            $dimens = $request->p * $request->l * $request->t;
            if ($dimens / 5000 > $weight) {
                $weight = ceil($dimens / 5000);
            }
        }  
        $zone_id = 'zone_'.$zone->zone_id;
        $price = Price::select($zone_id)->where([
            ['kg', '>=', $weight]
        ])->orderBy('kg')->first();
        if (!$price) {
            return response()->json(['message' => trans('price not found!')], 404);
        }
        $total_price = $price[$zone_id] * $weight;
        return response()->json(['data' => ['price' => $total_price]]);
    }
}