<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Session;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 
     */
    public function getProducts(){

       $products = Product::paginate(6);
       

        return view('shop.index',['products'=>$products]);
    }

    /**
     * 
     */

    public function getAddToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart =Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart', $cart);
       // dd($request->session()->get('cart'));
        return redirect()->route('product.index');
     }

    /**
     * 
     */

    public function showCart(Request $request){
        
        if(!Session::has('cart')){
            return view('shop.mycart',['products'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
      //  dd($cart);
        return view('shop.mycart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
     }

    /**
     * 
     */
    public function checkout(Request $request){
        
        if(!Session::has('cart')){
            return view('shop.mycart',['products'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
      //  dd($cart);
        return view('shop.checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
     }

    /**
     * 
     */
     public function postCheckout(Request $request){
        
        if(!Session::has('cart')){
            return view('shop.mycart',['products'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('fullname');
        $order->mobile = $request->input('mobile');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        Auth::user()->orders()->save($order);      

        Session::forget('cart');

        return redirect()->route('product.index')->with('Success','Successfully Purchased Product');

     }


     

}
