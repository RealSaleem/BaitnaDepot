@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('ads.edit_banner') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="post" action="{{ route('admin.advertisements.update', $advertisement->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$advertisement->id}}">
                        <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $advertisement->image }}" />
                        <input type="hidden" name="id" id="id" value="{{ $advertisement->id }}" />
                        @include('admin.advertisement_banners.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
