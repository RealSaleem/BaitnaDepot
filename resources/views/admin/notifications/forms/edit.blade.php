@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('ads.edit_banner') }}</h4>
                    <form method="post" action="{{ route('admin.notification.update', $Notification->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$Notification->id}}">
                        <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $Notification->image }}" />
                        @include('admin.notifications.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection