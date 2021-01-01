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
                        <div class="row">
                            @foreach(Config::get('app.locales') as $key => $value)
                                <div class="input-field col m6 s6">
                                    <label for="name-{{$key}}">{{ __('vendor.name_'.$key) }}</label>
                                    <input id="name-{{$key}}" type="text" name="name[{{$key}}]" value="{{old('name.'.$key, isset($user) ? $user->vendor->getTranslation('name',$key) : null)}}">
                                </div>
                            @endforeach
                            <div class="input-field col m4 s12">
                                <label for="mobile">{{__('vendor.phone_number')}}</label>
                                <input id="mobile" type="text" name="mobile" value="{{old('mobile', isset($user) ? $user->mobile : null)}}">
                                @if($errors->has('mobile'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('mobile') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col s12 m8 l12">
                                <label for="categories" style="display: contents;">{{__('vendor.store_logo')}}</label>
                                @if($user->vendor->logo != null)
                                    <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{$user->vendor->logo}}" data-max-file-size="2M"/>
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
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>
@endsection