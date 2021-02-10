@extends('layouts.app') 
@section('content')
<style type="text/css">
    
#radiobutton{
    opacity: 1 !important;
    pointer-events: auto !important;
}


</style>


<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('vendor.Promo_code') }}</h4>
                    <form method="post" action="{{route('admin.promo_code.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.promo_code.forms.form')
                        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right pl-4 pr-4 mr-4" type="submit">Create
            </button>
    </div>

</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection