@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('setting.social_media') }}</h4>
                    <form method="post" action="{{ route('admin.web_social_links.save') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col m4 s12">
                                <label for="facebook">{{ __('setting.facebook') }}</label>
                                <input id="facebook" type="text" name="facebook" value="{{ old('facebook', isset($social_media) ? $social_media->facebook : null) }}">
                                @error('facebook')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
                            </div>

                            <div class="input-field col m4 s12">
                                <label for="twitter">{{ __('setting.twitter') }}</label>
                                <input id="twitter" type="text" name="twitter" value="{{ old('twitter', isset($social_media) ? $social_media->twitter : null) }}">
                                @error('twitter')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
                            </div>

                            <div class="input-field col m4 s12">
                                <label for="instagram">{{ __('setting.instagram') }}</label>
                                <input id="instagram" type="text" name="instagram" value="{{ old('instagram', isset($social_media) ? $social_media->instagram : null) }}">
                                @error('instagram')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
                            </div>

                            <div class="input-field col m4 s12">
                                <label for="snapchat">{{ __('setting.snapchat') }}</label>
                                <input id="snapchat" type="text" name="snapchat" value="{{ old('snapchat', isset($social_media) ? $social_media->snapchat : null) }}">
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