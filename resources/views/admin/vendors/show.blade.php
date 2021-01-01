@extends('admin.layouts.app')
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
                            <div class="col s6">
                                <table class="striped">
                                    <tbody>
                                        @foreach(Config::get('app.locales') as $key => $value)
                                        <tr>
                                            <td>{{__('site.name_'.$key)}}:</td>
                                            <td class="users-view-username">
                                                {{$vendor->getTranslation('name',$key)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{__('vendor.email')}}:</td>
                                            <td class="users-view-name">{{$vendor->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.phone_number')}}:</td>
                                            <td class="users-view-email">{{$vendor->user->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.services')}}:</td>
                                            <td>
                                                @foreach(json_decode($vendor->services) as $service)
                                                    <p>{{Helper::getServiceName($service)}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.joining_date')}}:</td>
                                            <td>{{Helper::getFormatedDate($vendor->created_at)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">
                                <img src="{{$vendor->logo}}" class="responsive-img" style="width: 100%; height: auto">
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