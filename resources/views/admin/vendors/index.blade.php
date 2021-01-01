@extends('admin.layouts.app')
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
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{route('admin.vendors.create')}}" class="btn waves-effect waves-light green right">
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
                                    {{__('vendor.main')}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="vendors-table" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('site.name_'.$key)}}</th>
                                            @endforeach
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
                                                @foreach(Config::get('app.locales') as $key => $value)
                                                    <td>{{$vendor->getTranslation('name', $key)}}</td>
                                                @endforeach 
                                                <td>{{$vendor->user->mobile}}</td>
                                                <td>{{$vendor->user->email}}</td>
                                                <td>
                                                    @php
                                                        $services = json_decode($vendor->services);
                                                    @endphp
                                                    @foreach($services as $service)
                                                        <p>{{Helper::getServiceName($service)}}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{Helper::getFormatedDate($vendor->created_at)}}</td>
                                                <td> 
                                                    <span>
                                                        <a href="{{route('admin.vendors.show', $vendor->id)}}" class="waves-effect waves-light btn btn-small">{{__('site.view')}}</a>
                                                        <a href="{{route('admin.vendors.edit', $vendor->id)}}" class="waves-effect waves-light btn btn-small">{{__('site.edit')}}</a>
                                                        <form action="{{route('admin.vendors.destroy', $vendor->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="waves-effect waves-light red btn btn-small">{{__('site.delete')}}</button>
                                                        </form>
                                                        <a href="javascript:;" onclick="return reset_password({{$vendor->user->id}})" class="waves-effect waves-light red btn btn-small">{{__('site.reset_password')}}</a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="4">{{__('vendor.no_vendor_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('site.name_'.$key)}}</th>
                                            @endforeach
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
    $('#vendors-table').DataTable({
        // "responsive": true,
        // "lengthMenu": [
        //   [10, 25, 50, -1],
        //   [10, 25, 50, "All"]
        // ]
        'scrollX':true
    });
</script>
@endsection