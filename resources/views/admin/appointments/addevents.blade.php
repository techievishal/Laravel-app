@inject('request', 'Illuminate\Http\Request')
@extends('layouts.eventtop')
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>
   

    <div class="card">
        <div class="card-heading">
            Create Appointment
        </div>

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erroritem)
        <p>{{$erroritem}}</p>
        @endforeach    
        </div>
        @endif

        @if (Session::has('Success'))
        <div class="row">
            <div class="col-md-12">
               <div id="charge-message" class="alert alert-success">
                  {{Session::get('Success')}}
               </div>
             </div>
         </div>        
        @endif   
        <div class="card-body table-responsive">
                <form method="POST" action="{{route('admin.addevents')}}">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Event Name</label>
                          <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Event name">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Color</label>
                          <input type="color" class="form-control" id="color" name="color" placeholder="Color">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Color">
                        </div>

                        <div class="form-group">
                                <label for="exampleInputPassword1">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Color">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ csrf_field() }}
                      </form>
           
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('order_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.orders.mass_destroy') }}';
        @endcan


    </script>
@endsection