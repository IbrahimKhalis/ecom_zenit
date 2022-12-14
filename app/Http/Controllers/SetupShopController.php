<?php

namespace App\Http\Controllers;

use App\Models\ShopProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ImageUploadingTrait;

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

        return redirect()->route('seller.setup.personal');
    }
}
