@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">Dashboard</h6>
                </div>
                {{--<div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">--}}
                {{--<a href="javascript:void(0)" class="btn         btn--success  "><i class="fa fa-fw fa-clock"></i>Last Cron Run : 1 second ago</a>--}}
                {{--</div>--}}
            </div>

            @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(1, $roles)))
                <div class="row mb-none-30">
                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">{{ $users }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Total Users</span>
                                </div>
                                <a href="{{ route('all-users') }}"
                                   class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--1 b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-credit-card-alt"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="currency-sign">$</span>
                                    <span class="amount">{{ $usersBalance }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Users Balance</span>
                                </div>
                                <a href="{{ route('all-users') }}"
                                   class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">{{ $verifiedUsers }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Total Verified Users</span>
                                </div>
                                <a href="{{ route('all-users') }}"
                                   class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--red b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-ban"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">{{ $bannedUsers }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Banned Users</span>
                                </div>
                                <a href="{{ route('banned-users') }}"
                                   class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--indigo b-radius--10 box-shadow ">--}}
                    {{--<div class="icon">--}}
                    {{--<i class="la la-envelope"></i>--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                    {{--<span class="amount">101</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                    {{--<span class="text--small">Total Email Verified</span>--}}
                    {{--</div>--}}
                    {{--<a href="https://script.viserlab.com/bisurv/admin/users/email-verified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--danger b-radius--10 box-shadow">--}}
                    {{--<div class="icon">--}}
                    {{--<i class="fa fa-envelope"></i>--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                    {{--<span class="amount">0</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                    {{--<span class="text--small">Total Email Unverified</span>--}}
                    {{--</div>--}}
                    {{--<a href="https://script.viserlab.com/bisurv/admin/users/email-unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--primary b-radius--10 box-shadow ">--}}
                    {{--<div class="icon">--}}
                    {{--<i class="fa fa-phone"></i>--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                    {{--<span class="amount">101</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                    {{--<span class="text--small">Total SMS Verified</span>--}}
                    {{--</div>--}}
                    {{--<a href="https://script.viserlab.com/bisurv/admin/users/sms-verified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--pink b-radius--10 box-shadow">--}}
                    {{--<div class="icon">--}}
                    {{--<i class="fa fa-window-close"></i>--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                    {{--<span class="amount">0</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                    {{--<span class="text--small">Total SMS Unverified</span>--}}
                    {{--</div>--}}
                    {{--<a href="https://script.viserlab.com/bisurv/admin/users/sms-unverified" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(2, $roles)))
                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--cyan b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="currency-sign">$</span>
                                    <span class="amount">{{ $totalInvestment }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Total Invest</span>
                                </div>
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/invest"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--info b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="currency-sign">$</span>
                                    <span class="amount">{{ $last7DaysInvestment }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Last 7 Days Invest</span>
                                </div>
                                {{--<a href="#0" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View--}}
                                    {{--All</a>--}}
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--3 b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-hand-holding-usd"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="currency-sign">$</span>
                                    <span class="amount">{{ $totalReferralBonus }}</span>
                                </div>
                                <div class="desciption">
                                    <span class="text--small">Total Referral Commission</span>
                                </div>
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/referral-commission"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--17 b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-tree"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="currency-sign">$</span>
                                    <span class="amount">0</span>

                                </div>
                                <div class="desciption">
                                    <span class="text--small">Total Binary Commission</span>
                                </div>
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/binary-commission"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            </div>
                        </div>
                    </div>

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                        {{--<div class="dashboard-w1 bg--deep-purple b-radius--10 box-shadow">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="las la-cut"></i>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<div class="numbers">--}}
                                    {{--<span class="amount">0</span>--}}
                                {{--</div>--}}
                                {{--<div class="desciption">--}}
                                    {{--<span class="text--small">Users Total Bv Cut</span>--}}
                                {{--</div>--}}
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=cutBV"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                        {{--<div class="dashboard-w1 bg--15 b-radius--10 box-shadow">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="las la-cart-arrow-down"></i>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<div class="numbers">--}}
                                    {{--<span class="amount">510</span>--}}
                                {{--</div>--}}
                                {{--<div class="desciption">--}}
                                    {{--<span class="text--small">Users Total BV</span>--}}
                                {{--</div>--}}
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=paidBV"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                        {{--<div class="dashboard-w1 bg--10 b-radius--10 box-shadow">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="las la-arrow-alt-circle-left"></i>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<div class="numbers">--}}
                                    {{--<span class="amount">460</span>--}}
                                {{--</div>--}}
                                {{--<div class="desciption">--}}
                                    {{--<span class="text--small">Users Left BV</span>--}}
                                {{--</div>--}}
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=leftBV"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-xl-3 col-lg-4 col-sm-6 mb-30">--}}
                        {{--<div class="dashboard-w1 bg--3 b-radius--10 box-shadow">--}}
                            {{--<div class="icon">--}}
                                {{--<i class="las la-arrow-alt-circle-right"></i>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<div class="numbers">--}}
                                    {{--<span class="amount">50</span>--}}
                                {{--</div>--}}
                                {{--<div class="desciption">--}}
                                    {{--<span class="text--small">Right BV</span>--}}
                                {{--</div>--}}
                                {{--<a href="https://script.viserlab.com/bisurv/admin/report/bv-log?type=rightBV"--}}
                                   {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View All</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            @endif

            @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(2, $roles)))
                <div class="row mt-50 mb-none-30">
                    <div class="col-xl-6 mb-30">
                        <div class="card">
                            <div class="card-body" style="position: relative;">
                                <div class="container-fluid p-5">
                                    <div id="barchart_material" style="width: auto; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="row mb-none-30">
                            <div class="col-lg-6 col-sm-6 mb-30">
                                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                                    <div class="widget-three__icon b-radius--rounded bg--success  box--shadow2">
                                        <i class="fa fa-money-bill "></i>
                                    </div>
                                    <div class="widget-three__content">
                                        <h2 class="numbers">{{ $totalInvestment }} USD</h2>
                                        <p class="text--small">Total Deposit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-30">
                                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                                    <div class="widget-three__icon b-radius--rounded bg--teal box--shadow2">
                                        <i class="fa fa-money-check"></i>
                                    </div>
                                    <div class="widget-three__content">
                                        <h2 class="numbers">0 USD</h2>
                                        <p class="text--small">Total Deposit Charge</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 mb-30">
                                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                                    <div class="widget-three__icon b-radius--rounded bg--warning  box--shadow2">
                                        <i class="fa fa-spinner"></i>
                                    </div>
                                    <div class="widget-three__content">
                                        <h2 class="numbers">{{ $totalPendingDeposit }}</h2>
                                        <p class="text--small">Pending Deposit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-30">
                                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                                    <div class="widget-three__icon b-radius--rounded bg--danger box--shadow2">
                                        <i class="fa fa-ban "></i>
                                    </div>
                                    <div class="widget-three__content">
                                        <h2 class="numbers">{{ $totalRejectDeposit }}</h2>
                                        <p class="text--small">Reject Deposit</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            @endif

            @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(3, $roles)))
                <div class="row mt-50 mb-none-30">


                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-money-bill-wave"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">{{ $totalWithdraw }}</span>
                                    <span class="currency-sign">USD</span>
                                </div>
                                <div class="desciption">
                                    <span>Total Withdraw</span>
                                </div>
                                <a href="{{ route('all-withdrawals') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View
                                    All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--danger b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-money-bill"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">0.0 </span>
                                    <span class="currency-sign">USD</span>
                                </div>
                                <div class="desciption">
                                    <span>Total Withdraw Charge</span>
                                </div>
                                <a href="{{ route('all-withdrawals') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View
                                    All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--warning b-radius--10 box-shadow">
                            <div class="icon">
                                <i class="fa fa-spinner"></i>
                            </div>
                            <div class="details">
                                <div class="numbers">
                                    <span class="amount">{{  $totalPendingWithdraw }}</span>
                                </div>
                                <div class="desciption">
                                    <span>Withdraw Pending</span>
                                </div>

                                <a href="{{ route('pending-withdrawals') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">View
                                    All</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role_id == 1 || (Auth::user()->role_id == 3 && in_array(1, $roles)))
                <div class="row mb-none-30 mt-5">

                    <div class="col-xl-12 mb-30">
                        <div class="card ">
                            <div class="card-header">
                                <h6 class="card-title mb-0">New User list</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive--sm table-responsive">
                                    <table class="table table--light style--two">
                                        <thead>
                                        <tr>
                                            <th scope="col">User</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newUsers as $newUser)
                                            <tr>
                                                <td data-label="User">
                                                    <div class="user">
                                                        <div class="thumb"><img
                                                                    src="https://script.viserlab.com/bisurv/assets/images/avatar.png"
                                                                    alt="image"></div>
                                                        <span class="name">{{ $newUser->name }}</span>
                                                    </div>
                                                </td>
                                                <td data-label="Username"><a
                                                            href="{{ route('view-user', $newUser->id) }}">{{ $newUser->username }}</a>
                                                </td>
                                                <td data-label="Email">{{ $newUser->email }}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table><!-- table end -->
                                </div>
                            </div>
                        </div><!-- card end -->
                    </div>

                    <div class="col-xl-6 mb-30">
                        {{--<div class="card">--}}
                        {{--<div class="card-body" style="position: relative;">--}}
                        {{--<h5 class="card-title">Last 30 days Withdraw History</h5>--}}
                        {{--<div id="withdraw-line" style="min-height: 445px;">--}}
                        {{--<div id="apexcharts9fzkdx4k"--}}
                        {{--class="apexcharts-canvas apexcharts9fzkdx4k apexcharts-theme-light"--}}
                        {{--style="width: 729px; height: 430px;">--}}
                        {{--<svg id="SvgjsSvg1872" width="729" height="430" xmlns="http://www.w3.org/2000/svg"--}}
                        {{--version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                        {{--xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"--}}
                        {{--xmlns:data="ApexChartsNS" transform="translate(0, 0)"--}}
                        {{--style="background: transparent;">--}}
                        {{--<g id="SvgjsG1874" class="apexcharts-inner apexcharts-graphical"--}}
                        {{--transform="translate(35.296875, 30)">--}}
                        {{--<defs id="SvgjsDefs1873">--}}
                        {{--<clipPath id="gridRectMask9fzkdx4k">--}}
                        {{--<rect id="SvgjsRect1880" width="696.703125" height="366.348" x="-4"--}}
                        {{--y="-2" rx="0" ry="0" opacity="1" stroke-width="0"--}}
                        {{--stroke="none" stroke-dasharray="0" fill="#fff"></rect>--}}
                        {{--</clipPath>--}}
                        {{--<clipPath id="gridRectMarkerMask9fzkdx4k">--}}
                        {{--<rect id="SvgjsRect1881" width="692.703125" height="366.348" x="-2"--}}
                        {{--y="-2" rx="0" ry="0" opacity="1" stroke-width="0"--}}
                        {{--stroke="none" stroke-dasharray="0" fill="#fff"></rect>--}}
                        {{--</clipPath>--}}
                        {{--<linearGradient id="SvgjsLinearGradient1887" x1="0" y1="0" x2="0"--}}
                        {{--y2="1">--}}
                        {{--<stop id="SvgjsStop1888" stop-opacity="0.7"--}}
                        {{--stop-color="rgba(0,143,251,0.7)" offset="0"></stop>--}}
                        {{--<stop id="SvgjsStop1889" stop-opacity="0.9"--}}
                        {{--stop-color="rgba(255,255,255,0.9)" offset="0.9"></stop>--}}
                        {{--<stop id="SvgjsStop1890" stop-opacity="0.9"--}}
                        {{--stop-color="rgba(255,255,255,0.9)" offset="1"></stop>--}}
                        {{--</linearGradient>--}}
                        {{--</defs>--}}
                        {{--<line id="SvgjsLine1879" x1="0" y1="0" x2="0" y2="362.348" stroke="#b6b6b6"--}}
                        {{--stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0"--}}
                        {{--width="1" height="362.348" fill="#b1b9c4" filter="none"--}}
                        {{--fill-opacity="0.9" stroke-width="1"></line>--}}
                        {{--<g id="SvgjsG1891" class="apexcharts-xaxis" transform="translate(0, 0)">--}}
                        {{--<g id="SvgjsG1892" class="apexcharts-xaxis-texts-g"--}}
                        {{--transform="translate(0, -4)"></g>--}}
                        {{--<line id="SvgjsLine1893" x1="0" y1="363.348" x2="688.703125"--}}
                        {{--y2="363.348" stroke="#e0e0e0" stroke-dasharray="0"--}}
                        {{--stroke-width="1"></line>--}}
                        {{--</g>--}}
                        {{--<g id="SvgjsG1908" class="apexcharts-grid">--}}
                        {{--<g id="SvgjsG1909" class="apexcharts-gridlines-horizontal"></g>--}}
                        {{--<g id="SvgjsG1910" class="apexcharts-gridlines-vertical"></g>--}}
                        {{--<line id="SvgjsLine1912" x1="0" y1="362.348" x2="688.703125"--}}
                        {{--y2="362.348" stroke="transparent" stroke-dasharray="0"></line>--}}
                        {{--<line id="SvgjsLine1911" x1="0" y1="1" x2="0" y2="362.348"--}}
                        {{--stroke="transparent" stroke-dasharray="0"></line>--}}
                        {{--</g>--}}
                        {{--<g id="SvgjsG1883" class="apexcharts-area-series apexcharts-plot-series">--}}
                        {{--<g id="SvgjsG1884" class="apexcharts-series" seriesName="Seriesx1"--}}
                        {{--data:longestSeries="true" rel="1" data:realIndex="0">--}}
                        {{--<g id="SvgjsG1885" class="apexcharts-series-markers-wrap"--}}
                        {{--data:realIndex="0"></g>--}}
                        {{--</g>--}}
                        {{--<g id="SvgjsG1886" class="apexcharts-datalabels" data:realIndex="0"></g>--}}
                        {{--</g>--}}
                        {{--<line id="SvgjsLine1913" x1="0" y1="0" x2="688.703125" y2="0"--}}
                        {{--stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"--}}
                        {{--class="apexcharts-ycrosshairs"></line>--}}
                        {{--<line id="SvgjsLine1914" x1="0" y1="0" x2="688.703125" y2="0"--}}
                        {{--stroke-dasharray="0" stroke-width="0"--}}
                        {{--class="apexcharts-ycrosshairs-hidden"></line>--}}
                        {{--<g id="SvgjsG1915" class="apexcharts-yaxis-annotations"></g>--}}
                        {{--<g id="SvgjsG1916" class="apexcharts-xaxis-annotations"></g>--}}
                        {{--<g id="SvgjsG1917" class="apexcharts-point-annotations"></g>--}}
                        {{--</g>--}}
                        {{--<rect id="SvgjsRect1878" width="0" height="0" x="0" y="0" rx="0" ry="0"--}}
                        {{--opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"--}}
                        {{--fill="#fefefe"></rect>--}}
                        {{--<g id="SvgjsG1894" class="apexcharts-yaxis" rel="0"--}}
                        {{--transform="translate(12.296875, 0)">--}}
                        {{--<g id="SvgjsG1895" class="apexcharts-yaxis-texts-g">--}}
                        {{--<text id="SvgjsText1896" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="31.5" text-anchor="end" dominant-baseline="auto"--}}
                        {{--font-size="11px" font-weight="400" fill="#373d3f"--}}
                        {{--class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1897">5.0</tspan>--}}
                        {{--</text>--}}
                        {{--<text id="SvgjsText1898" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="103.9696" text-anchor="end" dominant-baseline="auto"--}}
                        {{--font-size="11px" font-weight="400" fill="#373d3f"--}}
                        {{--class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1899">4.0</tspan>--}}
                        {{--</text>--}}
                        {{--<text id="SvgjsText1900" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="176.4392" text-anchor="end" dominant-baseline="auto"--}}
                        {{--font-size="11px" font-weight="400" fill="#373d3f"--}}
                        {{--class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1901">3.0</tspan>--}}
                        {{--</text>--}}
                        {{--<text id="SvgjsText1902" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="248.90879999999999" text-anchor="end"--}}
                        {{--dominant-baseline="auto" font-size="11px" font-weight="400"--}}
                        {{--fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1903">2.0</tspan>--}}
                        {{--</text>--}}
                        {{--<text id="SvgjsText1904" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="321.3784" text-anchor="end" dominant-baseline="auto"--}}
                        {{--font-size="11px" font-weight="400" fill="#373d3f"--}}
                        {{--class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1905">1.0</tspan>--}}
                        {{--</text>--}}
                        {{--<text id="SvgjsText1906" font-family="Helvetica, Arial, sans-serif"--}}
                        {{--x="20" y="393.848" text-anchor="end" dominant-baseline="auto"--}}
                        {{--font-size="11px" font-weight="400" fill="#373d3f"--}}
                        {{--class="apexcharts-text apexcharts-yaxis-label "--}}
                        {{--style="font-family: Helvetica, Arial, sans-serif;">--}}
                        {{--<tspan id="SvgjsTspan1907">0.0</tspan>--}}
                        {{--</text>--}}
                        {{--</g>--}}
                        {{--</g>--}}
                        {{--<g id="SvgjsG1875" class="apexcharts-annotations"></g>--}}
                        {{--</svg>--}}
                        {{--<div class="apexcharts-legend"></div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="resize-triggers">--}}
                        {{--<div class="expand-trigger">--}}
                        {{--<div style="width: 803px; height: 523px;"></div>--}}
                        {{--</div>--}}
                        {{--<div class="contract-trigger"></div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                    </div>

                    {{--<div class="row mb-none-30 mt-5">--}}
                    {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
                    {{--<div class="card overflow-hidden">--}}
                    {{--<div class="card-body">--}}
                    {{--<div class="chartjs-size-monitor">--}}
                    {{--<div class="chartjs-size-monitor-expand">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--<div class="chartjs-size-monitor-shrink">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<h5 class="card-title">Login By Browser</h5>--}}
                    {{--<canvas id="userBrowserChart" style="display: block; width: 762px; height: 762px;"--}}
                    {{--width="762" height="762" class="chartjs-render-monitor"></canvas>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
                    {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                    {{--<div class="chartjs-size-monitor">--}}
                    {{--<div class="chartjs-size-monitor-expand">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--<div class="chartjs-size-monitor-shrink">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<h5 class="card-title">Login By OS</h5>--}}
                    {{--<canvas id="userOsChart" width="762" height="762"--}}
                    {{--style="display: block; width: 762px; height: 762px;"--}}
                    {{--class="chartjs-render-monitor"></canvas>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
                    {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                    {{--<div class="chartjs-size-monitor">--}}
                    {{--<div class="chartjs-size-monitor-expand">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--<div class="chartjs-size-monitor-shrink">--}}
                    {{--<div class=""></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<h5 class="card-title">Login By Country</h5>--}}
                    {{--<canvas id="userCountryChart" width="762" height="762"--}}
                    {{--style="display: block; width: 762px; height: 762px;"--}}
                    {{--class="chartjs-render-monitor"></canvas>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"--}}
                    {{--aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                    {{--<div class="modal-dialog modal-lg" role="document">--}}
                    {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Cron Job Setting Instruction</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-md-12 my-2">--}}
                    {{--<p class="cron-p-style"> To automate BV Matching Bonus, choose your required setting--}}
                    {{--from above and run the <code> cron job </code> on your server. Set the Cron time--}}
                    {{--as minimum as possible. Once per <code>5-15</code> minutes is ideal.</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12">--}}
                    {{--<label>Cron Command</label>--}}
                    {{--<div class="input-group ">--}}
                    {{--<input id="ref" type="text" class="form-control form-control-lg"--}}
                    {{--value="curl -s https://script.viserlab.com/bisurv/cron" readonly="">--}}
                    {{--<div class="input-group-append" id="copybtn">--}}
                    {{--<span class="input-group-text btn--success" title="" onclick="myFunction()"> COPY</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                </div><!-- bodywrapper__inner end -->
            @endif
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Deposit', 'Withdraw'],
                        @foreach($result as $amountData)
                    ['{{$amountData[0]}}', {{ $amountData[1] }}, {{ $amountData[2] }}],
                    @endforeach
                ]);

                var options = {
                    chart: {
                        title: 'Monthly Deposit & Withdraw Report',
                    },
                    bars: 'vertical' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <script>
            @if(Session::has('success'))
                toastr.options =
                {
                    "closeButton": true,
                    "progressBar": true
                }
            toastr.success("{{ session('success') }}");
            @endif

                    @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton": true,
                    "progressBar": true
                }
            toastr.error("{{ session('error') }}");
            @endif

                    @if(Session::has('info'))
                toastr.options =
                {
                    "closeButton": true,
                    "progressBar": true
                }
            toastr.info("{{ session('info') }}");
            @endif

                    @if(Session::has('warning'))
                toastr.options =
                {
                    "closeButton": true,
                    "progressBar": true
                }
            toastr.warning("{{ session('warning') }}");
            @endif
        </script>
@endsection
