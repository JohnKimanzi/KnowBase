<!-- Header -->
<div class="header" >

    <!-- Logo -->
    <div class="header-left bg-info bg-gradient">
        <a href="{{ url('home') }}" class="logo">
            <img src="{{ asset('light-theme/img/logo.png') }}" height="52" width="196" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box ">
        <h1 >{{ config('app.name', 'Techno Brain BPO') }}</h1>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->

        <!-- /Search -->

        <!-- Flag -->

        <!-- /Flag -->

        <!-- Notifications -->

        <!-- /Notifications -->



        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('light-theme/img/profiles/userAvatar.jpg')}}" alt="">
                <span class="status online"></span></span>
                {{--<span >{{Auth::user()->name}}</span>--}}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="">My Profile</a>
                <a class="dropdown-item" href="">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
