@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('category.edit_category') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="post" action="{{ route('admin.categories.update',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $category->image }}" />
                        <input type="hidden" name="id" value="{{ $category->id }}" />
                        @include('admin.categories.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
