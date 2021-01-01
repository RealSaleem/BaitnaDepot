<div class="row">
    <div class="input-field col m3 s12 mh-100">
        <label for="name">{{__('site.name')}}</label>
        <input id="name" type="text" name="name" value="{{ old('name', isset($user) ? $user->name : null) }}">
        @if($errors->has('name'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('name') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m3 s12 mh-100">
        <label for="username">{{__('user.username')}}</label>
        <input id="username" type="text" name="username" value="{{ old('username', isset($user) ? $user->username : null) }}">
        @if($errors->has('username'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('username') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m3 s12 mh-100">
        <label for="mobile">{{__('user.phone_number')}}</label>
        <input id="mobile" type="text" name="mobile" value="{{ old('mobile', isset($user) ? $user->mobile : null) }}" maxlength="8" minlength="8">
        @if($errors->has('mobile'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('mobile') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m3 s12 mh-100">
        <label for="email">{{ __('user.email') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email', isset($user) ? $user->email : null) }}">
        @if($errors->has('email'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('email') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m3 s12 mh-100">
        <label for="dob" class="active">{{ __('user.dob') }}</label>
        <input id="dob" type="date" name="date_of_birth" value="{{ old('date_of_birth', isset($user) ? $user->date_of_birth : null) }}" placeholder="{{ __('user.dob') }}">
        @if($errors->has('dob'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('dob') }}</div>
            </small>
        @endif
    </div>
    @if(!isset($user))
    <div class="input-field col m3 s12 mh-100">
        <label for="password">{{__('user.password')}}</label>
        <input id="password" type="password" name="password">
        @if($errors->has('password'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('password') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m3 s12 mh-100">
        <label for="password_confirmation">{{__('user.confirm_password')}}</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
        @if($errors->has('confirm_password'))
            <small class="errorTxt">
                <div class="error">{{ $errors->first('password_confirmation') }}</div>
            </small>
        @endif
    </div>
    @endif
</div>
<div class="row">
    <div class="input-field col s12">
        <button class="btn cyan waves-effect waves-light right" type="submit">
            {{ __('site.save') }}
        </button>
    </div>
</div>