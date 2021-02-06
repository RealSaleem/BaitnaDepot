@section('styles')
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/css/pages/form-select2.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('app-assets/vendors/tags-input/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/dropzone/dropzone.min.css')}}">
@endsection
@php
    $product_images = '';
    if(isset($product))
    {
        $product_images = $product->images;
    }
@endphp
<div class="row">
    <div class="input-field col m6 s6 h-100">
        <input id="name_en" type="text" name="name_en" value="{{ old('name_en', isset($product) ? $product->name_en : null) }}" form="product_form">
        <label for="name_en">{{ __('site.name') }} ({{__('site.en')}})</label>

        @if($errors->has('name_en'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('name_en') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m6 s6 h-100">
        <input id="name_ar" type="text" name="name_ar" value="{{ old('name_ar', isset($product) ? $product->name_ar : null) }}" form="product_form">
        <label for="name_ar">{{ __('site.name') }} ({{__('site.ar')}})</label>
        @if($errors->has('name_ar'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('name_ar') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col s12 h-100">
      <textarea name="description_en" id="description_en" class="materialize-textarea" form="product_form">{{ old('description_en', isset($product) ? $product->name_en : null) }}</textarea>

      <label for="description_en">{{ __('site.description') }} ({{__('site.en')}})</label>
        @if($errors->has('description_en'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('description_en') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col s12 h-100">
      <textarea name="description_ar" id="description_ar" class="materialize-textarea" form="product_form">{{ old('description_ar', isset($product) ? $product->name_en : null) }}</textarea>

      <label for="description_ar">{{ __('site.description') }} ({{__('site.ar')}})</label>
        @if($errors->has('description_ar'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('description_ar') }}</div>
            </small>
        @endif
    </div>
    <div class="row input-field col s4 m8 l4 h-100">
        <input type="text" name="price" id="price" value="{{ old('price', isset($product) ? $product->price : null) }}" form="product_form">
        <label for="price">{{__('product.price')}}</label>
        @if($errors->has('price'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('price') }}</div>
            </small>
        @endif
    </div>
        <div class="row input-field col s4 m8 l4 h-100">
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', isset($product) ? $product->quantity : null) }}" form="product_form">
        <label for="quantity">{{__('product.quantity')}}</label>
        @if($errors->has('quantity'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('quantity') }}</div>
            </small>
        @endif
    </div>
    <div class="row input-field col s4 m8 l4 h-100">
        <input type="text" name="delivery_fees" id="delivery_fees" value="{{ old('delivery_fees', isset($product) ? $product->delivery_fees : null) }}" form="product_form">
        <label for="delivery_fees">{{__('product.delivery_fees')}}</label>
    </div>
    <div class="row input-field col s6 m8 l6 h-100">
        <p class="mb-1">{{ __('product.size') }}</p>
        <input type="text" name="size_en" id="size" value="" data-role="tagsinput" form="product_form">
    </div>
    <div class="row input-field col s6 m8 l6 h-100">
        <p class="mb-1">{{__('product.length')}}</p>
        <input type="text" name="length_en" id="length" value="" data-role="tagsinput" form="product_form">
    </div>
    <div class="row input-field col s6 m8 l6 h-100">
        <select name="colors[]" data-placeholder="{{__('product.select_colors')}}" class="select2-icons browser-default" id="multiple-select2-icons" multiple="multiple" form="product_form">
            @foreach($colors as $color)
            <option data-code="{{$color->hex_code}}" value="{{$color->id}}" {{ (collect(old('colors'))->contains($color->id)) ? 'selected' : null }}>{{$color->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row input-field col s6 m8 l6 hide" id="arabic_size_section">
        <p class="mb-1">{{ __('product.size_arabic_translations') }}</p>
        <div id="arabic_size">
        </div>
    </div>
    <div class="row input-field col s6 m8 l6 hide" id="arabic_length_section">
        <p class="mb-1">{{ __('product.length_arabic_translations') }}</p>
        <div id="arabic_length">
        </div>
    </div>
    <div class="input-field col s12 m8 l12">
        <form name="product_images" action="/file-upload" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
            <div class="fallback" required>
                <input name="file" type="file" style="display: none;">
            </div>
        </form>
        <div class="hidden">
            <div id="hidden-images">                                    
            @if(isset($products))
                @foreach($product->images as $image)
                    <input type="hidden" form="product_form" name="images[{{ $loop->index }}][name]" value="{{ $image['name'] }}" />
                    <input type="hidden" form="product_form" name="images[{{ $loop->index }}][path]" value="{{ $image['url'] }}" />
                    <input type="hidden" form="product_form" name="images[{{ $loop->index }}][size]" value="{{ $image['size'] }}" />
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit" form="product_form">{{ __('site.save') }}
            </button>
        </div>
    </div>
</div>
@section('scripts')
<script src="{{asset('app-assets/vendors/tags-input/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>

<!-- arabic input fields JS -->
<script>
    //append input field for arabic when add new size attibute
    $("#size").on('itemAdded', function(event) {
        $("#arabic_size").append(`<div id="size-${event.item}"><div class="row input-field col s4 m8 l4"><input type="text" value="${event.item}" disabled></div><div class="row input-field col s8 m8 l8"><input type="text" name="size_ar[]" value="${event.item}" form="product_form"></div></div>`);

        toggleArabicAttributes();
    });

    //remove arabic input field on delete size attribute tag
    $("#size").on('itemRemoved', function(event) {
        $(`#size-${event.item} div`).remove();
        toggleArabicAttributes();

    });

    //append input field for arabic when add new length attibute
    $("#length").on('itemAdded', function(event) {
        $("#arabic_length").append(`<div id="length-${event.item}"><div class="row input-field col s4 m8 l4"><input type="text" value="${event.item}" disabled></div><div class="row input-field col s8 m8 l8"><input type="text" name="length_ar[]" value="${event.item}" form="product_form"></div></div>`);
        toggleArabicAttributes();

    });

    //remove arabic input field on delete length attribute tag
    $("#length").on('itemRemoved', function(event) {
        $(`#length-${event.item} div`).remove();
        toggleArabicAttributes();

    });

    function toggleArabicAttributes()
    {
        $size = $("#size").tagsinput('items');
        $length = $("#length").tagsinput('items');

        if($size.length > 0){
            $('#arabic_size_section').removeClass('hide');
        } else {
            $('#arabic_size_section').addClass('hide');
        }

        if($length.length > 0){
            $('#arabic_length_section').removeClass('hide');
        } else {
            $('#arabic_length_section').addClass('hide');
        }
    }
</script>

<!-- dropzone JS -->
<script type="text/javascript">
    var image_upload_path   = {!! json_encode(url('/')) !!}+'/image_upload';
    var form_id             = 'product_form';
    var p_images            = JSON.parse('{!! json_encode($product_images) !!}');
    var allow_max_files     = 3;
</script>
<script src="{{asset('app-assets/vendors/dropzone/my-dropzone.js')}}" type="text/javascript"></script>
<script>
    $(".select2-icons").select2({
        dropdownAutoWidth: true,
        width: '100%',
        minimumResultsForSearch: Infinity,
        templateResult: iconFormat,
        templateSelection: iconFormat,
        tags: true,
        escapeMarkup: function (es) { return es; }
    });

     /* Format icon */
    function iconFormat(icon) {
        var originalOption = icon.element;
        if (!icon.id) { return icon.text; }
        // var $icon = "<i class='material-icons'>" + $(icon.element).data('icon') + "</i>" + icon.text;
        var $icon = `<i style="width: 25px;display: inline-block;height: 25px;background-color: ${$(icon.element).data('code')} "></i>` + icon.text;

        return $icon;
    }
</script>
@endsection