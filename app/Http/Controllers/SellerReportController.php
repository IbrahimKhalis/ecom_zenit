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

    public function sumsumsum($accumulator, $item){
        $accumulator['subtotal'] = $accumulator['subtotal'] ?? 0;
        $accumulator['subtotal'] += $item['subtotal'];  
        $accumulator['qty'] = $accumulator['qty'] ?? 0;
        $accumulator['qty'] += $item['qty']; 
        return $accumulator;
    }

    public function sumsumprice($accumulator, $item){
        $accumulator[$item['month']] = $accumulator[$item['month']] ?? [];
        array_push($accumulator[$item['month']], ['subtotal' => $item['subtotal'], 'qty' => $item['qty']]);
        return $accumulator;
    }

    public function show()
    {
        $total_terjual = User::find(Auth()->id())->products;

        $products = $total_terjual;

        $sellproducts = OrderItem::where('seller_id', Auth()->id())->whereYear('created_at', date('Y'))->get();
        $income = OrderItem::where('seller_id', auth()->id())->where('status', 'COMPLETE')->sum('subtotal');

        $dataSet = [];
        $terjual = [];
        $dataLol =[];

        foreach($total_terjual as $product){
            $countTerjualProd = $product->orderItem->where('status', 'COMPLETE');
            foreach($countTerjualProd as $data){
                    array_push($terjual, $data->product_qty);
            }
        }
        

        foreach($sellproducts as $sheyla){
            if($sheyla->status == 'COMPLETE'){
                $data = [
                    'month' => $sheyla->created_at->format('F'),
                    'subtotal' => $sheyla->subtotal,
                    'qty'=> $sheyla->product_qty
                ];
                array_push($dataLol, $data);
            }
        }
    
        foreach($sellproducts as $selled){
            if($selled->status == 'COMPLETE'){
                $data = [
                    'month' => $selled->created_at->format('F'),
                    'qty' => $selled->product_qty,
                ];
                array_push($dataSet, $data);
            }
        }
        
        $terjualData = array_sum($terjual);


        $sum = array_reduce($dataSet, array($this, "sumsum"));


        $sumprice = array_reduce($dataLol, array($this, 'sumsumprice'));

        $ibe = [];

        if (isset($sumprice)) {
            foreach($sumprice as $key=>$divadan){
    
                $datasy = array_reduce($divadan, array($this, 'sumsumsum'));
    
                $ibe[$key] = $datasy;
            }
        }

        $labels = [];
        $values = [];


        if(isset($sum)){
            $labels = array_keys($sum);
            $values = array_values($sum);
        }

        $chart = new reportProduct;
        // $chart->labels(array_keys($sum)); 
        // $chart->dataset('data Penjualan','bar',array_values($sum));


        return view('seller.report', compact('chart','labels', 'values','terjualData','products', 'ibe','income'));   
    }


    // public function sumsum($accumulator, $item){
    //     $accumulator[$item['month']] = $accumulator[$item['month']] ?? 0;
    //     $accumulator[$item['month']] += $item['qty'];  
    //     return $accumulator;
    // }
    // public function sumsumprice($accumulator, $item){
    //     $accumulator[$item['month']] = $accumulator[$item['month']] ?? 0;
    //     $accumulator[$item['month']] += $item['subtotal'];  
    //     return $accumulator;
    // }

    // public function show()
    // {
    //     $products = Product::where('users_id', Auth()->id())->get();
    //     $total_terjual = User::find(Auth()->id())->products;
    //     $sellproducts = OrderItem::where('seller_id', Auth()->id())->whereYear('created_at', date('Y'))->get();
    //     $apa = OrderItem::where('subtotal')->first();
    //     $income = OrderItem::where('seller_id', auth()->id())->where('status', 'COMPLETE')->sum('subtotal');
   
    //     $dataSet = [];

    //     $terjual = [];

    //     $dataPrice =[];

    //     foreach($sellproducts as $sheyla){
    //         $price = [
    //             'month' => $sheyla->created_at->format('F'),
    //             'subtotal' => $sheyla->subtotal
    //         ];
    //         array_push($dataPrice, $price);
    //     }

    //       foreach($total_terjual as $product){
    //         $countTerjualProd = $product->orderItem->all();

    //         foreach($countTerjualProd as $data){
    //                 array_push($terjual, $data->product_qty);
    //         }
    //     }
        
        
    //     foreach($sellproducts as $selled){
    //         $data = [
    //             'month' => $selled->created_at->format('F'),
    //             'qty' => $selled->product_qty,
    //         ];
            
    //         array_push($dataSet, $data);
    //     }
        
    //     $terjualData = array_sum($terjual);

 
    //     $sum = array_reduce($dataSet, array($this, "sumsum"));
    //     $sumprice = array_reduce($dataPrice, array($this, 'sumsumprice'));

    //     $labels = array_keys($sum);
    //     $values = array_values($sum);

    //     $chart = new reportProduct;
    //     $chart->labels(array_keys($sum)); 
    //     $chart->dataset('data Penjualan','bar',array_values($sum));


    //     // dd($labels);
    //     return view('seller.report', compact('chart', 'labels', 'values','terjualData','products','sumprice','income'));
    // }
}

