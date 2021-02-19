@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('product.edit_product') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
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
