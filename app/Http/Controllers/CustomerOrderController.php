<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function show(){
        $orders = User::find(auth()->id())->orders;

        return view('myorder', compact('orders'));
    }

    public function getTable(Request $request){


        $ordersData = User::find(auth()->id())->orders;

        switch ($request->tabs) {
            case 2:
                $orders = $ordersData->where('status','!=','COMPLETE')->where('status','!=','CANCELED')->where('status','!=','REFUNDED');
                return view('table.myorderTable', compact('orders'));
                break;

            case 3:
                $orders = $ordersData->where('status','COMPLETE');
                return view('table.myorderTable', compact('orders'));
                break;
            
            case 4:
                $orders = $ordersData->where('status','CANCELED');
                return view('table.myorderTable', compact('orders'));
                break;
            
            default:
                $orders = $ordersData;
                return view('table.myorderTable', compact('orders'));
                break;
        }

        
    }
}
