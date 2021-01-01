@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    @foreach(Config::get('app.locales') as $key => $value)
	    <div class="input-field col m6 s6">
	        <label for="name-{{$key}}">{{ __('category.name_'.$key) }}</label>
	        <input id="name-{{$key}}" type="text" name="name[{{$key}}]" value="{{ old('name.'.$key, isset($category) ? $category->getTranslation('name',$key) : null) }}">
	    </div>
    @endforeach
    <div class="input-field col m4 s12">
        @if(isset($category))
        <select name="parent_id">
        	<option value="">{{ __('category.parent_category') }}</option>
        	@foreach($categories as $catRow)
        		@if((isset($category) && $catRow->parent_id == null) )
	        		@if($catRow->id != $category->id)
	        			<option value="{{$catRow->id}}" @if(isset($category)) {{ $category->parent_id == $catRow->id ? 'selected' : null}} @endif>{{$catRow->name}}</option>
        			@endif
        		@endif
        	@endforeach
        </select>
        @else
        <select name="parent_id">
            <option value="">{{ __('category.parent_category') }}</option>
            @foreach($categories as $catRow)
                @if($catRow->parent_id == null)
                    <option value="{{$catRow->id}}" @if(isset($category)) {{ $category->parent_id == $catRow->id ? 'selected' : null}} @endif>{{$catRow->name}}</option>
                @endif
            @endforeach
        </select>
        @endif
    </div>
    <div class="input-field col m4 s12">
        <select name="type" id="cat_type">
        	<option value="">{{ __('category.type') }}</option>
        	<option value="1" @if(isset($category)) {{ $category->getRawOriginal('type') == 1 ? 'selected' : null}} @endif>{{ __('site.ecommerce') }}</option>
        	<option value="2" @if(isset($category)) {{ $category->getRawOriginal('type') == 2 ? 'selected' : null}} @endif>{{ __('site.contractors') }}</option>
        	<option value="3" @if(isset($category)) {{ $category->getRawOriginal('type') == 3 ? 'selected' : null}} @endif>{{ __('site.heavy_trucks') }}</option>
        </select>

        @if($errors->has('type'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('type') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m4 s12 @if(isset($category)) {{ $category->getRawOriginal('type') != 1 ? 'hide' : null}} @endif" id="delivery_fees_div">
        <label for="delivery_fees">{{__('category.delivery_fees')}}</label>
        <input id="delivery_fees" type="number" name="delivery_fees" value="{{ old('delivery_fees', isset($category) ? $category->delivery_fees : null) }}">
    </div>
    <div class="input-field col m4 s12">
        <label for="sort">{{ __('category.sort_order') }}</label>
        <input id="sort" type="number" name="sort" value="{{ old('sort', isset($category) ? $category->sort : null) }}">
    </div>
    <!--Default version-->
    <div class="input-field col s12 m8 l12">
        @if(isset($category))
            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{$category->image}}" data-max-file-size="2M"/>
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
    <div class="input-field col s12">
        <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.save') }}
        </button>
    </div>
</div>
@section('scripts')
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>
<script>
    $('#cat_type').change(function(){
        var type = $(this).val();
        if(type == 1){
            $('#delivery_fees_div').removeClass('hide');
        } else {
            $('#delivery_fees_div').addClass('hide');
        }
    });
</script>
@endsection