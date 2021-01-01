@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">
                        @if($page_type == 'about')
                            About
                        @elseif($page_type == 'privacy_policy')
                            Privacy Policy
                        @elseif($page_type == 'terms_and_conditions')
                            Terms & Conditions
                        @endif
                    </h4>
                    <form method="post" action="{{ route('admin.save_page') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{$page_type}}">
                        <div class="row">
                            @foreach(Config::get('app.locales') as $key => $value)
                                <div class="input-field col m6 s12">
                                    <label for="title-{{$key}}">Title {{__('site.'.$key)}}</label>
                                    <input id="title-{{$key}}" type="text" name="title[{{$key}}]" 
                                    value="{{ $page->getTranslation('title', $key) }}">
                                </div>
                            @endforeach
                        </div>
                        @foreach(Config::get('app.locales') as $key => $key)
                        <div class="row">
                            <label class="col m12 s12" for="description-{{$key}}">Description {{__('site.'.$key)}}</label>
                            <div class="input-field col m12 s12">
                                <textarea class="materialize-textarea description" id="description-{{$key}}" name="description[{{$key}}]">
                                    {!! $page->getTranslation('description', $key) !!}
                                </textarea>
                            </div>
                        </div>
                        @endforeach
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