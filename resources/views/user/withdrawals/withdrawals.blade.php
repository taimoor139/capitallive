@extends('layouts.user.master');
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">


                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 mb-20 d-none d-sm-block">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">Withdrawal</h5>
                                        <p class="card-text">Statistics <i class="bi bi-clipboard-data text-danger"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">$ 0.00</h5>
                                        <p class="card-text">Bonus Balance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">$ 427.40</h5>
                                        <p class="card-text">Earning Balance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">
                                            $ 427.40</h5>
                                        <p class="card-text">Available Balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card  border-top-warning  border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-currency-exchange text-danger"></i> Withdrawals
                                    {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#new_withdrawal" style="float: right">New Withdrawal
                                    </button> --}}
                                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addWithdrawal">New Withdrawal</i></a>
                    @include('user.withdrawals.addWithdrawals')
                                </h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Account</th>
                                            <th>From Currency</th>
                                            <th>To Currency</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>EARNING</span>
                                            </td>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name=UD&color=ffffff&background=ffc107"
                                                    class="img-fluid rounded-circle" width="30px" alt="">
                                                <span>874</span>
                                                <small class="text-md font-weight-bolder"> USD <span class="text-danger"> - 2.5%
                                                        fee</span></small>
                                            </td>
                                            <td>
                                                <img src="https://tokyosecurities.com/img/usdt.svg" class="img-fluid rounded-circle"
                                                    width="30px" alt="">
                                                <span>USDT</span>
                                                <small class="text-md font-weight-bolder">852.15</small><br>
                                                <small class="text-md font-weight-bolder">TM1FXr3L18WnpyjDDJr5adBuTj6w6U3JK6</small>
                                            </td>
                                            <td>
                                                <p>Completed</p>
                                                <small></small>
                                            </td>
                                            <td title="2022-03-01 10:23:46">March 01, 2022</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
</div>


@endsection
