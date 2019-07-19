@extends('layouts.master')
@section('title')
    My Orders
@endsection

@section('contents')

<div class="container">
<h1>My Orders</h1>


@foreach ($orders as $order)
<div class="card">
        <div class="card-header">
                Order Place: {{$order->created_at->format('d F Y')}}
                <span class="float-right">Order #{{$order->id}}</span>
              </div>
<div class="card-body">
<ul class="list-group">
    @foreach ($order->cart->items as $item)
    <li class="list-group-item">
        <span class="badge float-right">${{$item['price']}}</span>
        {{$item['item']['name']}} | {{$item['qty']}} Unit
    </li>
    
    @endforeach
</ul>

</div>
<div class="card-footer text-muted">
        <strong>Total Price: ${{$order->cart->totalPrice}}</strong>
</div>




</div>
<div class="clear-fix">
&nbsp;
</div>
@endforeach



</div>

@endsection