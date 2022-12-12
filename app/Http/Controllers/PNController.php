<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\payment\TripayController;

class PNController extends Controller
{
    public function checkout()
    {
        $products = Cart::where('users_id', Auth::user()->id)->get();

        $tripay = new TripayController();

        $pay = $tripay->pay();

        $prices = [];

        foreach($products as $cart){
            $price = $cart->product->price;

            $subtotal = $price * $cart->quantity;

            array_push($prices, $subtotal);
        };


        $total = array_sum($prices);

    $qty = Cart::all()->where('users_id',auth()->id())->sum('quantity');


        return view('checkout-payments', compact('products', 'pay', 'total', 'qty'));
    }
}
