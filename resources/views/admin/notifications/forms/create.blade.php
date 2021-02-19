@extends('layouts.app')
@section('content')
<style type="text/css">

#radiobutton{
    opacity: 1 !important;
    pointer-events: auto !important;
}


</style>


<div class="container">
    @section('heading')
        {{__('notification.create')}}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="post" action="{{route('admin.notification.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.notifications.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
