<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ShopProfile as ModelsShopProfile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ShopProfile extends Controller
{

    public function show($slug){

        $shop = ModelsShopProfile::where('slug', $slug)->first();

        $schedule = Schedule::where('shops_id', $shop->id)->first();


        if(date('l') == 'Sunday'){
            $buka = $schedule->buka_minggu;
            $tutup = $schedule->tutup_minggu;
        }

        if(date('l') == 'Monday'){
            $buka = $schedule->buka_senin;
            $tutup = $schedule->tutup_senin;
        }

        if(date('l') == 'Tuesday'){
            $buka = $schedule->buka_selasa;
            $tutup = $schedule->tutup_selasa;
        }

        if(date('l') == 'Wednesday'){
            $buka = $schedule->buka_rabu;
            $tutup = $schedule->tutup_rabu;
        }

        if(date('l') == 'Thursday'){
            $buka = $schedule->buka_kamis;
            $tutup = $schedule->tutup_kamis;
        }

        if(date('l') == 'Friday'){
            $buka = $schedule->buka_jumat;
            $tutup = $schedule->tutup_jumat;
        }

        if(date('l') == 'Saturday'){
            $buka = $schedule->buka_jumat;
            $tutup = $schedule->tutup_jumat;
        }

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
            'favorites',
            'buka',
            'tutup'
        ));

    }
}
