@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{ route(Auth::guard('admin')->check() ? 'admin.products.create' : 'products.create') }}" class="btn waves-effect waves-light green right">
                    {{__('site.add_new')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h4 class="card-title">{{ __('product.main') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.name_en')}}</th>
                                            <th>{{__('site.name_ar')}}</th>
                                            @if(Auth::guard('admin')->check())
                                                <td>{{__('product.vendor_name')}}</td>
                                            @endif
                                            <th>{{__('product.quantity')}}</th>
                                            <th>{{__('product.delivery_fees')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($products) > 0)
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name_en}}</td>
                                                <td>{{$product->name_ar}}</td>
                                                @if(Auth::guard('admin')->check())
                                                    <td>{{ $product->vendor != null ? $product->vendor->getLocaleName() : null}}</td>
                                                @endif
                                                <td>{{$product->quantity}}</td>
                                                <td>{{$product->delivery_fees}}</td>
                                                <td>
                                                    <a href="{{route(Auth::guard('admin')->check() ? 'admin.products.show' : 'products.show', $product->id)}}" class="waves-effect waves-light btn btn-small mb-2">{{__('site.view')}}</a>
                                                    <a href="{{ route(Auth::guard('admin')->check() ? 'admin.products.edit' : 'products.edit',$product->id) }}" class="waves-effect waves-light btn btn-small mb-2">{{__('site.edit')}}</a>
                                                    <form action="{{route(Auth::guard('admin')->check() ? 'admin.products.destroy' : 'products.destroy', $product->id)}}" method="POST" class="delete-record">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="waves-effect waves-light red accent-2 btn btn-small mb-2">{{__('site.delete')}}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="4">{{ __('site.no_record_found') }}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.name_en')}}</th>
                                            <th>{{__('site.name_ar')}}</th>
                                            @if(Auth::guard('admin')->check())
                                                <td>{{__('product.vendor_name')}}}</td>
                                            @endif
                                            <th>{{__('product.quantity')}}</th>
                                            <th>{{__('product.delivery_fees')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $('#page-length-option').DataTable({
            // "responsive": true,
            // "lengthMenu": [
            //   [10, 25, 50, -1],
            //   [10, 25, 50, "All"]
            // ]
            'scrollX':true
        });
    });
</script>
<script>
    $('.delete-record').submit(function(e) {
        e.preventDefault();

        swal({
            text: "{!! trans('toaster.confirm_delete') !!}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: {
                cancel: {
                text: "{!! trans('site.cancel') !!}",
                value: false,
                visible: true,
                className: ""
              },
              confirm: {
                text: "{!! trans('site.ok') !!}",
                value: true,
                visible: true,
                className: ""
              }
            },
            closeOnClickOutside: false
        })
        .then((isConfirm) => {
            console.log(isConfirm);
          if (isConfirm) {
            this.submit();
            return true;
          } else {
            return false;
          }
        });
    });
</script>
@endsection