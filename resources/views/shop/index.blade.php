@extends('layouts.master')
@section('title')
    Shopping Cart
@endsection

@section('contents')

<div class="container">

    @if (Session::has('Success'))
    <div class="row">
        <div class="col-md-12">
           <div id="charge-message" class="alert alert-success">
              {{Session::get('Success')}}
           </div>
         </div>
     </div>        
    @endif   

    @foreach ($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach ($productChunk as $product)
        
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
              @if($product->photo1)
              <a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo1) }}" target="_blank">
                <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo1) }}"/>
              </a>
              @endif
              <div class="caption">
    <h3>{{$product->name}}</h3>
    <p class="description">{{ str_limit($product->description, $limit = 150, $end = '...') }}</p>
    <div class="clearfix">
    <span class="pull-left">${{$product->price}}</span>    
 
  </div> 
  <div class="clearfix">
    <div class="float-left">
        <span class="">
        <label for="exampleFormControlSelect1">Qty</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </span>  
    </div>

  </div>
  
  	<div class="dropdown-divider"></div>
    <div class="">
        <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn btn-primary" role="button">Add to cart</a></p>   
    </div>
    
  </div>
              </div>
            </div>          
        
        @endforeach
      </div>
    @endforeach
        
        </div>
        


        <nav aria-label="Page navigation example">

                <div class="pagination justify-content-center">
                    {{ $products->links() }}
                </div>
              </nav>

@endsection