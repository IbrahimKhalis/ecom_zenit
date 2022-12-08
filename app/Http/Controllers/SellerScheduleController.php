<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ShopProfile;
use Illuminate\Http\Request;

class SellerScheduleController extends Controller
{
    public function show(){


        $data = ShopProfile::where('users_id', auth()->id())->first()->schedule;

        if($data != null){
            return view('seller.setting-scedhule', compact('data'));
        }

        return view('seller.setting-scedhule');
    }
}
