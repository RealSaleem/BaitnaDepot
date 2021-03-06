@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('category.create_category') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.categories.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
