<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function show(){
        $favorites = Favorite::where('users_id', auth()->id());

        $favorCount = $favorites->count();

        $favor = $favorites->paginate(6);

        return view('fav', compact('favor', 'favorCount'));
    }

    public function add($products_id){

        $dataProd = Product::find($products_id);
        if($dataProd->users_id != auth()->id()){
            $check = Favorite::where('users_id', auth()->id())->where('products_id', $products_id)->first();
    
            if($check){
                return 'Already Been Favorite!';
            }else{
                Favorite::insert([
                    'users_id' => auth()->id(),
                    'products_id' => $products_id
                ]);
                return 'Added to Favorite!';
            }
        }else{
            return 'Cannot Add To Favorite!';
        }


    }

    public function destroy($id){
        $favor = Favorite::find($id);

        $favor->delete();

        return redirect()->back();
    }
}
