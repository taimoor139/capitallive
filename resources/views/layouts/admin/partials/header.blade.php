<?php

    $notifications = \App\Models\Notification::query()->where('type', '!=', 1)->where('status', 1)->count();

?>
<nav class="navbar-wrapper  navbar navbar-expand-lg">
    <form class="navbar-search" onsubmit="return false;">
        <button type="submit" class="navbar-search__btn">
            <i class="las la-search"></i>
        </button>
        <input type="search" name="navbar-search__field" id="navbar-search__field" placeholder="Search...">
        <button type="button" class="navbar-search__close"><i class="fa fa-times"></i></button>

        <div id="navbar_search_result_area">
            <ul class="navbar_search_result"></ul>
        </div>
    </form>

    <div class="navbar__left">
        <button class="res-sidebar-open-btn"><i class="fa fa-bars"></i></button>
    </div>

    <div class="navbar__right">
        <ul class="navbar__action-list">
            <li>

                    <a href="{{ route('admin-notifications') }}">
                        <i class="fa fa-bell"></i>
                        @if($notifications)

                            <span style="
                                    position: relative;
                                    top: -7px;
                                    right: 4px;
                                    padding: 0px 4px;
                                    border-radius: 100%;
                                    background: red;
                                    color: white;
                                "> {{ $notifications }}</span>
                        @endif
                    </a>
            </li>
            <li class="dropdown">
                <button type="button" class="" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                    <span class="navbar-user">
                        <span class="navbar-user__thumb">
                            @if(Auth::user()->image)
                                <img
                                        class="round"
                                        src="{{url('/uploads/profile_pictures/'.Auth::user()->image)}}"
                                        alt="avatar" height="40" width="40">
                            @else
                                <img
                                        class="round"
                                        src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', Auth::user()->name) }}&amp;color=7F9CF5&amp;background=EBF4FF"
                                        alt="avatar" height="40" width="40">
                            @endif
                        </span>

                        <span class="navbar-user__info">
                        <span class="navbar-user__name">{{ Auth::user()->name }}</span>
                        </span>
                        <span class="icon"><i class="fa fa-chevron-circle-down"></i></span>
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a href="{{ route('view-profile') }}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon fa fa-user-circle"></i>
                        <span class="dropdown-menu__caption">Profile</span>
                    </a>

                    <a href="{{ route('updateAdminPassword') }}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon fa fa-key"></i>
                        <span class="dropdown-menu__caption">Password</span>
                    </a>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon fa fa-sign-in-alt"></i>
                        <span class="dropdown-menu__caption">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
