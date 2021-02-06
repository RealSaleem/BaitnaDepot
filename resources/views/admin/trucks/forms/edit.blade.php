@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('truck.edit_truck') }}</h4>
                    <form method="post" action="{{ route('admin.heavy_trucks.update',$truck->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        @include('admin.trucks.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection