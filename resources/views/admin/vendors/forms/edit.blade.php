@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('vendor.edit_vendor') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="POST" action="{{route('admin.vendors.update', $vendor->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="user_id" value="{{$vendor->user->id}}">
                        <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                        <input type="hidden" name="hidden_logo" id="hidden_logo" value="{{$vendor->logo}}">
                        @include('admin.vendors.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
