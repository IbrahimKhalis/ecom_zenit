<?php

namespace App\Http\Controllers;

use App\Models\ShopProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Models\Schedule;

class SetupShopController extends Controller
{
    use ImageUploadingTrait;

    public function step1(){
        return view('seller.setup-store');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'bail|required|max:255|unique:App\Models\ShopProfile',
            'major' => 'required',
            'desc' => 'required',
            'gallery'=>'required'
        ]);

        $shopProfile = ShopProfile::create([
            'users_id' => Auth()->id(),
            'name' => $request->name,
            'major' => $request->major,
            'desc' => $request->desc,
        ]);

        foreach ($request->input('gallery', []) as $file) {
            $shopProfile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        Schedule::insert([
            'shops_id'=> $shopProfile->id
        ]);

        return redirect()->route('seller.setup.personal');
    }

    public function update(Request $request)
    {
        $shop = auth()->user()->shop;

        
        $validated = $request->validate([
            'instagram' => 'required',
            'gmail' => 'required',
            'linkedIn' => 'required',
            'portofolio' => 'mimes:pdf',
        ]);        
        
        $porto = null;
        if ($request->hasFile('portofolio')) {
            $porto = $request->file('portofolio')->storeAs(
                'portofolio',
                $name = auth()->user()->name. '.' . $request->file('portofolio')->getClientOriginalExtension(),
            );
        }  
        
        $shop->update([
            'instagram' => $request->instagram,
            'gmail' => $request->gmail,
            'linkedIn' => $request->linkedIn,
        ]);

        if($request->portofolio != null){
            $shop->update([
                'portofolio' => 'storage/portofolio/'.$name,
            ]);
        }

        return redirect()->route('seller.setting-scedhule');
    }
    public function create()
    {
        $shop = auth()->user()->shop;
        return view('seller.setup-store-personal', compact('shop'));
    }
}
