@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('product.main') }}
    @endsection
    <div class="section section-data-tables">
        <div class="row">


            <div class="col s2 right">
            <a href="{{ route(Auth::guard('admin')->check() ? 'admin.products.create' : 'products.create') }}" class="btn btn-primary"><i class="material-icons left">add</i>
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




                                                <td style="text-align: center;">
                                                    <!-- Dropdown Trigger -->
                                                    <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                                </td>
                                                <ul id="dropdown1" class="dropdown-content">
                                                    <form action="{{route(Auth::guard('admin')->check() ? 'admin.products.destroy' : 'products.destroy', $product->id)}}" method="POST" id="delete-row-{{$product->id}}" class="hide">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="waves-effect waves-light red accent-2 btn btn-small mb-2 hide">{{__('site.delete')}}</button>
                                                    </form>
                                                    <li><a href="{{route(Auth::guard('admin')->check() ? 'admin.products.show' : 'products.show', $product->id)}}"><i class="Small material-icons">visibility</i> View</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="{{ route(Auth::guard('admin')->check() ? 'admin.products.edit' : 'products.edit',$product->id) }}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="javascript:;" data-value="{{$product->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a></li>
                                                </ul>



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
    $('.delete-record').click(function(e) {
        e.preventDefault();
        var rowId = $(this).attr('data-value');
        console.log(rowId);
        swal({
            // title: "{!! trans('toaster.confirm_delete') !!}",
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
                    // this.submit();
                    $('#delete-row-' + rowId).submit();
                    return true;
                    // swal("Poof! Your imaginary file has been deleted!", {
                    //   icon: "success",
                    // });
                } else {
                    return false;
                    // swal("Your imaginary file is safe!");
                }
            });
        // }
    });
</script>

@endsection
