<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RatingController extends Controller
{


    public function create($id){

        $product = OrderItem::find($id)->products;

        $coba = Rating::where('user_id', auth()->id())->where('product_id', $product->id)->get()->count();

        if($coba > 0){
            return redirect()->back()->with('message', 'Already Been Reviewed!');
        }

        $seller = $product->users->shop;

        return view('review', compact('product', 'seller'));
    }


    public function add(Request $request)
    {


        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');
        $name = $request->input('name');
        $comment = $request->input('comment');

        $product = Product::find($product_id);

            Rating::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'name' => $name,
                'stars_rated' => $stars_rated,
                'comment' => $comment,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->route('product.show', $product->slug);
    }
}