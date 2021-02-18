@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection


    <div class="input-field col m12 s12 h-10">
        <input id="title" type="text" name="title" value="{{ old('title', isset($Notification) ? $Notification->title : null) }}">
        <label for="title">{{__('notification.title')}}</label>
        @if($errors->has('title'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('title') }}</div>
            </small>
        @endif
    </div>



        <div class="input-field col m12 s12 h-10">
        <textarea id="textarea2" name="body" class="materialize-textarea" value="{{ old('body', isset($Notification) ? $Notification->body : null) }}"></textarea>
        <label for="body">{{__('notification.body')}}</label>
        @if($errors->has('body'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('body') }}</div>
            </small>
        @endif
    </div>

    <div class="input-field col m12 s12 ">
        <input id="url" type="text" name="url" value="{{ old('url', isset($Notification) ? $Notification->url : null) }}">
        <label for="url">{{__('notification.url')}}</label>
        @if($errors->has('url'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('url') }}</div>
            </small>
        @endif
    </div>


    <div class="input-field col s12 m8 l12">
    <label for="url">{{__('notification.image')}}</label><br><br><br>
        @if(isset($Notification) && $Notification->image != null)
            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{Helper::getImage($Notification->image)}}" data-max-file-size="2M"/>
        @else
            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="" data-max-file-size="2M"/>
        @endif

        @if($errors->has('image'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('image') }}</div>
            </small>
        @endif
    </div>





     <div class="row">
    <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit">{{__('notification.create')}}
            </button>
        </div>

</div>











@section('scripts')
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script>
    var drEvent = $('.dropify').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        $('#hidden_image').val(null);
    });


$('#promo_value').hide();
$('#promo_type').on('change',function(){
   let promo_type = $(this).val();
        if(promo_type == 1)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Percentage");

        }
        if(promo_type==2)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Price");

        }
         if(promo_type==0)
        {
            $('#promo_value').hide();
            $('#promo_value').attr("placeholder", "");

        }

});




</script>
@endsection
