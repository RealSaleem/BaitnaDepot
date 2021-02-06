@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('product.create_product') }}</h4>
                    <form method="post" action="{{ route(Auth::guard('admin')->check() ? 'admin.products.store' : 'products.store') }}" id="product_form">
                        @csrf
                    </form>
                        @include('products.forms.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection