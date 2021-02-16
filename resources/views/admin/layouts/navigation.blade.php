<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ route('admin.dashboard') }}">
                <img class="hide-on-med-and-down " src="{{ asset('app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo" />
                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo" />
                <span class="logo-text hide-on-med-and-down">{{ __('site.admin') }}</span>
            </a>
            <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.advertisements.index')}}"><i class="material-icons">aspect_ratio</i><span class="menu-title">{{ __('site.advertisements') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.categories.index')}}"><i class="material-icons">pages</i><span class="menu-title">{{ __('site.categories') }}</span></a>
        </li>
        {{--<li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.heavy_trucks.index')}}"><i class="material-icons">local_shipping</i><span class="menu-title">{{ __('truck.main') }}</span></a>
        </li>--}}
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.products.index')}}"><i class="material-icons">business
</i><span class="menu-title">{{ __('product.main') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.vendors.index')}}"><i class="material-icons">group_work</i><span class="menu-title">{{ __('vendor.main') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.users.index')}}"><i class="material-icons">person</i><span class="menu-title">{{ __('user.main') }}</span></a>
        </li>
        <li class="{{ str_contains(Request::url(), 'edit_page') ? 'active' : null }} bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">pages</i><span class="menu-title">{{ __('site.pages') }}</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="active"><a href="{{ route('admin.edit_page','about') }}"><i class="material-icons">radio_button_unchecked</i>{{ __('site.about_us') }}</a>
                    </li>
                    <li class="active"><a href="{{ route('admin.edit_page','terms_and_conditions') }}"><i class="material-icons">radio_button_unchecked</i>{{ __('site.terms_and_conditions') }}</a>
                    </li>
                    <li class="active"><a href="{{ route('admin.edit_page','privacy_policy') }}"><i class="material-icons">radio_button_unchecked</i>{{ __('site.privacy_policy') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.vendor_requests')}}"><i class="material-icons">group_work</i><span class="menu-title">{{ __('vendor.vendor_requests') }}</span></a>
        </li>
        
        <li class="{{ str_contains(Request::url(), 'edit_page') ? 'active' : null }} bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">pages</i><span class="menu-title">{{ __('contact.main') }}</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.contact_us_messages')}}"><i class="material-icons">radio_button_unchecked</i><span class="menu-title">{{ __('contact.msg') }}</span></a>
                    </li>
                    <li class="active"><a href="{{ route('admin.ContactUsDetails.index') }}"><i class="material-icons">radio_button_unchecked</i>{{ __('contact.update') }}</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.PromoteVendorAdmin')}}"><i class="Large material-icons ">show_chart</i><span class="menu-title">{{ __('vendor.PromoteReq') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.promo_code.index')}}"><i class="material-icons">publish</i><span class="menu-title">{{ __('vendor.Promo_code') }}</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="{{route('admin.notification.index')}}"><i class="material-icons">notifications_none</i><span class="menu-title">{{ __('notification.notification') }}</span></a>
        </li>

    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>