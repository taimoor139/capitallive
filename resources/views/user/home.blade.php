@extends('layouts.user.master')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-2">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="time">NNN 0000, 00 00:00:00</h6>
                                            <span class="text-muted small pt-2">Server Time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="card card-statistics">
                                <div class="d-flex justify-content-center mt-2">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-alarm"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="clockdiv">
                                            <span class="days"></span>
                                            <span class="hours"></span>
                                            <span class="minutes"></span>
                                        </h6>
                                        <span class="text-muted small pt-2">Week 52 Closing in</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-2">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>0</h6>
                                            <span class="text-muted small pt-2">New Joining</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>



                    <div class="row match-height">
                        <!-- Medal Card -->

                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="card card-statistics">
                                <div class="d-flex justify-content-center mt-2">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-diagram-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            Left: 12 | Right: 0
                                        </h6>
                                        <span class="text-muted small pt-2">My Network</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4 col-12">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-2">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet2 text-warning" style="font-size: 50px"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 style="font-size: 24px;">427.4</h6>
                                            <span class="text-muted small pt-2" style="font-size: 24px;">Balance</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-md-4 col-xl-4 col-12">
                            <div class="card card-congratulation-medalr text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-2">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-exchange"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 style="font-size: 24px;">$ 18,000</h6>
                                            <span class="text-muted small pt-2" style="font-size: 24px;">Deposits</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>



                    <div class="row match-height">
                        <div class="col-md-4 col-xl-4">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-4">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet2 text-warning" style="font-size: 50px"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 style="font-size: 24px;">$ 0</h6>
                                            <span class="text-muted small pt-2" style="font-size: 24px;">Bonuses</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-md-4 col-xl-4">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-4">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-exchange"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 style="font-size: 24px;">$ 1,373</h6>
                                            <span class="text-muted small pt-2" style="font-size: 24px;">Earnings</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                        <div class="col-md-4 col-xl-4">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="card-body border-left-warning">
                                            <h5 class="card-title">Congratulations</h5>
                                            <p>You reached the rank <span class="text-danger">STARTER</span>
                                            </p>
                                            <a href="https://tokyosecurities.com/rank-awards">
                                            <button type="button" class="btn btn-outline-warning">Details</button>
                                            </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-md-12 col-xl-12">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-4">
                                        <div class="card-body border-left-warning">
                                            <h5 class="card-title">News Alert!</h5>
                                            <p><strong>Account Termination Pre Notice</strong> <br>1.All the clients are requested to upload the complete KYC documents till 31st of March as it is a final date for KYC process completion.
                                            2.If fails to upload till the given date, the account will be blocked permanently with no exemption.</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-md-12 col-xl-12">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                        <h5 class="card-title"">Recent Transactions</h5>
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                        <thead>
                                        <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>withdraw</td>
                                        <td>874 USD</td>
                                        <td>
                                        Completed
                                        </td>
                                        <td>March 01,2022</td>
                                        </tr>
                                        <tr>
                                        <td>deposit</td>
                                        <td>300000 USD</td>
                                        <td>
                                        Cancelled / Timed Out
                                        </td>
                                        <td>March 28,2022</td>
                                        </tr>
                                        <tr>
                                        <td>deposit</td>
                                        <td>10000 USD</td>
                                        <td>
                                        Cancelled / Timed Out
                                        </td>
                                        <td>March 21,2022</td>
                                        </tr>
                                        <tr>
                                        <td>deposit</td>
                                        <td>1000 USD</td>
                                        <td>
                                        Cancelled / Timed Out
                                        </td>
                                        <td>March 13,2022</td>
                                        </tr>
                                        <tr>
                                        <td>deposit</td>
                                        <td>1000 USD</td>
                                        <td>
                                        Cancelled / Timed Out
                                        </td>
                                        <td>March 11,2022</td>
                                        </tr>
                                        <tr>
                                        <td>deposit</td>
                                        <td>1000 USD</td>
                                        <td>
                                        Cancelled / Timed Out
                                        </td>
                                        <td>March 07,2022</td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
