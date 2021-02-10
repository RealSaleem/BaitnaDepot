<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{route('dashboard')}}"><img class="hide-on-med-and-down " src="{{ asset('app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo" /><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo" /><span class="logo-text hide-on-med-and-down">{{ Auth::user()->name }}</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
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