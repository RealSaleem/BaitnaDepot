<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">

    <div class="brand-sidebar vandor">
        <h1 class="logo-wrapper">
            <a class="brand-logo center" href="{{route('dashboard')}}"  style="padding-top: 5px !important; padding-right: 16px !important;">
                @if(Auth::guard('admin')->check())
                <img class="hide-on-med-and-down pb-2 mt-1" src="{{ asset('app-assets/images/logo/baitna.png') }}"  alt="materialize logo" />
                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('app-assets/images/logo/baitna2.png') }}"    alt="materialize logo" />
                @endif
                @if(!Auth::guard('admin')->check())
                     <img class="vendor-img hide-on-med-and-down" src="{{ '/storage/'.\Illuminate\Support\Facades\Auth::user()->vendor->logo}}"  alt="materialize logo" />
                        <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ '/storage/'.\Illuminate\Support\Facades\Auth::user()->vendor->logo}}"    alt="materialize logo" />
                @endif

            </a>
            <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('products.index')}}"><i class="material-icons">business</i><span class="menu-title" data-i18n="Support">{{__('product.main')}}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('contractor_working_hours')}}"><i class="material-icons">access_time</i><span class="menu-title" data-i18n="Support">{{__('working_hours.main')}}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('social_links')}}"><i class="material-icons">group_work</i><span class="menu-title">{{ __('setting.social_media') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('promotevendor_V')}}"><i class="material-icons">Promote</i><span class="menu-title">{{ __('Promote Me') }}</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
