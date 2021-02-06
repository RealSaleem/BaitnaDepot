@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            <!-- users view start -->
            <div class="section users-view">
                <!-- users view card details start -->
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>{{__('vendor.vendor_name')}}:</td>
                                            <td class="users-view-username">{{$vendor->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.phone_number')}}:</td>
                                            <td class="users-view-name">{{$vendor->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.services')}}:</td>
                                            <td class="users-view-email">
                                                @php
                                                    $services = json_decode($vendor->services);
                                                @endphp
                                                @foreach($services as $service)
                                                    <p>{{Helper::getServiceName($service)}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.status')}}:</td>
                                            <td>
                                               @if($vendor->status == 0)
                                                    <p>{{__('vendor.unapprove')}}</p>
                                                @elseif($vendor->status == 1)
                                                    <p>{{__('vendor.approved')}}</p>
                                                @elseif($vendor->status == 2)
                                                    <p>{{__('vendor.declined')}}</p>    
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.message')}}:</td>
                                            <td>{{$vendor->message}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.date')}}:</td>
                                            <td>{{Helper::getFormatedDate($vendor->created_at)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                    @if($vendor->status == 0)
                                                        <a href="{{route('admin.approve_vendor', $vendor->id)}}" class="waves-effect waves-light btn btn-small">{{__('vendor.approve')}}</a>
                                                        <a href="{{route('admin.declined_vendor_request',$vendor->id)}}" class="waves-effect waves-light red btn btn-small">{{__('vendor.decline')}}</a>
                                                    @endif
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- users view card details ends -->
            </div>
            <!-- users view ends -->
        </div>
    </div>
</div>
@endsection