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
                            <div class="col s12">
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>{{__('contact.customer_name')}}:</td>
                                            <td class="users-view-username">{{$contact->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('contact.email')}}:</td>
                                            <td class="users-view-name">{{$contact->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('contact.phone')}}:</td>
                                            <td class="users-view-email">{{$contact->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('contact.message')}}:</td>
                                            <td>{{$contact->message}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('contact.status')}}:</td>
                                            <td>{{ucwords($contact->status)}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('contact.submission_date')}}:</td>
                                            <td>{{Helper::getFormatedDateTime($contact->created_at)}}</td>
                                        </tr>
                                        @if($contact->status != 'viewed')
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                    <a href="{{route('admin.viewed_contact_message', $contact->id)}}" class="waves-effect waves-light btn btn-small">{{__('contact.viewed')}}</a>
                                                </center>
                                            </td>
                                        </tr>
                                        @endif
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