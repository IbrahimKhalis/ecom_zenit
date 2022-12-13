<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tb_productcate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class SController extends Controller
{
    public function index(Request $request,$slug = null){

        $products = Product::with('category');

        $tags = [];
        $favorites = [0];
        
        if($request->sort != null){
            if($request->sort=="latest"){
                $products->orderby('products.id','Desc');
                array_push($tags, 'Latest');
            }else if($request->sort=='cheapest'){
                $products->orderby('products.price','Asc');
                array_push($tags, 'Cheapest');
            }else if($request->sort=='expensive'){
                $products->orderby('products.price','Desc');
                array_push($tags, 'Expensive');
            }else if($request->sort=='name-A-Z'){
                $products->orderby('products.name','Asc');
                array_push($tags, 'A-Z');
            }else if($request->sort=='name-Z-A'){
                $products->orderby('products.name','Asc');
                array_push($tags, 'Z-A');
            }
           }

        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            }
        }

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }

        if(!is_null($slug)){
            $category = Tb_productcate::whereSlug($slug)->firstOrFail();

            array_push($tags, $slug);


            if (is_null($category->category_id)) {

                $categoriesIds = Tb_productcate::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;


                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {

                    $query->whereIn('id', $categoriesIds);
                });

            } else {
                $products = $products->whereHas('category', function ($query) use ($slug) {

                    $query->where([

                        'slug' => $slug,
                    ]);
                });

            }
        }

        $products->where('isActive', 1);

        $products = $products->paginate(4);

        return view('product',compact('products', 'tags', 'favorites'));


    }

    public function search(Request $request,$slug = null){

        $products = Product::with('category');


        $tags = [];
        $favorites = [0];

        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            }
        }

        if($request->search != null){
            $products->orWhere('name', 'like', '%'.$request->search.'%');
            $products->orWhere('desc', 'like', '%'.$request->search.'%');
            array_push($tags, $request->search);
        }

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }
        
        if(!is_null($slug)){
            $category = Tb_productcate::whereSlug($slug)->firstOrFail();

            array_push($tags, $slug);


            if (is_null($category->category_id)) {

                $categoriesIds = Tb_productcate::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;


                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {

                    $query->whereIn('id', $categoriesIds);
                });

            } else {
                $products = $products->whereHas('category', function ($query) use ($slug) {

                    $query->where([

                        'slug' => $slug,
                    ]);
                });

            }
        }

        $products->where('isActive', 1);

        $products = $products->paginate(4);

        return view('product',compact('products', 'tags'));

    }

    public function tag(Request $request, $slug)
    {
        $products = Product::with('tags');


        $tags = [];
        $favorites = [0];
        
        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            }
        }

        if($request->BRF != null){
            $products->orWhere('major','=', 'BRF');
            array_push($tags, 'BRC');
        }

        if($request->PPLG != null){
            $products->orWhere('major','=', 'PPLG');
            array_push($tags, 'PPLG');
        }

        if($request->ANIMASI != null){
            $products->orWhere('major','=', 'ANIMASI');
            array_push($tags, 'ANIMASI');
        }

        if($request->TJKT != null){
            $products->orWhere('major','=', 'TJKT');
            array_push($tags, 'TJKT');
        }

        if($request->TE != null){
            $products->orWhere('major','=', 'TE');
            array_push($tags, 'TE');
        }

        if($request->min != null){
            $products->where('price', '>=', $request->min);
            array_push($tags, 'MIN : '.$request->min);
        }

        if($request->max != null){
            $products->where('price', '<=', $request->max);
            array_push($tags, 'MAX : '.$request->max);
        }

        array_push($tags, $slug);

        $products = $products->whereHas('tags', function ($query) use($slug) {
            $query->where([
                'slug' => $slug,
            ]);
        })
        ->where('isActive', 1)
        ->paginate(4);


        return view('product', compact('products','slug', 'tags'));
    }
    
}
