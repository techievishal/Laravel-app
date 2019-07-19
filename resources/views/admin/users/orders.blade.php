@extends('layouts.master')
@section('title')
    My Orders
@endsection

@section('contents')

<div class="container">
<h1>My Orders</h1>


@foreach ($orders as $order)
<div class="panel panel-default">
<div class="panel-body">
<ul class="list-group">
    @foreach ($order->cart->items as $item)
    <li class="list-group-item active"><span class="badge">{{$item['price']}}</span>
        {{$item['item']['title']}} | {{$item['item']['qty']}}
    </li>
    <li class="list-group-item disabled" aria-disabled="true">Disabled item</li>
    @endforeach
</ul>

</div>
<div class="panel-footer">
<strong>Total Price{{$order->cart->totalPrice}}</strong>
</div>

</div>
@endforeach



</div>

@endsection