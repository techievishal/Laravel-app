<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;

class OrdersController extends Controller
{
    public function index(){

        if (! Gate::allows('order_access')) {
            return abort(401);
        }


        $orders = Order::all();
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
       

        //dd($orders);
       // return view('admin.orders.index', 'orders'));
        return view('admin.orders.index',['orders'=>$orders]);


    }
}
