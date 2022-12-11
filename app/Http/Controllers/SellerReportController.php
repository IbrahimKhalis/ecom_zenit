<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $users = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                        ->where('users_id', Auth()->id())
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(DB::raw("MONTHNAME(created_at)"))
                        ->orderBy('created_at', 'asc')
                        ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();

        return view('seller.report', compact('products', 'countTerjualProd', 'data', 'labels', 'users'));
    }
}
