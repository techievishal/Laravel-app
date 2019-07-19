<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function showOrders(){

        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
                $order->cart = unserialize($order->cart);
                return $order;
        });

//dd($orders);
        return view('shop.orders',['orders'=>$orders]);


    }
}
