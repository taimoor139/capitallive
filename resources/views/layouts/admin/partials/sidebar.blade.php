<style>
    .sidebar__inner {
        height: 100%;
        overflow-y: scroll; /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .sidebar__inner::-webkit-scrollbar {
        display: none;
    }

</style>
<div class="sidebar capsule--rounded bg_img overlay--dark overlay--opacity-8 open" data-background="../../../img/2.jpg" style="background-image: url(&quot;../../../img/2.jpg&quot;); top: 3.6pc; position: absolute;">
    <div class="sidebar__inner">

        <button class="res-sidebar-close-btn"><i class="fa fa-times"></i></button>
        <div class="sidebar__inner">
            <div class="sidebar__logo">
                <a href="{{ route('admin.dashboard') }}" class="sidebar__main-logo"><img src="/login.png" alt="image"></a>
                <button type="button" class="navbar__expand"></button>
            </div>
            @php

                $roles = Auth::user()->assignRoles->pluck('role_id')->toArray();
            @endphp

            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 86.75px);"><div class="sidebar__menu-wrapper" id="sidebar__menuWrapper" style="overflow: hidden; width: auto; height: calc(100vh - 86.75px);">
                    <ul class="sidebar__menu">
                        <li class="sidebar-menu-item active">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                                <i class="menu-icon fa fa-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(1, $roles)))

                            <li class="sidebar-menu-item sidebar-dropdown">
                                <a href="javascript:void(0)" class="">
                                    <i class="menu-icon fa fa-users"></i>
                                    <span class="menu-title">Users</span>

                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('all-users') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">All Users</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('active-users') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Active Users</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('banned-users') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Banned Users</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('unverified-users') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Email Unverified</span>

                                            </a>
                                        </li>


                                        <li class="sidebar-menu-item ">
                                            <a href="{{ route('send-email-view') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Send Email</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        @endif

                        @if(Auth::user()->role_id == 1 )
                            <li class="sidebar-menu-item sidebar-dropdown">
                                <a href="javascript:void(0)" class="">
                                    <i class="menu-icon fa fa-user-circle"></i>
                                    <span class="menu-title">Sub-Admin</span>

                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('subadmins') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">All Sub-Admins</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('create-subadmin') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Create Sub-Admin</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(2, $roles)))
                            <li class="sidebar-menu-item sidebar-dropdown">
                                <a href="javascript:void(0)" class="">
                                    <i class="menu-icon fa fa-credit-card"></i>
                                    <span class="menu-title">Deposits</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('pending-deposits') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Pending Deposits</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('approved-deposits') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Approved Deposits</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('successful-deposits') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Successful Deposits</span>
                                            </a>
                                        </li>


                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('rejected-deposits') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Rejected Deposits</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('deposits') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">All Deposits</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('deposit-limit') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Deposit Limit</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('manual-deposit') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Manual Deposit</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(3, $roles)))
                            <li class="sidebar-menu-item sidebar-dropdown">
                                <a href="javascript:void(0)" class="">
                                    <i class="menu-icon fa fa-university"></i>
                                    <span class="menu-title">Withdrawals </span>
                                    </span>
                                </a>
                                <div class="sidebar-submenu  ">
                                    <ul>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('all-withdrawals') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Withdrawals Log</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('pending-withdrawals') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Pending Log</span>

                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('approved-withdrawals') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Approved Log</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('rejected-withdrawals') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Rejected Log</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('withdrawal-limit') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Withdraw Limit</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(4, $roles)))
                            <li class="sidebar-menu-item sidebar-dropdown">
                                <a href="javascript:void(0)" class="">
                                    <i class="menu-icon fa fa-ticket"></i>
                                    <span class="menu-title">Support Ticket </span>
                                    </span>
                                </a>
                                <div class="sidebar-submenu  ">
                                    <ul>

                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('all-tickets') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">All Ticket</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('pending-tickets') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Pending Ticket</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item  ">
                                            <a href="{{ route('closed-tickets') }}" class="nav-link">
                                                <i class="menu-icon fa fa-dot-circle"></i>
                                                <span class="menu-title">Closed Ticket</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(5, $roles)))
                            <li class="sidebar-menu-item">
                                <a href="{{ route('earning-charts') }}" class="">
                                    <i class="menu-icon fa fa-chart-area"></i>
                                    <span class="menu-title">Earning Charts </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(6, $roles)))
                            <li class="sidebar-menu-item">
                                <a href="{{ route('notifications') }}" class="">
                                    <i class="menu-icon fa fa-bell"></i>
                                    <span class="menu-title">Notifications</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(7, $roles)))
                            <li class="sidebar-menu-item">
                                <a href="{{ route('articles') }}" class="">
                                    <i class="menu-icon fa fa-book"></i>
                                    <span class="menu-title">Education</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(8, $roles)))
                            <li class="sidebar-menu-item">
                                <a href="{{ route('documents') }}" class="">
                                    <i class="menu-icon fa fa-book"></i>
                                    <span class="menu-title">Documents</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 229.385px;"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
            </div>
        </div>
    </div>
</div>
