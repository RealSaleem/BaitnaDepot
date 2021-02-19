@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('vendor.add_vendor') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="POST" action="{{route('admin.vendors.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.vendors.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
