@extends('layouts.master')
@section('title')
    Checkout
@endsection

@section('contents')
<div class="container">


        <h1>Checkout</h1>
        <h4>Your Total: </h4>
        <form  action="{{route('product.checkout')}}" method="POST">
                <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Your Full Name" required>
                </div>
                <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Enter mobile" required>
                  
                </div>
                <div class="form-group">
                  <label for="address">Delivery Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>


                
                <button type="submit" class="btn btn-primary">Buy now</button>
                {{ csrf_field() }}
         </form>


</div>


@endsection