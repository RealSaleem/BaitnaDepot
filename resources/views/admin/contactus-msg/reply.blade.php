@extends('layouts.app')
@section('styles')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="Form-advance" class="card card card-default scrollspy">
                    <div class="card-content">
                        <h4 class="card-title">{{__('contact.reply')}}</h4>
                        <br><br>
                        <form method="post" action="{{route('admin.reply_contact_us_messages')}}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input id="name" type="hidden" name="id" value="{{ old('title', isset($user) ? $user->id : null) }}">
                            <div class="input-field col m6 s6 h-10">
                                <input id="name" type="text" name="name" value="{{ old('title', isset($user) ? $user->name : null) }}">
                                <label for="name">{{__('contact.name')}}</label>
                                @if($errors->has('name'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('name') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m6 s6 h-10">
                                <input id="email" type="text" name="email" value="{{ old('title', isset($user) ? $user->email : null) }}">
                                <label for="email">TO</label>
                                @if($errors->has('email'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('email') }}</div>
                                    </small>
                                @endif
                            </div>

                            <div class="input-field col m12 s12 h-10 mt-3"><br><br>
                                <textarea id="textarea2" name="message" class="materialize-textarea" value=""> </textarea>
                                <label for="message">{{__('contact.message')}}</label>
                                @if($errors->has('message'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('message') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <br><br>
                                    <button class="btn cyan waves-effect waves-light right mr-4" type="submit"> {{__('contact.reply')}}
                                        <i class="material-icons right">send </i>
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
