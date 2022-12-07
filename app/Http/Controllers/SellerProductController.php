<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Admin\ProductRequest;
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

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'seller_id' => auth()->id(),
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);
        $product->tags()->attach($request->input('tags', [] ));

        foreach ($request->input('gallery', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'Success Created !',
            'type' => 'success'
        ]);
    }
}
