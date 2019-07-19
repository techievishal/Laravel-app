@extends('layouts.master')
@section('title')
    My Cart
@endsection

@section('contents')

<div class="container">


    <h1>My Cart</h1>
    @if (Session::has('cart'))
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                        <th scope="row"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $item['item']['photo1']) }}" /></th>
                        <td>{{$item['item']['name']}}</td>
                        <td ><span class="label label-success">{{$item['price']}}</span></td>
                        <td>{{$item['qty']}}</td>
                      </tr>
                @endforeach
                <tr><td colspan="3"><b>Total Price</b></td><td >{{$totalPrice}}</td></tr> 
                <tr><td colspan="3">&nbsp;</td><td ><a href="{{route("product.checkout")}}" class="btn btn-success">Proceed to Buy</a></td></tr> 
            </tbody>
          </table>

          @else
          <div class="row">
              <div class="col-md-4 col-sm-6" >No Items in Cart, <a href="{{route("product.index")}}">Continue Shopping</a></div>
          </div>

    @endif
    

</div>
@endsection
