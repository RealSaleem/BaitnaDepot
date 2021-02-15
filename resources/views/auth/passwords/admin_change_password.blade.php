@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('auth.change_password') }}</h4>
                    <form method="post" action="{{ route($route) }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col m4 s12">
                                <label for="current_password">{{ __('auth.current_password') }}</label>
                                <input id="current_password" type="password" name="current_password">
                                @error('current_password')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="new_password">{{ __('auth.new_password') }}</label>
                                <input id="new_password" type="password" name="new_password">
                                @error('new_password')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
                            </div>
                            <div class="input-field col m4 s12">
                                <label for="confirm_new_password">{{ __('auth.confirm_new_password') }}</label>
                                <input id="confirm_new_password" type="password" name="confirm_new_password">
                                @error('confirm_new_password')
                                    <small class="errorTxt">
                                        <div class="error">{{ $message }}</div>
                                    </small>
                                @enderror
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