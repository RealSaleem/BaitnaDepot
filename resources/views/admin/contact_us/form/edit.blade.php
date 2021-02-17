@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="Form-advance" class="card card card-default scrollspy">
                    <div class="card-content">
                        <h4 class="card-title">{{ __('contactus.contactus') }}</h4>
                        <form method="post" action="{{ route('admin.ContactUsDetails_update',$GetContactUsDetail->id) }}">
                            @csrf
                            {{ method_field('PUT') }}     
                            <div class="row">
                                <div class="input-field col m6 s6">
                                    <label for="phone">{{ __('contactus.phone') }}</label>
                                    <input id="phone" type="number" name="phone" value="{{ old('phone', isset($GetContactUsDetail) ? $GetContactUsDetail->mobile : null) }}">
                                    @error('phone')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s6">
                                    <label for="email">{{ __('contactus.email') }}</label>
                                    <input id="email" type="email" name="email" value="{{ old('email', isset($GetContactUsDetail) ? $GetContactUsDetail->email : null) }}">
                                    @error('email')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m12 s12">
                                    <label for="address">{{ __('contactus.address') }}</label>
                                    <input id="address" type="text" name="address" value="{{ old('address', isset($GetContactUsDetail) ? $GetContactUsDetail->address : null) }}">
                                    @error('address')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s6">
                                    <label for="facebook">{{ __('setting.facebook') }}</label>
                                    <input id="facebook" type="text" name="facebook" value="{{ old('facebook', isset($GetContactUsDetail) ? $GetContactUsDetail->facebook : null) }}">
                                    @error('facebook')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s6">
                                    <label for="twitter">{{ __('setting.twitter') }}</label>
                                    <input id="twitter" type="text" name="twitter" value="{{ old('twitter', isset($GetContactUsDetail) ? $GetContactUsDetail->twitter : null) }}">
                                    @error('twitter')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s6">
                                    <label for="instagram">{{ __('setting.instagram') }}</label>
                                    <input id="instagram" type="text" name="instagram" value="{{ old('instagram', isset($GetContactUsDetail) ? $GetContactUsDetail->instagram : null) }}">
                                    @error('instagram')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s6">
                                    <label for="snapchat">{{ __('setting.snapchat') }}</label>
                                    <input id="snapchat" type="text" name="snapchat" value="{{ old('snapchat', isset($GetContactUsDetail) ? $GetContactUsDetail->snapchat : null) }}">
                                    @error('snapchat')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.update') }}
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
