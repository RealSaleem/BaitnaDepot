@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('vendor.edit_vendor') }}</h4>
                    <form method="POST" action="{{route('admin.vendors.update', $vendor->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="user_id" value="{{$vendor->user->id}}">
                        <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                        @include('admin.vendors.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection