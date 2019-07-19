@inject('request', 'Illuminate\Http\Request')
@extends('layouts.eventtop')
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>
   
<div class="container">
    <div class="card">
        <div class="card-heading">
            Appointment Calendar
        </div>

        <div class="row">
        <a href="{{route('admin.addevents')}}" class="btn btn-success">Add Event</a>
        <a href="" class="btn btn-primary">Edit Event</a>
        <a href="" class="btn btn-danger">Remove Event</a>
        
        </div>

        <div class="card-body table-responsive" style="width:80%">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
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