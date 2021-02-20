@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
        @section('heading')
            {{ __('Store') }}
        @endsection
            <!-- users view start -->
            <div class="section users-view">
                <!-- users view card details start -->
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <table class="striped">
                         <tbody>
                                        {{-- @foreach(Config::get('app.locales') as $key => $value)
                                        <tr>
                                            <td>{{__('site.name_'.$key)}}:</td>
                                            <td class="users-view-username">
                                                {{$user->vendor->getTranslation('name',$key)}}
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                        <tr>
                                            <td>{{__('site.name_en')}}:</td>
                                            <td class="users-view-username">
                                                {{$user->vendor->name_en}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.name_ar')}}:</td>
                                            <td class="users-view-username">
                                                {{$user->vendor->name_ar}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.email')}}:</td>
                                            <td class="users-view-username">
                                                {{$user->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Avaibility:</td>
                                            <td class="users-view-username">
                                                @if($user->vendor->avaibility ==0)
                                                    {{\App\Helpers\AppConstant::NOT_AVAILABLE}}
                                                @endif
                                                @if($user->vendor->avaibility ==1)
                                                    {{\App\Helpers\AppConstant::AVAILABLE}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.phone_number')}}:</td>
                                            <td class="users-view-name">{{$user->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.type')}}:</td>
                                            <td>
                                                @foreach(json_decode($user->vendor->services) as $service)
                                                    <p>{{Helper::getServiceName($service)}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                    <a href="{{route('edit_store')}}" class="waves-effect waves-light btn btn-small">{{__('site.edit')}}</a>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">

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
