<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\ShopProfile;
use Carbon\Carbon;
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

    public function createUpdate(Request $request){

        $data = ShopProfile::where('users_id', auth()->id())->first();

        $dataSced = $data->schedule;

        if($dataSced != null){
            $scheduleId = $dataSced->id;
        }else{
            $scheduleId = Schedule::insertGetId([
                'shops_id'=>$data->id,
                'created_at'=>Carbon::now()
            ]);
        }


        if(!$request->lib_minggu){
            $request->buka_minggu = null;
            $request->tutup_minggu = null;
        }

        if(!$request->lib_senin){
            $request->buka_senin = null;
            $request->tutup_senin = null;
        }

        if(!$request->lib_selasa){
            $request->buka_selasa = null;
            $request->tutup_selasa = null;
        }

        if(!$request->lib_rabu){
            $request->buka_rabu = null;
            $request->tutup_rabu = null;
        }

        if(!$request->lib_kamis){
            $request->buka_kamis = null;
            $request->tutup_kamis = null;
        }

        if(!$request->lib_jumat){
            $request->buka_jumat = null;
            $request->tutup_jumat = null;
        }

        if(!$request->lib_sabtu){
            $request->buka_sabtu = null;
            $request->tutup_sabtu = null;
        }

        $up = Schedule::find($scheduleId);

        $up->buka_minggu = $request->buka_minggu;
        $up->tutup_minggu = $request->tutup_minggu;
        $up->buka_senin = $request->buka_senin;
        $up->tutup_senin = $request->tutup_senin;
        $up->buka_selasa = $request->buka_selasa;
        $up->tutup_selasa = $request->tutup_selasa;
        $up->buka_rabu = $request->buka_rabu;
        $up->tutup_rabu = $request->tutup_rabu;
        $up->buka_kamis = $request->buka_kamis;
        $up->tutup_kamis = $request->tutup_kamis;
        $up->buka_jumat = $request->buka_jumat;
        $up->tutup_jumat = $request->tutup_jumat;
        $up->buka_sabtu = $request->buka_sabtu;
        $up->tutup_sabtu = $request->tutup_sabtu;

        $up->update();

        return redirect()->back();
    }
}
