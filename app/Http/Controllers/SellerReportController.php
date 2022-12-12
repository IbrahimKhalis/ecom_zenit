<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Charts\reportProduct;   
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerReportController extends Controller
{
    public function show()
    {
        
        // $sellproducts = User::find(auth()->id())->products;
        $sellproducts = OrderItem::where('seller_id', auth()->id())->get();

        foreach($sellproducts as $product){
            $countTerjualProd = $product->orderItem->all();

            foreach($countTerjualProd as $data){
                    array_push($terjual, $data->product_qty);
            }
        }

        // $sellproducts = Order::whereYear('creaated_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count(); die;

        // $sellproducts = Order::where('users_id', auth()->id());


        // $month = Order::select(DB::raw("MONTHNAME(created_at) as bulan"))->Groupby(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');

        // dd($month,$sellproducts);
        // dd($sellproducts);

        $chart = new reportProduct;
        $chart->labels($sellproducts->keys());
        $chart->dataset('my data','line',$sellproducts->values());


        // $terjual = [];
        
        
        // foreach($sellproducts as $product){
        //     $countTerjualProd = $product->orderItem->all();

        //     foreach($countTerjualProd as $data){
        //             array_push($terjual, $data->product_qty);
        //     }
        // }
        
        // $terjualData = array_sum($terjual);

        // $total_harga = Order::select(DB::raw("CAST(SUM(total) as int)as total"))->Groupby(DB::raw("Month(created_at)"))->pluck('total');

        // $month = Order::select(DB::raw("MONTHNAME(created_at) as bulan"))->Groupby(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');
        
        // $users = OrderItem::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        //                 ->whereYear('created_at', date('Y'))
        //                 ->groupBy(DB::raw("MONTHNAME(created_at)"))
        //                 ->orderBy('created_at', 'asc')
        //                 ->get();

        // $labels = $users->keys();
        // $data = $users->values();

        // dd($users);
        // dd($total_harga);

        // return view('seller.report', compact('products', 'terjualData','total_harga','month'));
        return view('seller.report', compact('chart','sellproducts'));
    }
}

