@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="input-field col m6 s6 h-100">
        <input id="title_en" type="text" name="title_en" value="{{ old('title_en', isset($advertisement) ? $advertisement->title_en : null) }}">
        <label for="title_en">{{ __('site.title') }} ({{__('site.en')}})</label>

        @if($errors->has('title_en'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('title_en') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m6 s6 h-100">
        <input id="title_ar" type="text" name="title_ar" value="{{ old('title_ar', isset($advertisement) ? $advertisement->title_ar : null) }}">
        <label for="title_ar">{{ __('site.title') }} ({{__('site.ar')}})</label>
        @if($errors->has('title_ar'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('title_ar') }}</div>
            </small>
        @endif
    </div>
    <div class="row input-field col s4 m8 l4 h-100">
        <input type="number" name="sort" id="sort" value="{{ old('sort', isset($advertisement) ? $advertisement->sort : null) }}">
        <label for="sort">{{__('ads.sort_order')}}</label>
    </div>

    <div class="input-field col s12 m8 l12">
        @if(isset($advertisement) && $advertisement->image != null)
            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{$advertisement->image}}" data-max-file-size="2M"/>
        @else
            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="" data-max-file-size="2M"/>
        @endif

        @if($errors->has('image'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('image') }}</div>
            </small>
        @endif
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
@section('scripts')
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script>
    var drEvent = $('.dropify').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        $('#hidden_image').val(null);
    });
</script>
@endsection
