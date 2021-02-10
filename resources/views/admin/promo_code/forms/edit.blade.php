@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('ads.edit_banner') }}</h4>
                    <form method="post" action="{{ route('admin.promo_code.update', $promo_code->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$promo_code->id}}">
                        @include('admin.promo_code.forms.form')


                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right pl-4 pr-4 mr-4" type="submit">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="container col s8 m8 l8 ml-4" >
    <table class=" ml-4 col s10 m10 l10 ">
        <tbody>
            <tr>
                <th style="width: 250px;" > ID :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->id : null) }}</td>
            </tr>
            <tr>
                <th style="width: 250px;"> NAME :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->name : null) }}</td>
            </tr>
            <tr>
                <th style="width: 250px;"> From :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->valid_from : null) }}</td>
            </tr>
            <tr>
                <th style="width: 250px;"> Till :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->valid_til : null) }}</td>
            </tr>
            <tr>
                <th style="width: 250px;"> NUM OF USER :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->num_of_user : null) }}</td>
            </tr>
            <tr>
                <th style="width: 250px;"> TYPE :</th>
                <td >{{ old('body', isset($promo_code) ? $promo_code->type : null) }}</td>
            </tr>
            <tr  >
                <th style="width: 250px;"> VALUE :</th>
                <td>{{ old('body', isset($promo_code) ? $promo_code->value : null) }}</td>
            </tr>
        </tbody>

    </table>
</div>



        </div>
    </div>
</div>
@endsection