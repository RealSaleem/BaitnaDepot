@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection




 <br>
<label>
<input type="checkbox" id="AutoCheck" />
<span>Automatic Promo Code</span>
</label>
<br>
<br>
<div class="row">


<div class="input-field col m4 s4 h-10">
        <input id="code_name" type="text" name="code_name" value="{{ old('body', isset($promo_code) ? $promo_code->name : null) }}">
        <label for="code_name" id="code_label">Promo Code:</label>
        @if($errors->has('code_name'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('code_name') }}</div>
            </small>
        @endif
    </div>
     <div class="input-field col m4 s4 h-10">
        <input id="valid_from" type="date" name="valid_from" value="{{ old('body', isset($promo_code) ? $promo_code->valid_from : null) }}">
        <label for="promo_code_name">Valid From :</label>
        @if($errors->has('valid_from'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('valid_from') }}</div>
            </small>
        @endif
    </div>
    <div class="input-field col m4 s4 h-10">
        <input id="valid_till" type="date" name="valid_till"  value="{{ old('body', isset($promo_code) ? $promo_code->valid_til : null) }}">
        <label for="promo_code_name">Valid Till :</label>
        @if($errors->has('valid_till'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('valid_till') }}</div>
            </small>
        @endif
    </div>

</div>
<div class="row">
    <div class="input-field col m4 s4 h-10">
        <input id="num_of_user" type="number" name="num_of_user" value="{{ old('body', isset($promo_code) ? $promo_code->num_of_user : null) }}">
        <label for="num_of_user">No Of Users who Can Use This Code :</label>
        @if($errors->has('num_of_user'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('num_of_user') }}</div>
            </small>
        @endif
    </div>

    <div class="input-field col m4 s4 h-10">
       <select id="promo_type" name="promo_type">

       <option value="{{ old('body', isset($promo_code) ? $promo_code->type : null) }}"  >{{ old('body', isset($promo_code) ? $promo_code->type : null) }} </option>


           <option value="0" >Percentage  </option>
           <option value="1">Price  </option>
       </select>
       <label for="promo_code_name">Promo Type :</label>
        @if($errors->has('promo_type'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('promo_type') }}</div>
            </small>
        @endif
    </div>

     <div class="input-field col m4 s4 h-10">
        <input id="promo_value" type="number" name="promo_value" placeholder="" value="">

        @if($errors->has('valid_from'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('valid_from') }}</div>
            </small>
        @endif
    </div>









<!-- <div class="row">
    <div class="row">
        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right pl-4 pr-4 mr-4" type="submit">{{ __('site.save') }}
            </button>
        </div>
    </div>
</div> -->




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
        if(promo_type == 0)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Percentage");
            $('#promo_value').val(+"%");

        }
        if(promo_type==1)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Price");

        }
         if(promo_type==2)
        {
            $('#promo_value').hide();
            $('#promo_value').attr("placeholder", "");

        }

});

  $(document).ready(function(){

    $('#AutoCheck').change(function(){
        var dt = new Date();
        var CodeString ="BD-";
        var code = dt.getDate() + "" +dt.getMinutes()+ "" +dt.getSeconds();
        var PromoCode = CodeString + code;
    if(this.checked)
    {

        $('#code_label').hide();
        $('#code_name').css('text-align','center');
        $('#code_name').css('font-size','25px');
        $('#code_name').val(PromoCode);
    }
    else
    {
        $( "#code_name" ).prop( "disabled", false );
        $('#code_label').show();
        $('#code_name').val("");
    }







});


  });










</script>
@endsection
