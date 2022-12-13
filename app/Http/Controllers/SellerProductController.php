<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Models\Category;
use App\Models\Product;

use App\Http\Requests\Admin\ProductRequest;

use App\Models\Tag;

use Illuminate\Http\Request;

class SellerProductController extends Controller
{


    use ImageUploadingTrait;

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

    public function createProduct(){

        $category = Category::all();

        $tags = Tag::all();

        return view('seller.add-product', compact('category', 'tags'));
    }

    public function addProduct(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price'=> 'required',
            'major'=> 'required',
            'quantity'=> 'required',
            'category_id'=>'required',
            'gallery'=>'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'users_id' => auth()->id(),
            'desc' => $request->desc,
            'major' => $request->major,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);
        $product->tags()->attach($request->input('tags', [] ));

        foreach ($request->input('gallery', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }


        return redirect()->route('seller.products')->with([
            'message' => 'Success Created !',
            'type' => 'success'
        ]);

    }

    public function editProduct($id){

        $product = Product::find($id);

        $category = Category::all();

        $tags = Tag::all();

        if($product->users_id == auth()->id()){
            return view('seller.edit-product', compact('product', 'category', 'tags'));
        }
        return abort(404, 'Unauthorized action.');
    }

    public function updateProduct(Request $request,$id){

        $validate = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price'=> 'required',
            'major' => 'required',
            'quantity'=> 'required',
            'category_id'=>'required',
            'gallery'=>'required'
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'major' => $request->major,
            'desc'=> $request->desc,
            'price'=> $request->price,
            'quantity'=>$request->quantity,
            'category_id'=> $request->category_id
        ]);

        $product->tags()->sync($request->input('tags', [] ));

        if (count($product->gallery) > 0) {
            foreach ($product->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $product->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('product.show', $product->slug)->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);

    }
}
