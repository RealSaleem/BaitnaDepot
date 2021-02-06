@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('product.edit_product') }}</h4>
                    <form method="post" action="{{ route(Auth::guard('admin')->check() ? 'admin.products.update' : 'products.update',$product->id) }}" id="product_form">
                        @csrf
                        {{ method_field('PUT') }}
                    </form>
                        @include('products.forms.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection