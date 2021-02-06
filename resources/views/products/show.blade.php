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
                            <div class="col s6">
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>{{__('site.name_en')}}:</td>
                                            <td class="users-view-username">{{$product->name_en}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.name_ar')}}:</td>
                                            <td class="users-view-username">{{$product->name_ar}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.description_en')}}:</td>
                                            <td class="users-view-name">{{$product->description_en}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.description_ar')}}:</td>
                                            <td class="users-view-name">{{$product->description_ar}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('product.quantity')}}:</td>
                                            <td class="users-view-name">{{$product->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('product.delivery_fees')}}:</td>
                                            <td class="users-view-name">{{$product->delivery_fees}}</td>
                                        </tr>
                                        @if(Auth::guard('admin')->check())
                                        <tr>
                                            <td>{{__('product.vendor_name')}}:</td>
                                            <td class="users-view-name">{{$product->vendor->getLocaleName()}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>{{__('site.created_at')}}:</td>
                                            <td>{{Helper::getFormatedDate($product->created_at)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">
                                {{-- <img src="{{$category->image}}" alt="Product Image" class="responsive-img" style="width: 100%; height: auto"> --}}
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