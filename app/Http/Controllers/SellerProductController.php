<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    public function show(){
        $data = Product::where('users_id', Auth()->id())->get();

        return view('seller.product-seller', compact('data'));
    }

    public function changeStatus($id){
        $data = Product::find($id);

        if($data->isActive != true){
            $data->isActive = 1;

            $data->update();

            return 'Activated';
        }

        $data->isActive = 0 ;
        $data->update();

        return 'Disactivated';
    }
}
