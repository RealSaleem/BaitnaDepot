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
                                        <tr>
                                            <td>{{__('site.id')}}</td>
                                            <td class="users-view-name">{{$user->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.username')}}</td>
                                            <td class="users-view-name">{{$user->username}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.full_name')}}</td>
                                            <td class="users-view-name">{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.phone_number')}}</td>
                                            <td class="users-view-name">{{$user->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.email')}}</td>
                                            <td class="users-view-name">{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.date_of_joining')}}</td>
                                            <td class="users-view-name">{{Helper::getFormatedDate($user->created_at)}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.dob')}}</td>
                                            <td class="users-view-name">{{Helper::getFormatedDate($user->date_of_birth)}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('user.last_signin')}}</td>
                                            <td class="users-view-name">{{$user->last_login != null ? Helper::getFormatedDate($user->last_login) : null}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                    <a href="#" class="waves-effect waves-light btn btn-small">{{__('user.favourite_list')}}</a>
                                                    <a href="#" class="waves-effect waves-light btn btn-small">{{__('user.post_list')}}</a>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- right side content here -->
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