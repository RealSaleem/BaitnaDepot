@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        Edit Promo Code
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
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
        </div>
    </div>
</div>
@endsection
