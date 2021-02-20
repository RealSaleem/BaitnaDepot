@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')

<div class="container">
    @section('heading')
        {{__('vendor.generate_promo')}}
    @endsection
    <div class="section section-data-tables">
        <div class="row">


            <div class="col s2 right">
                <a href="{{ route('admin.promo_code.create') }}" class="btn btn-block indigo waves-effect waves-light right"><i class="material-icons right">add</i>
                    {{__('vendor.generate_promo')}}
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>valid From </th>
                                            <th>Valid Till</th>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>User Allow</th>
                                            <th> Send</th>
                                            <th style="width: 15px;"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($PromoCode as $PC)
                                            <tr>
                                                <td>{{$PC->id}}</td>
                                                <td>{{$PC->name}}</td>
                                                <td>{{$PC->valid_from}}</td>
                                                <td>{{$PC->valid_til}}</td>
                                                <td>{{$PC->type}}</td>
                                                <td>{{$PC->value}}</td>
                                                <td>{{$PC->num_of_user}}</td>
                                        <td>
                                            <select id="promo_type" name="promo_type">
                                                   <option>Action </option>
                                                   <option value="1" >Send To All  </option>
                                                   <option value="2">Send To Vendors  </option>
                                                   <option value="2">Send To Users  </option>
                                            </select>
                                        </td>

{{--                                        <td>--}}
{{--                                        <a href="{{ route('admin.promo_code.edit',$PC->id) }}" class="waves-effect waves-light btn btn-small mb-2"><i class="Medium material-icons" style="font-size: 30px;">edit</i></a>--}}
{{--                                        <form action="{{ route('admin.promo_code.destroy',$PC->id) }}" method="POST" class="delete-record">--}}
{{--                                        @method('DELETE')--}}
{{--                                        @csrf--}}
{{--                                        <button class="waves-effect waves-light red accent-2 btn "> <i class="Medium material-icons" style="font-size: 30px;">delete_forever</i></button>--}}
{{--                                        </form>--}}
{{--                                        </td>--}}

        <td style="text-align: center;">
            <!-- Dropdown Trigger -->
            <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

        </td>
        <ul id="dropdown1" class="dropdown-content">
            <form action="{{ route('admin.promo_code.destroy',$PC->id) }}" method="POST" id="delete-row-{{$PC->id}}" class="hide">
                @method('DELETE')
                @csrf
                <button class="waves-effect waves-light red accent-2 btn btn-small mb-2 hide">{{__('site.delete')}}</button>
            </form>
            <li class="divider" tabindex="-1"></li>
            <li><a href="{{ route('admin.promo_code.edit',$PC->id) }}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="javascript:;" data-value="{{$PC->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a></li>
        </ul>






                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>valid From </th>
                                            <th>Valid Till</th>
                                              <th>Type</th>
                                            <th>Value</th>

                                            <th style="text-align: center;"> Action</th>
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
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
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
    // function confirm_delete(){
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
