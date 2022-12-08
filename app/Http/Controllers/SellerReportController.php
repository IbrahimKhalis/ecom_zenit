<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class SellerReportController extends Controller
{
    public function show()
    {
        
        $products = User::find(auth()->id())->products;

        $terjualMinggu = [];

        foreach($products as $product){
            $countTerjualProd = $product->orderItem->count();

            array_push($terjualMinggu, [
                'id'=> $product->id,
                'count'=> $countTerjualProd
            ]);
        }


        return view('seller.report', compact('products', 'terjualMinggu', 'countTerjualProd'));
    }
}
