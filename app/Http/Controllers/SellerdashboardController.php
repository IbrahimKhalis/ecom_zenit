<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellerdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productshow()
    {
        $data = Product::where('users_id', Auth()->id())->get();

        return view('seller.product-seller', compact('data'));
    }

    public function updateProfile(Request $request, $id)
    {
        
        // $product->update($request->validated());
        // $product->tags()->sync($request->input('tags', [] ));

        // if (count($product->gallery) > 0) {
        //     foreach ($product->gallery as $media) {
        //         if (!in_array($media->file_name, $request->input('gallery', []))) {
        //             $media->delete();
        //         }
        //     }
        // }

        // $media = $product->gallery->pluck('file_name')->toArray();

        // foreach ($request->input('gallery', []) as $file) {
        //     if (count($media) === 0 || !in_array($file, $media)) {
        //         $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        //     }
        // }

        // return redirect()->route('admin.products.index')->with([
        //     'message' => 'Success Updated !',
        //     'type' => 'info'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
