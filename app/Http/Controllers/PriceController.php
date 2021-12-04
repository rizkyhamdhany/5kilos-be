<?php

namespace App\Http\Controllers;

use App\Models\Price;
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
        $price = Price::where([
            ['country', '=', $request->country],
            ['postalcode', '=', $request->postalcode]
        ])->first();
        if (!$price) {
            return response()->json(['message' => trans('price not found!')], 404);
        }
        return response()->json(['data' => $price]);
    }
}