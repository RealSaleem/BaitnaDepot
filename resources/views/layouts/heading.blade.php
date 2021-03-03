<div id="breadcrumbs-wrapper"  data-image="{{asset('app-assets/images/gallery/check.png')}}">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">
                    <span>
                       <div class="card-title">
                          @yield('heading')
                       </div>
                    </span>
                </h5>
            </div>
            <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">

                    <div class="card-title right">
                        @if(Auth::guard('admin')->check())
                            <b class="left LogAs" style="font-size: 13px;">Login as</b> |&nbsp; <span class="badge green  ">A</span><b class="right"> {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</b>

                        @endif
                        @if(!Auth::guard('admin')->check())
                        <b class="left LogAs" style="font-size: 13px;">Login as</b>|&nbsp; <span class="badge blue  ">V</span> <b class="right">{{  \Illuminate\Support\Facades\Auth::user()->vendor->name_en}}</b>
                        @endif
                    </div>
                </h5>
            </div>
        </div>
    </div>
</div>
