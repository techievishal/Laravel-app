@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.product-tags.title')</h3>
    @can('product_tag_create')
    <p>
        <a href="{{ route('admin.product_tags.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($product_tags) > 0 ? 'datatable' : '' }} @can('product_tag_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('product_tag_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.product-tags.fields.name')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($product_tags) > 0)
                        @foreach ($product_tags as $product_tag)
                            <tr data-entry-id="{{ $product_tag->id }}">
                                @can('product_tag_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $product_tag->name }}</td>
                                                                <td>
                                    @can('product_tag_view')
                                    <a href="{{ route('admin.product_tags.show',[$product_tag->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('product_tag_edit')
                                    <a href="{{ route('admin.product_tags.edit',[$product_tag->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('product_tag_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.product_tags.destroy', $product_tag->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('product_tag_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.product_tags.mass_destroy') }}';
        @endcan

    </script>
@endsection