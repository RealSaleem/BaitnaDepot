@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col s12 center pt-10 pb-0">
            <img src="{{asset('app-assets/images/logo/baitna.png')}}" alt="">
{{--            <img src="{{asset('app-assets/images/logo/baitna2.png')}}" alt="">--}}
        </div>
        <div class="col s12 pt-0">
            <div class="container pt-0">
                <div id="login-page" class="row login">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                        <form class="login-form mt-10" method="POST" action="{{ route($loginRoute) }}">
                            @csrf

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="username" class="center-align">{{ __('E-Mail Address') }}</label>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <label for="password">{{ __('Password') }}</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button id="loginsubmit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('Login') }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    @if (Route::has('register'))
                                        <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
                                    @endif
                                </div>
                                <div class="input-field col s6 m6 l6">
{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <p class="margin right-align medium-small"><a href="{{ route($forgotPasswordRoute) }}">{{ __('Forgot Your Password?') }}</a></p>--}}
{{--                                    @endif--}}
                                            <p class="margin right-align medium-small"><a href="{{ route($forgotPasswordRoute) }}">{{ __('Forgot Your Password?') }}</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>





{{--<div class="row">--}}
{{--    <div class="col s12">--}}
{{--        <div class="container">--}}
{{--            <div id="login-page" class="row">--}}
{{--                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">--}}
{{--                    <form class="login-form" method="POST" action="{{ route($loginRoute) }}">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="input-field col s12">--}}
{{--                                <h5 class="ml-4">@lang('auth.sign_in')</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row margin">--}}
{{--                            <div class="input-field col s12">--}}
{{--                                <i class="material-icons prefix pt-2">person_outline</i>--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                <label for="username" class="center-align">{{ __('E-Mail Address') }}</label>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row margin">--}}
{{--                            <div class="input-field col s12">--}}
{{--                                <i class="material-icons prefix pt-2">lock_outline</i>--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
{{--                                <label for="password">{{ __('Password') }}</label>--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="input-field col s12">--}}
{{--                                <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('Login') }}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="input-field col s6 m6 l6">--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="input-field col s6 m6 l6">--}}
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <p class="margin right-align medium-small"><a href="{{ route($forgotPasswordRoute) }}">{{ __('Forgot Your Password?') }}</a></p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="content-overlay"></div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
