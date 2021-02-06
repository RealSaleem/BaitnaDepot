@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('site.edit_store') }}</h4>
                    <form method="POST" action="{{route('edit_store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="hidden_image" name="hidden_image" value="{{$user->vendor->logo}}">
                        <div class="row">
                            <div class="input-field col m6 s6">
                                <label for="name-en">{{ __('vendor.name_en') }}</label>
                                <input id="name-en" type="text" name="name_en" value="{{old('name_en', isset($user) ? $user->vendor->name_en : null)}}">
                                @if($errors->has('name_en'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('name_en') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m6 s6">
                                <label for="name-ar">{{ __('vendor.name_ar') }}</label>
                                <input id="name-ar" type="text" name="name_ar" value="{{old('name_ar', isset($user) ? $user->vendor->name_ar : null)}}">
                                @if($errors->has('name_ar'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('name_ar') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="mobile">{{__('vendor.phone_number')}}</label>
                                <input id="mobile" type="text" name="mobile" value="{{old('mobile', isset($user) ? $user->mobile : null)}}" minlength="8" maxlength="8">
                                @if($errors->has('mobile'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('mobile') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="email">{{__('vendor.email')}}</label>
                                <input id="email" type="text" name="email" value="{{old('email', isset($user) ? $user->email : null)}}" disabled="">
                            </div>
                            <div class="input-field col s12 m8 l12">
                                <label for="categories" style="display: contents;">{{__('vendor.store_logo')}}</label>
                                @if($user->vendor->logo != null)
                                    <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{asset('storage/'.$user->vendor->logo)}}" data-max-file-size="2M"/>
                                @else
                                    <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="" data-max-file-size="2M"/>
                                @endif

                                @if($errors->has('logo'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('logo') }}</div>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.save') }}
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
@section('scripts')
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script>
    var drEvent = $('.dropify').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        $('#hidden_image').val(null);
    });
</script>
@endsection