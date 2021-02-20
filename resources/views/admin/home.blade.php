@extends('layouts.app')

@section('content')
<div class="container">
    @section('heading')
        {{ __('Welcome to Admin Dashboard') }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{-------------------Dashboard Start---------------------}}
<div class="row" id="dashboard_card">
    <a href="{{route('admin.categories.index')}}">
        <div class="col s12 m6 l6 ">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">pages</i>
                            <p>Category</p>
                        </div>
                        <div class="col s5 m5 right-align">

                            <h2 class="mb-0 white-text"> {{count($category)}}  </h2>
                            <p class="no-margin">Total</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="{{route('admin.products.index')}}">
        <div class="col s12 m6 l6 ">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">business</i>
                            <p>Products</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h2 class="mb-0 white-text">{{count($products)}}</h2>
                            <p class="no-margin">Total </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="{{route('admin.vendors.index')}}">
        <div class="col s12 m6 l6 ">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">group_work</i>
                            <p>Vendors</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h2 class="mb-0 white-text">{{count($vendor)}}</h2>
                            <p class="no-margin">Total </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a href="{{route('admin.vendor_requests')}}">
        <div class="col s12 m6 l6 ">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">show_chart</i>
                            <p>Vendor Requests</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h2 class="mb-0 white-text">{{count($vendor_req)}}</h2>
                            <p class="no-margin">Un-Approve</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </a>

    </div>



                </div>
            </div>
        </div>
    </div>
</div>



@endsection
