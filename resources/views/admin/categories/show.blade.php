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
                                        {{-- @foreach(Config::get('app.locales') as $key => $value)
                                        <tr>
                                            <td>{{__('site.name_'.$key)}}:</td>
                                            <td class="users-view-username">
                                                {{$category->getTranslation('name',$key)}}
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                        <tr>
                                            <td>{{__('site.name_en')}}:</td>
                                            <td class="users-view-username">
                                                {{$category->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('site.name_ar')}}:</td>
                                            <td class="users-view-username">
                                                {{$category->name_ar}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{__('category.parent_category')}}:</td>
                                            <td class="users-view-name">{{$category->parent}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('category.type')}}:</td>
                                            <td class="users-view-name">{{$category->type}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.date')}}:</td>
                                            <td>{{Helper::getFormatedDate($category->created_at)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">
                                <img src="{{$category->image}}" alt="Category Image" class="responsive-img" style="width: 100%; height: auto">
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