    @section('styles')
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/form-select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
    <style>
        .h-100 {
            height: 100px;
        }
    </style>
    @endsection
    <div class="row">
        <div class="input-field col m6 s6 h-100">
            <label for="name-en">{{ __('vendor.name_en') }}</label>
            <input id="name-en" type="text" name="name_en" value="{{old('name_en', isset($vendor) ? $vendor->name_en : null)}}">
            @if($errors->has('name_en'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('name_en') }}</div>
                </small>
            @endif
        </div>
        <div class="input-field col m6 s6 h-100">
            <label for="name-ar">{{ __('vendor.name_ar') }}</label>
            <input id="name-ar" type="text" name="name_ar" value="{{old('name_ar', isset($vendor) ? $vendor->name_ar : null)}}">
            @if($errors->has('name_ar'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('name_ar') }}</div>
                </small>
            @endif
        </div>
        <div class="input-field col m4 s12 h-100">
            <label for="email">{{__('vendor.email')}}</label>
            <input id="email" type="email" name="email" value="{{old('email', isset($vendor) ? $vendor->user->email : null)}}">
            @if($errors->has('email'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('email') }}</div>
                </small>
            @endif
        </div>
        @if(!isset($vendor))
        <div class="input-field col m4 s12 h-100">
            <label for="password">{{__('vendor.password')}}</label>
            <input id="password" type="password" name="password" value="{{old('password')}}">
            @if($errors->has('password'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('password') }}</div>
                </small>
            @endif
        </div>
        <div class="input-field col m4 s12 h-100">
            <label for="password_confirmation">{{__('vendor.confirm_password')}}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
            @if($errors->has('confirm_password'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                </small>
            @endif
        </div>
        @endif
        <div class="input-field col m4 s12 h-100">
            <label for="mobile">{{__('vendor.phone_number')}}</label>
            <input id="mobile" type="text" name="mobile" value="{{old('mobile', isset($vendor) ? $vendor->user->mobile : null)}}">
            @if($errors->has('mobile'))
                <small class="errorTxt">
                    <div class="error">{{ $errors->first('mobile') }}</div>
                </small>
            @endif
        </div>
        <div class="input-field col m4 s12 h-100">
            <label for="services" style="display: contents;">{{__('vendor.services')}}</label>
            <select name="services[]" id="cat_type" class="select2 browser-default" multiple="multiple" required="">
                @php
                    $all_services = Helper::getAllServices();
                    if(isset($vendor)){
                        $selected_services = json_decode($vendor->services); 
                    } else {
                        $selected_services = [];
                    }
                @endphp
                @foreach($all_services as $key => $service)
                <option value="{{$key}}" {{ in_array($key, $selected_services) ? "selected" : null }}>{{Helper::getServiceName($key)}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col m4 s12 h-100">
            <label for="categories" style="display: contents;">{{__('vendor.categories')}}</label>
            <select name="categories[]" id="categories" class="select2 browser-default" multiple="multiple">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->getLocaleName()}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s12 m8 l12">
            <label for="categories" style="display: contents;">{{__('vendor.store_logo')}}</label>
            @if(isset($vendor) && $vendor->logo != null)
                <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{asset('storage/'. $vendor->logo)}}" data-max-file-size="2M"/>
            @else
                <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="" data-max-file-size="2M"/>
            @endif

            @if($errors->has('logo'))
                <small class="errorTxt">
                    <div class="error mt-1">{{ $errors->first('logo') }}</div>
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
<script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script>
    $(function () {
        $(".select2").select2({
            /* the following code is used to disable x-scrollbar when click in select input and
            take 100% width in responsive also */
            dropdownAutoWidth: true,
            width: '100%'
        });
    });
</script>

<script>
    var drEvent = $('.dropify').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        $('#hidden_logo').val(null);
    });
</script>
@endsection