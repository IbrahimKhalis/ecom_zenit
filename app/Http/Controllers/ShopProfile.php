<?php

namespace App\Http\Controllers;

use App\Models\ShopProfile as ModelsShopProfile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ShopProfile extends Controller
{

    public function show($slug){

        $shop = ModelsShopProfile::where('slug', $slug)->first();

        $seller = $shop->users;

        $sellerdata = $seller->select('name','email')->first();

        $phone = $seller->profile->select('phoneNumber')->first();

        $products = $seller->products->where('isActive', 1);

        $favorites = [0];
        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            };
        }

        return view('shop', compact(
            'shop',
            'sellerdata',
            'phone',
            'products',
            'favorites'
        ));

    }
}
