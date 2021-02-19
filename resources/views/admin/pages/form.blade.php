@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">
                        @if($page_type == 'about')
                            @section('heading')
                               About
                            @endsection
                        @elseif($page_type == 'privacy_policy')
                            @section('heading')
                                Privacy Policy
                            @endsection
                        @elseif($page_type == 'terms_and_conditions')
                            @section('heading')
                                Terms & Conditions
                            @endsection
                        @endif
                    </h4>
                    <form method="post" action="{{ route('admin.save_page') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{$page_type}}">
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <label for="title-en">{{__('site.title')}} {{__('site.en')}}</label>
                                <input id="title-en" type="text" name="title_en" value="{{ old('title_en', $page->title_en) }}">
                                @if($errors->has('title_en'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('title_en') }}</div>
                                    </small>
                                @endif
                            </div>
                            <div class="input-field col m6 s12">
                                <label for="title-ar">{{__('site.title')}} {{__('site.ar')}}</label>
                                <input id="title-ar" type="text" name="title_ar" value="{{ old('title_ar', $page->title_ar) }}">
                                @if($errors->has('title_ar'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('title_ar') }}</div>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col m12 s12" for="description">{{__('site.description')}} {{__('site.en')}}</label>
                            <div class="input-field col m12 s12">
                                <textarea class="materialize-textarea description" id="description_en" name="description_en">
                                    {!! $page->description_en !!}
                                </textarea>
                                @if($errors->has('description_en'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('description_en') }}</div>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col m12 s12" for="description-ar">{{__('site.description')}} {{__('site.ar')}}</label>
                            <div class="input-field col m12 s12">
                                <textarea class="materialize-textarea description" id="description-ar" name="description_ar">
                                    {!! $page->description_ar !!}
                                </textarea>
                                @if($errors->has('description_ar'))
                                    <small class="errorTxt">
                                        <div class="error mt-1">{{ $errors->first('description_ar') }}</div>
                                    </small>
                                @endif
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
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    {{-- <script>
        var quill = new Quill('#editor', {
            modules: {
                toolbar: '#toolbar'
            },
            theme: 'snow'
        });
    </script> --}}

    <script>
        $(document).ready(function(){
            $('.description').each(function(e){
                CKEDITOR.replace( $(this).attr('id') );
            });
        });
    </script>
@endsection
