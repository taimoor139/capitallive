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
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 mb-20 d-none d-sm-block">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">Withdrawal</h5>
                                        <p class="card-text">Statistics <i class="bi bi-clipboard-data text-danger"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">
                                            $ {{ ($bonusBalance > 0 ? number_format($bonusBalance) : 0) }}</h5>
                                        <p class="card-text">Bonus Balance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">$ {{ number_format($earningBalance) }}</h5>
                                        <p class="card-text">Earning Balance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-20">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h5 class="card-title p-0 pt-4">
                                            $ {{ ($totalBalance > 0 ? number_format($totalBalance) : 0) }}</h5>
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
                                    @if(date('D', strtotime(now())) == "Mon" && $withdrawalCheck)
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                           data-target="#addWithdrawal">New Withdrawal</a>
                                    @endif
                                    @include('user.withdrawals.addWithdrawals')
                                </h5>
                                <table id="withdrawTable" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account</th>
                                        <th>Currency</th>
                                        <th>Withdraw Address</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $withdrawal->account_type }}</td>
                                            <td>
                                                @if($withdrawal->currency == 'BTC')
                                                    <img src="{{ asset('img/btc.svg') }}"
                                                         class="img-fluid rounded-circle" width="30px" alt="">
                                                    <span>{{ $withdrawal->currency }}</span>
                                                @endif
                                                {{--                                                @if($withdrawal->currency == 'BNB')--}}
                                                {{--                                                    <img src="{{ asset('img/bnb.svg') }}"--}}
                                                {{--                                                         class="img-fluid rounded-circle" width="30px" alt="">--}}
                                                {{--                                                @endif--}}
                                                @if($withdrawal->currency == 'USDT.TRC20')
                                                    <img src="{{ asset('img/usdt.svg') }}"
                                                         class="img-fluid rounded-circle" width="30px" alt="">
                                                    <span>USDT</span>
                                                @endif
                                                {{--                                                @if($withdrawal->currency == 'XRP')--}}
                                                {{--                                                    <img src="{{ asset('img/xrp.svg') }}"--}}
                                                {{--                                                         class="img-fluid rounded-circle" width="30px" alt="">--}}
                                                {{--                                                @endif--}}


                                                <small class="text-md font-weight-bolder">{{ $withdrawal->amount }}
                                                    <span
                                                        class="text-muted">USD</span></small>
                                            </td>
                                            <td>{{ $withdrawal->withdraw_address }}</td>

                                            <td>
                                                {{ $withdrawal->paymentStatus->name ?? '' }}
                                            </td>

                                            <td>{{ date_format($withdrawal->created_at, 'M d, Y - h:i') }}</td>

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
    <script>
        $(document).ready(function () {
            $('#withdrawTable').DataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": true,
                "dom": '<"pull-left"f><"pull-right"l>tip',
                order: [[5, 'desc']],
                scrollX: true
            });
        });
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
