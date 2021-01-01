<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            <div class="nav-wrapper">
                
                <ul class="navbar-list right">
                    <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li>
                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">1</small></i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{ asset('app-assets/images/avatar/avatar-7.png') }}" alt="avatar"><i></i></span></a></li>
                </ul>
                <!-- translation-button-->
                <ul class="dropdown-content" id="translation-dropdown">
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="{{ url('lang/en') }}"><i class="flag-icon flag-icon-gb"></i> English </a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="{{ url('lang/ar') }}"><i class="flag-icon flag-icon-fr"></i> Arabic</a></li>
                </ul>
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">1</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                    </li>
                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li class="divider"></li>
                    <li><a class="grey-text text-darken-1" href="{{route('admin.change_password')}}"><i class="material-icons">lock_outline</i> {{__('site.change_password')}}</a></li>
                    <li>
                        <a class="grey-text text-darken-1" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();
                        ">
                            <i class="material-icons">keyboard_tab</i> {{ __('auth.logout') }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</header>