<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\ImageUploadingTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    use ImageUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::All();
        return view('cart', compact('carts'));

    }

    public function inc(Request $request, $id)
    {
        $check = Cart::where('id', $id)->where('users_id', auth()->id())->first();

        $check->quantity = $check->quantity + 1 ;

        $check->update();

        return redirect()->back();

    }

    public function dec(Request $request, $id)
    {
        $check = Cart::where('id', $id)->where('users_id', Auth()->id())->first();

        $check->quantity = $check->quantity - 1 ;

        $check->update();

        return redirect()->back();
        

    }



    public function CartPage(){
    $carts = Cart::where('users_id', Auth()->id())->latest()->get();

    $prices = [];

        foreach($carts as $cart){
            $price = $cart->product->price;

            $subtotal = $price * $cart->quantity;

            array_push($prices, $subtotal);
        };

        $total = array_sum($prices);

    return view('cart', compact('carts', 'total'));
    }

    public function CartTab(){
        $carts = Cart::where('user_ip', Auth()->id())->latest()->get();
        return view('frontend.cart.index', compact('carts', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($products_id)
    {

        $dataProd = Product::find($products_id);
        if($dataProd->users_id != auth()->id()){
            $check = Cart::where('products_id', $products_id)->where('users_id', Auth()->id())->first();

            if ($check){
                $prod = $check->product;

                if($prod->category->name != 'Software'){

                    $check->quantity += 1;
                    $check->update();

                    return Redirect()->back()->with([
                        'message' => 'Added More To Cart !',
                        'type' => 'warning'
                    ]);
                }
                return Redirect()->back()->with([
                    'message' => 'Has Been Added To Cart !',
                    'type' => 'warning'
                ]);
            }else{
                Cart::insert([
                    'products_id' => $products_id,
                    'quantity' => 1,
                    'users_id' => Auth()->id(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                return Redirect()->back()->with([
                    'message' => 'Add Cart Success !',
                    'type' => 'info'
                ]);
            }
        }else{
            return Redirect()->back()->with([
                'massage'=> 'Cannot add Your Own Item',
                'type'=>'info'
            ]);
        }
    }

    public function storemodal(Request $request, $products_id)
    {

        $dataProd = Product::find($products_id);
        if($dataProd->users_id != auth()->id()){
            $check = Cart::where('products_id', $products_id)->where('users_id', Auth()->id())->first();

            if ($check){
                $prod = $check->product;

                if($prod->category->name != 'Software'){

                    $check->quantity += 1;
                    $check->update();

                    return 'Added More To Cart !';
                }
                return 'Has Been Added To Cart !';
            }else{
                Cart::insert([
                    'products_id' => $products_id,
                    'quantity' => 1,
                    'users_id' => Auth()->id(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                return 'Add Cart Success !';
            }
        }else{
            return 'Nggak Bisa Lah TOLOL';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Cart::where('id', $id)->where('users_id', Auth()->id())->first(); // Easy right?

        $check->delete();

        $carts = Cart::where('users_id', Auth()->id())->latest()->get();

        $prices = [];

        foreach($carts as $cart){
            $price = $cart->product->price;

            $subtotal = $price * $cart->quantity;

            array_push($prices, $subtotal);
        };

        $total = array_sum($prices);

        return view('components.tableCarts', compact('carts', 'total'));
    }


}
