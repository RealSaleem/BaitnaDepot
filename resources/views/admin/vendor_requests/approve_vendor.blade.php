@extends('admin.layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/form-select2.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('vendor.add_vendor') }}</h4>
                    <form method="post" action="{{ route('admin.approved_vendor_request') }}">
                        <input type="hidden" name="vendor_request_id" value="{{$vendor->id}}">
                        @csrf
                        <div class="row">
                            @foreach(Config::get('app.locales') as $key => $value)
                                <div class="input-field col m6 s6">
                                    <label for="name-{{$key}}">{{ __('vendor.name_'.$key) }}</label>
                                    <input id="name-{{$key}}" type="text" name="name[{{$key}}]" value="{{old('name.'.$key)}}">
                                </div>
                            @endforeach
                            <div class="input-field col m4 s12">
                                <label for="email">{{__('vendor.email')}}</label>
                                <input id="email" type="email" name="email" value="{{old('email')}}">
                                 @if($errors->has('email'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="password">{{__('vendor.password')}}</label>
                                <input id="password" type="password" name="password" value="{{old('password')}}">
                                @if($errors->has('password'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="password_confirmation">{{__('vendor.confirm_password')}}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
                                @if($errors->has('confirm_password'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="mobile">{{__('vendor.phone_number')}}</label>
                                <input id="mobile" type="text" name="mobile" value="{{old('mobile')}}">
                                @if($errors->has('mobile'))
                                    <small class="errorTxt">
                                        <div class="error">{{ $errors->first('mobile') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="services" style="display: contents;">{{__('vendor.services')}}</label>
                                <select name="services[]" id="cat_type" class="select2 browser-default" multiple="multiple" required="">
                                    @php
                                        $selected_services = json_decode($vendor->services); 
                                        $all_services = Helper::getAllServices();
                                    @endphp
                                    @foreach($all_services as $key => $service)
                                    <option value="{{$key}}" {{ in_array($key, $selected_services) ? "selected" : null }}>{{Helper::getServiceName($key)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="categories" style="display: contents;">{{__('vendor.categories')}}</label>
                                <select name="categories[]" id="categories" class="select2 browser-default" multiple="multiple">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.save') }}
                                    </button>
                                </div>
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
<script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
@endsection