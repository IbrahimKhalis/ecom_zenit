<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\payment\TripayController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($reference)
    {
        $tripay = new TripayController();
        $detail =  $tripay->detailTransaction($reference);

        return view('dashboard.transaction.detail', compact('detail'));
    }

    public function store(Request $request)
    {
        $carts = Cart::where('users_id', auth()->id())->latest()->get();


        $kumpulHarga = [];

        foreach($carts as $cart){
            array_push($kumpulHarga, $cart->product->price * $cart->quantity);
        }


        $total = array_sum($kumpulHarga);

        
        $Product = [];

        foreach($carts as $products){
            array_push($Product, [
                'sku'         => $products->product->id,
                'name'        => $products->product->name,
                'price'       => $products->product->price,
                'quantity'    => $products->quantity,
            ]);
        };


        $method = $request->method;

        $tripay = new TripayController();
        $transaction = $tripay->ReqPayment($method, $Product, $total); //Very Important !

        // Create a new data

        $order_id = Order::insertGetId([
            'users_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000 ,99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'created_at' => Carbon::now(),
        ]);


        foreach ($carts as $cart) {
            OrderItem::insert([
                'orders_id' => $order_id,
                'products_id' => $cart->products_id,
                'product_name' => $cart->product->name,
                'product_qty' => $cart->quantity,
                'subtotal'=> $cart->quantity * $cart->product->price,
                'created_at' => Carbon::now(),
            ]);
        }

        Shipping::insert([
            'orders_id' => $order_id,
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'adress' => $request->adress,
            'created_at' => Carbon::now(),
        ]);


        Cart::where('users_id', auth()->id())->delete();


        Transaction::create([
            'user_id' => auth()->user()->id,
            'order_id' => $order_id,
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'total_amount' => $transaction->amount,
            'status' => $transaction->status,
        ]);

        return redirect()->route('transaction.detail', [
            'reference' => $transaction->reference,
        ]);


    }
}
