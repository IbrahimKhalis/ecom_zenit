<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Models\DataResi;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{

    use ImageUploadingTrait;

    public function showUp(){

        $products = auth()->user()->products;

        $itemOrder = [];
        $individualOrder = [];
        $Paid = [];

        foreach($products as $product){
            $orderItem = $product->orderItem->all();
            array_push($itemOrder, $orderItem);
        }

        foreach($itemOrder as $inOrder){
            foreach($inOrder as $idnItem){
                array_push($individualOrder, $idnItem);
            }
        }

        foreach($individualOrder as $item){
            if($item->status == 'NOT CONFIRM'){
                if($item->orders->status == 'PAID'){
                    array_push($Paid, $item);
                }
            }  
        }

        return view('seller.upcoming', compact('Paid'));
    }

    public function accept($id){
        $order = OrderItem::find($id);
        
        $order->status = 'CONFIRMED';
        
        $order->update();
        
        $orders = $order->orders->orderItem->pluck('status')->all();

        if (!in_array('NOT CONFIRM', $orders)) {
            $data = $order->orders;

            $data->update([
                'status' => 'PROCESSED'
            ]);
        }
        return redirect()->back()->with([
            'massage' => 'The Order has been Confirmed'
        ]);
        
    }
    
    public function reject($id){
        $order = OrderItem::find($id);

        $order->status = 'CANCELED';

        $order->update();

        $orders = $order->orders->orderItem->pluck('status')->all();

        $target = array('NOT CONFIRM', 'CONFIRMED', 'SHIPPED');

        $coba = count(array_intersect($orders, $target));

        if (!in_array('NOT CONFIRM', $orders)) {
            $data = $order->orders;

            $data->update([
                'status' => 'PROCESSED'
            ]);
        }

        if(count(array_intersect($orders, $target)) == 0) {
            $data = $order->orders;

            $data->update([
                'status' => 'CANCELED'
            ]);
        }

        return redirect()->back()->with([
            'massage' => 'The Order has been REJECTED'
        ]);

    }

    public function showPro(){
        $products = auth()->user()->products;

        $itemOrder = [];
        $individualOrder = [];
        $confirmed = [];

        foreach($products as $product){
            $orderItem = $product->orderItem->all();
            array_push($itemOrder, $orderItem);
        }

        foreach($itemOrder as $inOrder){
            foreach($inOrder as $idnItem){
                array_push($individualOrder, $idnItem);
            }
        }

        foreach($individualOrder as $item){
            if($item->status == 'CONFIRMED' || $item->status == 'SHIPPED'){
                if($item->orders->status == 'PAID' || 'PROCESSED'){
                    array_push($confirmed, $item);
                }
            }  
        }

        return view('seller.processed', compact('confirmed'));
    }

    public function showCancel(){
        $products = auth()->user()->products;

        $itemOrder = [];
        $individualOrder = [];
        $canceled = [];

        foreach($products as $product){
            $orderItem = $product->orderItem->all();
            array_push($itemOrder, $orderItem);
        }

        foreach($itemOrder as $inOrder){
            foreach($inOrder as $idnItem){
                array_push($individualOrder, $idnItem);
            }
        }

        foreach($individualOrder as $item){
            if($item->status == 'CANCELED'){
                    array_push($canceled, $item);
            }  
        }

        return view('seller.canceled-order', compact('canceled'));
    }

    public function upResi(Request $request, $id){
        $order_items = OrderItem::find($id);

        
        $target = array('NOT CONFIRM', 'CONFIRMED');
        
        $order_items->update([
            'status'=>'SHIPPED',
        ]);
        
        $orders = $order_items->orders->orderItem->pluck('status')->all();

        
        if (count(array_intersect($orders, $target)) == 0) {
            $data = $order_items->orders;
            
            $data->update([
                'status' => 'SHIPPED'
            ]);
        }

        $DataResi = DataResi::create([
            'orders_id' => $order_items->orders->id,
            'no_resi'=> $request->no_resi,
            'order_items_id' => $order_items->id,
            'created_at'=>Carbon::now()
        ]);
        
        foreach ($request->input('gallery', []) as $file) {
            $DataResi->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->back();
    }

    public function detailTrans($id){

        $order = OrderItem::find($id)->orders;

        return view('seller.transaction-detail', compact('order'));
    }

    public function showCome(){

        $products = auth()->user()->products;

        $itemOrder = [];
        $individualOrder = [];
        $confirmed = [];

        foreach($products as $product){
            $orderItem = $product->orderItem->all();
            array_push($itemOrder, $orderItem);
        }

        foreach($itemOrder as $inOrder){
            foreach($inOrder as $idnItem){
                array_push($individualOrder, $idnItem);
            }
        }

        foreach($individualOrder as $item){
            if($item->status == 'COMPLETE'){
                if($item->orders->status == 'PAID' || 'PROCESSED' || 'COMPLETE'){
                    array_push($confirmed, $item);
                }
            }  
        }

        return view('seller.complete-order', compact('confirmed'));
    }
}
