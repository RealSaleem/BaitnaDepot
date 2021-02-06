@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')
<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <div class="card-title">
                                    {{__('vendor.vendor_requests')}}
                                </div>
                            </div>
                        </div>
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
                                                    @foreach($services as $service)
                                                        <p>{{Helper::getServiceName($service)}}</p>
                                                    @endforeach
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
                                                <td> 
                                                    <a href="{{route('admin.vendor_requests.id', $vendor->id)}}" class="waves-effect waves-light btn btn-small mb-2">{{__('site.detail')}}</a>
                                                    @if($vendor->status == 0)
                                                        <a href="{{route('admin.approve_vendor', $vendor->id)}}" class="waves-effect waves-light btn btn-small mb-2">{{__('vendor.approve')}}</a>
                                                        <a href="{{route('admin.declined_vendor_request',$vendor->id)}}" class="waves-effect waves-light red accent-2 btn btn-small mb-2 declined-request">{{__('vendor.decline')}}</a>
                                                    @endif
                                                </td>
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