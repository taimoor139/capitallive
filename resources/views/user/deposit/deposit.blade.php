@extends('layouts.user.master')

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
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-currency-exchange text-primary"></i> My Deposits
                                    {{-- <a href="#" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addDeposit" style="float: right">New Deposit
                                </a> --}}
                                    <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                       data-target="#addDeposit">New Deposit</i></a>
                                    @include('user.deposit.addDeposit')
                                </h5>
                                <table id="table" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Account Type</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deposits as $deposit)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            @if($deposit->accountType == 1)
                                                <td>CF Standard Account </td>
                                            @elseif($deposit->accountType == 2)
                                                <td>CF Pro Account </td>
                                            @else
                                                <td>CF Brokerage Account </td>
                                            @endif

                                            <td>
                                                @if($deposit->currency == 'BTC')
                                                    <img src="{{ asset('img/btc.svg') }}"
                                                         class="img-fluid rounded-circle" width="30px" alt="">
                                                    <span>{{ $deposit->currency }}</span>
                                                @endif
{{--                                                @if($deposit->currency == 'BNB')--}}
{{--                                                    <img src="{{ asset('img/bnb.svg') }}"--}}
{{--                                                         class="img-fluid rounded-circle" width="30px" alt="">--}}
{{--                                                @endif--}}
                                                @if($deposit->currency == 'USDT.TRC20')
                                                    <img src="{{ asset('img/usdt.svg') }}"
                                                         class="img-fluid rounded-circle" width="30px" alt="">
                                                        <span>USDT</span>
                                                @endif
{{--                                                @if($deposit->currency == 'XRP')--}}
{{--                                                    <img src="{{ asset('img/xrp.svg') }}"--}}
{{--                                                         class="img-fluid rounded-circle" width="30px" alt="">--}}
{{--                                                @endif--}}


                                                <small class="text-md font-weight-bolder">{{ $deposit->amount }} <span
                                                        class="text-muted">USD</span></small>
                                            </td>
                                            <td>
                                                {{ $deposit->paymentStatus->name }}
                                                <br>
                                                <small>{{ ($deposit->transactionId == 'manual' ? '' : $deposit->transactionId) }}
                                                </small>
                                            </td>

                                            <td>{{ date_format($deposit->created_at, 'M d, Y - h:i') }}</td>

                                        </tr>
                                    @endforeach
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
