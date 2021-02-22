@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container">
    @section('heading')
        {{__('vendor.vendor_requests')}}
    @endsection
    <div class="section section-data-tables">
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
                                            <th>{{__('vendor.vendor_name')}}</th>
                                            <th>{{__('vendor.phone_number')}}</th>
                                            <th>{{__('vendor.services')}}</th>
                                            <th>{{__('vendor.status')}}</th>
                                            <th>{{__('vendor.date')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($vendors) > 0)
                                            @foreach($vendors as $vendor)
                                            <tr>
                                                <td>{{$vendor->id}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$vendor->mobile}}</td>
                                                <td>
                                                    @php
                                                        $services = json_decode($vendor->services);
                                                    @endphp
                                                    @if($services != null)
                                                        @foreach($services as $service)
                                                            <p>{{Helper::getServiceName($service)}}</p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($vendor->status == 0)
                                                        <p>{{__('vendor.unapprove')}}</p>
                                                    @elseif($vendor->status == 1)
                                                        <p>{{__('vendor.approved')}}</p>
                                                    @elseif($vendor->status == 2)
                                                        <p>{{__('vendor.declined')}}</p>
                                                    @endif
                                                </td>
                                                <td>{{Helper::getFormatedDate($vendor->created_at)}}</td>

                                                <td style="text-align: center;">
                                                    <!-- Dropdown Trigger -->
                                                    <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                                </td>
                                                <ul id="dropdown1" class="dropdown-content">
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="{{route('admin.vendor_requests.id', $vendor->id)}}"><i class="Small material-icons">edit</i>{{__('site.detail')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="{{route('admin.approve_vendor', $vendor->id)}}"><i class="Small material-icons">edit</i> {{__('vendor.approve')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="{{route('admin.declined_vendor_request',$vendor->id)}}"><i class="Small material-icons">edit</i> {{__('vendor.decline')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                </ul>

                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="4">{{__('vendor.no_request_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('vendor.vendor_name')}}</th>
                                            <th>{{__('vendor.phone_number')}}</th>
                                            <th>{{__('vendor.services')}}</th>
                                            <th>{{__('vendor.status')}}</th>
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
    $('.declined-request').on('click', function(e) {
        e.preventDefault();
        var url = this.href;
        swal({
            text: "{!! trans('toaster.confirm_declined_vendor_request') !!}",
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
            window.location.href= url;
            return true;
          } else {
            return false;
          }
        });
    });
</script>
@endsection
