<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HControllerr extends Controller
{
    public function index(){

        $products = Product::with('category')->get();
        $favorites = [0];

        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            }
        }

        return view('home', compact('products', 'favorites'));
    }

    public function getProducts(){
        $products = Product::with('category')->get();

        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}
