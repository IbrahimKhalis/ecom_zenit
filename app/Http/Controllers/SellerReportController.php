<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Charts\reportProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SellerReportController extends Controller
{

    public function sumsum($accumulator, $item){
        $accumulator[$item['month']] = $accumulator[$item['month']] ?? 0;
        $accumulator[$item['month']] += $item['qty'];  
        return $accumulator;
    }
    public function sumsumprice($accumulator, $item){
        $accumulator[$item['month']] = $accumulator[$item['month']] ?? 0;
        $accumulator[$item['month']] += $item['subtotal'];  
        return $accumulator;
    }

    public function show()
    {
        $products = Product::where('users_id', Auth()->id())->get();
        $total_terjual = User::find(Auth()->id())->products;
        $sellproducts = OrderItem::where('seller_id', Auth()->id())->whereYear('created_at', date('Y'))->get();
        $apa = OrderItem::where('subtotal')->first();
        // $total_harga = OrderItem::select(DB::raw("CAST(SUM(subtotal) as int)as subtotal"))->Groupby(DB::raw("subtotal"))->pluck('subtotal');
//         $result = DB::order_items('subtotal')
// ->selectRaw('sum(subtotal)')
// ->get();

        $dataSet = [];

        $terjual = [];

        $dataPrice =[];

        foreach($sellproducts as $sheyla){
            $price = [
                'month' => $sheyla->created_at->format('F'),
                'subtotal' => $sheyla->subtotal
            ];
            array_push($dataPrice, $price);
        }
        

          foreach($total_terjual as $product){
            $countTerjualProd = $product->orderItem->all();

            foreach($countTerjualProd as $data){
                    array_push($terjual, $data->product_qty);
            }
        }
        
        
        foreach($sellproducts as $selled){
            $data = [
                'month' => $selled->created_at->format('F'),
                'qty' => $selled->product_qty,
            ];
            
            array_push($dataSet, $data);
        }
        
        $terjualData = array_sum($terjual);

 
        $sum = array_reduce($dataSet, array($this, "sumsum"));
        $sumprice = array_reduce($dataPrice, array($this, 'sumsumprice'));

        $labels = array_keys($sum);
        $values = array_values($sum);

        $chart = new reportProduct;
        $chart->labels(array_keys($sum)); 
        $chart->dataset('data Penjualan','bar',array_values($sum));


        // dd($labels);
        return view('seller.report', compact('chart', 'labels', 'values','terjualData','products','sumprice'));
        
        // $terjual = [];
        
        
        // foreach($sellproducts as $product){
        //     $countTerjualProd = $product->orderItem->all();

        //     foreach($countTerjualProd as $data){
        //             array_push($terjual, $data->product_qty);
        //     }
        // }
        
        // $terjualData = array_sum($terjual);
        

        // $sellproducts->keys();
        // $sellproducts->values();
        // foreach($sellproducts as $product){
        //     $countTerjualProd = $product->orderItem->all();

        //     foreach($countTerjualProd as $data){
        //             array_push($terjual, $data->product_qty);
        //     }
        // }

        // $sellproducts = Order::whereYear('creaated_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count(); die;

        // $sellproducts = Order::where('users_id', auth()->id());


        // $month = Order::select(DB::raw("MONTHNAME(created_at) as bulan"))->Groupby(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');

        // dd($month,$sellproducts);
        // dd($sellproducts);

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
    }
}

