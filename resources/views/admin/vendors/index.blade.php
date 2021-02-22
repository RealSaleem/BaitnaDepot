@extends('layouts.app')
@section('styles')

@endsection
@section('content')

<!-- Modal Structure -->
<div id="reset_password" class="modal">
    <div class="modal-content card-panel">
        <h5>{{__('site.reset_password')}}</h5>
        <div class="col s12">
            <div class="row">
                <form id="reset_password_form" action="{{route('admin.reset_password')}}" method="POST">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="">
                    <div class="col s12 m6">
                        <div class="input-field">
                            <label for="users-list-verified">{{__('vendor.password')}}</label>
                            <input type="password" name="password">
                            <small class="errorTxt">
                                <div class="error"></div>
                            </small>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="input-field">
                            <label for="name">{{__('vendor.confirm_password')}}</label>
                            <input type="password" name="password_confirmation">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button form="reset_password_form" type="submit" class="modal-action waves-effect waves-light btn btn-small">{{__('site.save')}}</button>
        <a href="javascript:;" class="modal-action modal-close waves-effect waves-light btn btn-small">{{__('site.cancel')}}</a>
    </div>
</div>
<div class="container">
    @section('heading')
    {{__('site.vendor')}}
    @endsection
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s2 right">
                <a href="{{route('admin.vendors.create')}}" class="btn btn-block indigo waves-effect waves-light right"><i class="material-icons right">add</i>
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
                                <table id="vendors-table" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('vendor.name_en')}}</th>
                                            <th>{{__('vendor.name_ar')}}</th>
                                            <th>{{__('vendor.phone_number')}}</th>
                                            <th>{{__('vendor.email')}}</th>
                                            <th>{{__('vendor.services')}}</th>
                                            <th>{{__('vendor.date')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($vendors) > 0)
                                        @foreach($vendors as $vendor)
                                        <tr>
                                            <td>{{$vendor->id}}</td>
                                            <td>{{$vendor->name_en}}</td>
                                            <td>{{$vendor->name_ar}}</td>
                                            <td>{{$vendor->user != null ? $vendor->user->mobile : null}}</td>
                                            <td>{{$vendor->user != null ? $vendor->user->email : null}}</td>
                                            <td>
                                                @php
                                                $services = json_decode($vendor->services);
                                                @endphp
                                                @foreach($services as $service)
                                                <p>{{Helper::getServiceName($service)}}</p>
                                                @endforeach
                                            </td>
                                            <td>{{Helper::getFormatedDate($vendor->created_at)}}</td>
                                            <td style="text-align: center;">
                                                <!-- Dropdown Trigger -->
                                                <a class="dropdown-trigger" href="#" data-target="dropdown1"><i class="Small material-icons" style="font-size: 30px;">list</i></a>
                                            </td>
                                            <ul id="dropdown1" class="dropdown-content">
                                                <form action="{{route('admin.vendors.destroy', $vendor->id)}}" method="POST" id="delete-row-{{$vendor->id}}" class="hide">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="waves-effect waves-light red accent-2 btn btn-small mb-2 hide">{{__('site.delete')}}</button>
                                                </form>
                                                <li><a href="{{route('admin.vendors.show', $vendor->id)}}"><i class="Small material-icons" style="font-size: 30px;">visibility</i> View </a></li>
                                                <li class="divider" tabindex="-1"></li>
                                                <li><a href="{{route('admin.vendors.edit', $vendor->id)}}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
                                                <li class="divider" tabindex="-1"></li>
                                                <li><a href="javascript:;" data-value="{{$vendor->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a></li>
                                                <li class="divider" tabindex="-1"></li>
                                                <li style="text-align: center;"><a href="javascript:;" onclick="return reset_password({{$vendor->user->id}})">Reset Password</a> </li>
                                            </ul>
                                        </tr>
                                        @endforeach
                                        @else
                                        <td colspan="4">{{__('vendor.no_vendor_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('vendor.name_en')}}</th>
                                            <th>{{__('vendor.name_ar')}}</th>
                                            <th>{{__('vendor.phone_number')}}</th>
                                            <th>{{__('vendor.email')}}</th>
                                            <th>{{__('vendor.services')}}</th>
                                            <th>{{__('vendor.date')}}</th>
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
<script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}"></script>
<script>
    function reset_password($id) {
        $('#user_id').val($id);
        $('#reset_password').modal('open');
    }
</script>

<script>
    $(document).ready(function() {
        $('#reset_password_form').submit(function(e) {
            var action = e.target.action;
            $.ajax({
                url: action,
                type: "POST",
                data: $('#reset_password_form').serialize(),
                success: function(response) {
                    $('#reset_password_form')[0].reset();
                    $('#reset_password').modal('close');
                },
                error: function(data) {
                    $('.error').text(data.responseJSON.errors.password[0]);
                }
            });
            return false;
        });
    });
</script>

<script>
    $('#vendors-table').DataTable({
        // "responsive": true,
        // "lengthMenu": [
        //   [10, 25, 50, -1],
        //   [10, 25, 50, "All"]
        // ]
        'scrollX': true
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