<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderBox;
use App\Models\OrderBoxItem;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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

    public function create(Request $request) {
        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        }
        $order = Order::create(
            $user_id,
            Uuid::uuid(),
            $request->origin_nama,
            $request->origin_perusahaan,
            $request->origin_country,
            $request->origin_alamat,
            $request->origin_alamat2,
            $request->origin_alamat3,
            $request->origin_kodepos,
            $request->origin_kota,
            $request->origin_negara,
            $request->origin_email,
            $request->origin_phone,
            $request->origin_tax_info,
            $request->dest_nama,
            $request->dest_perusahaan,
            $request->dest_country,
            $request->dest_alamat,
            $request->dest_alamat2,
            $request->dest_alamat3,
            $request->dest_kodepos,
            $request->dest_kota,
            $request->dest_negara,
            $request->dest_email,
            $request->dest_phone,
            $request->dest_tax_info,
            $request->nilai_barang,
            $request->berat_barang,
            $request->deskripsi_barang
        );
        if (!$order) {
            return response()->json(['message' => trans('failed create order')], 400);
        }
        foreach($request->boxes as $box) {
            $order_box = OrderBox::create($order->id, $box['p'], $box['l'], $box['t']);
            foreach($box["items"] as $item) {
                OrderBoxItem::create($order_box->id, $item['berat'], $item['desc'], $item['nilai']);
            }
        }
        $order = Order::where('id', $order->id)->with('boxes', 'boxes.items')->first();
        return response()->json(['data' => $order, 'message' => trans('order created')]);
    }

    public function getByCode($code) {
        $order = Order::where('code', $code)->first();
        return response()->json(['data' => $order]);
    }

    public function getByUser() {
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->get();
            return response()->json(['data' => $order]);
        } else {
            return response()->json(['message' => trans('Unauthorized')], 500);
        }
    }
}