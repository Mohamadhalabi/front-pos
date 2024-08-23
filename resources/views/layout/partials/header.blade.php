<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ url('index') }}" class="logo logo-normal">
            <img src="{{ URL::asset('/build/img/logo.png') }}" alt="">
        </a>
        <a href="{{ url('index') }}" class="logo logo-white">
            <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ url('index') }}" class="logo-small">
            <img src="{{ URL::asset('/build/img/logo-small.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu" style="justify-content:end">
        <!-- /Select Store -->
        <!-- Flag -->
        <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">

        @if(app()->getLocale() != 'ar')
        <img src="{{ URL::asset('/build/img/flags/us.png') }}" alt="Language" class="img-fluid">
        @else
        <img src="{{ URL::asset('/build/img/flags/sa.png') }}" alt="Language" class="img-fluid">
        @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                <img src="{{ URL::asset('/build/img/flags/us.png') }}" alt="" height="16"> English
                </a>
                <a href="{{ route('lang.switch', 'ar') }}" class="dropdown-item {{ app()->getLocale() == 'ar' ? 'active' : '' }}">
                    <img src="{{ URL::asset('/build/img/flags/sa.png') }}" alt="" height="16"> Arabic
                </a>

            </div>
        </li>

        <!-- /Flag -->

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>

                <li class="nav-item dropdown has-arrow main-drop">
            @if(session('user'))
                <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-info">
                        <span class="user-detail">
                            <span class="user-name">{{ session('user.name') }}</span>
                        </span>
                    </span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilename">
                        <div class="profileset">
                            <div class="profilesets">
                                <h6>{{ session('user.name') }}</h6>
                            </div>
                        </div>
                        <hr class="m-0">
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="me-2" data-feather="user"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="{{ url('general-settings') }}">
                            <i class="me-2" data-feather="settings"></i> Settings
                        </a>
                        <hr class="m-0">
                        <a class="dropdown-item logout pb-0" href="{{ route('logout') }}">
                        <img src="{{ URL::asset('/build/img/icons/log-out.svg') }}" class="me-2" alt="img"> Logout
                        </a>
                    </div>
                </div>
            @else
                <div class="nav-link">
                    <a href="{{ url('login') }}" class="me-2">Login</a>
                    <a href="{{ url('register') }}">Register</a>
                </div>
            @endif
        </li>

    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ url('general-settings') }}">Settings</a>
            <a class="dropdown-item" href="{{ url('signin') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
