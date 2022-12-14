<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $carts = Cart::where('users_id', Auth()->id())->latest()->get();

        $prices = [];
        
            foreach($carts as $cart){
                $price = $cart->product->price;
        
                $subtotal = $price * $cart->quantity;
        
                array_push($prices, $subtotal);
            };
        
        
            $total = array_sum($prices);
        
        $qty = Cart::all()->where('users_id',auth()->id())->sum('quantity');
        

        return view('checkout-detail', compact('carts','total','qty'));
    }

    public function payment()
    {

        $carts = Cart::where('users_id', Auth()->id())->latest()->get();

        $prices = [];
        
            foreach($carts as $cart){
                $price = $cart->product->price;
        
                $subtotal = $price * $cart->quantity;
        
                array_push($prices, $subtotal);
            };
        
        
            $total = array_sum($prices);
        
        $qty = Cart::all()->where('users_id',auth()->id())->sum('quantity');

        $products = Cart::where('users_id', auth()->id())->latest()->get();

        return view('checkout-payments', compact('products', 'total', 'qty'));
    }

    public function complete()
    {

        $orders = Order::where('users_id', auth()->id())->latest()->get();


        return view('checkout-complete', compact('products', 'orders', 'shippings'));
    }


    public function storeOrder(Request $request)
    {

        $order_id = Order::insertGetId([
            'users_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000 ,99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'created_at' => Carbon::now(),
        ]);


        $carts = Cart::where('users_id', auth()->id())->latest()->get();

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

        return Redirect()->to('checkoutcomplete')->with([
            'message' => 'Your Order Complete !',
            'type' => 'info'
        ]);



        // Cart::where('user_ip', auth()->id())->delete();
        // return redirect()->back()->with('cart_update', 'Quantity Update');
        
    }

    public function orderSuccess()
    {
        return view('frontend.order.complete');
    }

}
