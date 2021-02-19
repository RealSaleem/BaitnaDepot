@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
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
                            <label for="users-list-verified">{{__('user.password')}}</label>
                            <input type="password" name="password">
                        <small class="errorTxt">
                            <div class="error"></div>
                        </small>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="input-field">
                            <label for="name">{{__('user.confirm_password')}}</label>
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
        {{__('user.main')}}
    @endsection
    <section class="users-list-wrapper section">
        <div class="users-list-filter">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div class="row">
                            <form>
                                <div class="col s12 m6 l3">
                                    <div class="input-field">
                                        <label for="users-list-verified">{{__('user.username')}}</label>
                                        <input type="text" name="username" value="{{Request()->get('username')}}">
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="input-field">
                                        <label for="name">{{__('user.name')}}</label>
                                        <input type="text" name="name" value="{{Request()->get('name')}}">
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="input-field">
                                        <label for="mobile">{{__('user.phone_number')}}</label>
                                        <input type="text" name="mobile" value="{{Request()->get('mobile')}}">
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="input-field">
                                        <label for="email">{{__('user.email')}}</label>
                                        <input type="text" name="email" value="{{Request()->get('email')}}">
                                    </div>
                                </div>
                                <div class="col s12 m6 l3 display-flex align-items-center">
                                    <button type="submit" class="btn btn-block indigo waves-effect waves-light">{{__('site.show')}}</button>

                                     <a href="{{route('admin.users.index')}}" class="btn btn-block indigo waves-effect waves-light ml-3">{{__('site.reset')}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{route('admin.users.create')}}" class="btn waves-effect waves-light green right">
                    {{__('site.add_new')}}
                </a>
                <!-- kanban container -->
                <div id="kanban-app"></div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <div class="card-title">
                                    {{__('user.main')}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="users-table" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('user.username')}}</th>
                                            <th>{{__('user.full_name')}}</th>
                                            <th>{{__('user.phone_number')}}</th>
                                            <th>{{__('user.email')}}</th>
                                            <th>{{__('user.date_of_joining')}}</th>
                                            <th>{{__('user.last_signin')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($users) > 0)
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{Helper::getFormatedDate($user->created_at)}}</td>
                                                <td>{{$user->last_login != null ? Helper::getFormatedDateTime($user->last_login) : null}}</td>




                                                    <td style="text-align: center;">
                                                        <!-- Dropdown Trigger -->
                                                        <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                                    </td>
                                                    <ul id="dropdown1" class="dropdown-content">
                                                        <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" id="delete-row-{{$user->id}}" class="hide">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="waves-effect waves-light red accent-2 btn btn-small mb-2 hide" >{{__('site.delete')}}</button>
                                                        </form>
                                                        <li><a href="{{route('admin.users.show', $user->id)}}"><i class="Small material-icons" style="font-size: 30px;">visibility</i> View </a></li>
                                                        <li class="divider" tabindex="-1"></li>
                                                        <li><a href="{{route('admin.users.edit', $user->id)}}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
                                                        <li class="divider" tabindex="-1"></li>
                                                        <li><a href="javascript:;" data-value="{{$user->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a></li>
                                                    </ul>




                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="8">{{__('user.not_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <th>{{__('site.id')}}</th>
                                        <th>{{__('user.username')}}</th>
                                        <th>{{__('user.full_name')}}</th>
                                        <th>{{__('user.phone_number')}}</th>
                                        <th>{{__('user.email')}}</th>
                                        <th>{{__('user.date_of_joining')}}</th>
                                        <th>{{__('user.last_signin')}}</th>
                                        <th>{{__('site.actions')}}</th>
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
<!-- Jquery download pdf excel and csv scripts -->
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
    function reset_password($id)
    {
        $('#user_id').val($id);
        $('#reset_password').modal('open');
    }
</script>

<script>
    $(document).ready(function(){
        $('#reset_password_form').submit(function(e){
            var action = e.target.action;
            $.ajax({
                url:  action,
                type: "POST",
                data: $('#reset_password_form').serialize(),
                success: function(response)
                {
                    $('#reset_password_form')[0].reset();
                    $('#reset_password').modal('close');
                },
                error: function(data)
                {
                    $('.error').text(data.responseJSON.errors.password[0]);
                }
            });
            return false;
        });
    });
</script>

<script>
    $('#users-table').DataTable({
        'scrollX':true,
        'dom': 'Bfrtip',
        'buttons': [
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: 'th:not(:last-child)'
                }
            }
        ]
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
