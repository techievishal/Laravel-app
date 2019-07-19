@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.orders.title')</h3>
   

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($orders) > 0 ? 'datatable' : '' }} @can('order_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('order_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.orders.fields.order_no')</th>
                        <th>@lang('quickadmin.orders.fields.order_date')</th>
                        <th>@lang('quickadmin.orders.fields.order_details')</th>          
                        <th>@lang('quickadmin.orders.fields.totalprice')</th>                        
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <tr data-entry-id="{{ $order->id }}">
                                @can('order_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $order->id }}</td>
                                <td field-key='description'>{{$order->created_at->format('d F Y')}}</td>
                                
                                <td field-key='category'>
                                        @foreach ($order->cart->items as $item)
                                        <li class="list-group-item">
                                                <span class="badge float-right">${{$item['price']}}</span>
                                                {{$item['item']['name']}} | {{$item['qty']}} Unit
                                        </li>
                                    @endforeach
                                </td>
                                <td field-key='price'>{{$order->cart->totalPrice}}</td>
                                
                                <td>
                                    @can('order_view')
                                    <a href="{{ route('admin.orders.show',[$order->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    
                                    @can('order_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.orders.destroy', $order->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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