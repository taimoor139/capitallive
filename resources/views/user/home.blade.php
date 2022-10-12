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
                                    <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
                                            <h6>{{ $newJoining }}</h6>
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
                                    <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-diagram-2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            Left: {{ $totalLeftMembers }} | Right: {{ $totalRightMembers }}
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
                                            <h6 style="font-size: 24px;">$ {{ ($totalBonuses > 0 ? round($totalBonuses, 2) : 0 ) + round($earning, 2)}}</h6>
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
                                            <h6 style="font-size: 24px;">$ {{ number_format($deposits) }}</h6>
                                            <span class="text-muted small pt-2"
                                                  style="font-size: 24px;">My Investment</span>
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
                                            <h6 style="font-size: 24px;">$ {{ ($totalBonuses > 0 ? round($totalBonuses, 2) : 0 )}}</h6>
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
                                            <h6 style="font-size: 24px;">$ {{ round($earning, 2) }}</h6>
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
                                            <p>You reached the rank <span
                                                        class="text-danger">{{ Auth::user()->rankAward->title ?? '' }}</span>
                                            </p>
                                            <a href="{{ route('award-dashboard') }}">
                                                <button type="button" class="btn btn-outline-warning">Details</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <iframe scrolling="no" allowtransparency="true" frameborder="0" class="live" width="100%"
                            height="400"
                            src="https://s.tradingview.com/embed-widget/market-overview/?locale=en#%7B%22colorTheme%22%3A%22dark%22%2C%22dateRange%22%3A%2212M%22%2C%22showChart%22%3Afalse%2C%22largeChartUrl%22%3A%22%22%2C%22isTransparent%22%3Afalse%2C%22showSymbolLogo%22%3Atrue%2C%22showFloatingTooltip%22%3Afalse%2C%22width%22%3A%22600%22%2C%22height%22%3A%22410%22%2C%22tabs%22%3A%5B%7B%22title%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22d%22%3A%22US%20100%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ADJI%22%2C%22d%22%3A%22Dow%2030%22%7D%2C%7B%22s%22%3A%22INDEX%3ANKY%22%2C%22d%22%3A%22Nikkei%20225%22%7D%2C%7B%22s%22%3A%22INDEX%3ADEU40%22%2C%22d%22%3A%22DAX%20Index%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22d%22%3A%22UK%20100%22%7D%5D%2C%22originalTitle%22%3A%22Indices%22%7D%2C%7B%22title%22%3A%22Futures%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME_MINI%3AES1!%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22CME%3A6E1!%22%2C%22d%22%3A%22Euro%22%7D%2C%7B%22s%22%3A%22COMEX%3AGC1!%22%2C%22d%22%3A%22Gold%22%7D%2C%7B%22s%22%3A%22NYMEX%3ACL1!%22%2C%22d%22%3A%22Crude%20Oil%22%7D%2C%7B%22s%22%3A%22NYMEX%3ANG1!%22%2C%22d%22%3A%22Natural%20Gas%22%7D%2C%7B%22s%22%3A%22CBOT%3AZC1!%22%2C%22d%22%3A%22Corn%22%7D%5D%2C%22originalTitle%22%3A%22Futures%22%7D%2C%7B%22title%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME%3AGE1!%22%2C%22d%22%3A%22Eurodollar%22%7D%2C%7B%22s%22%3A%22CBOT%3AZB1!%22%2C%22d%22%3A%22T-Bond%22%7D%2C%7B%22s%22%3A%22CBOT%3AUB1!%22%2C%22d%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBL1!%22%2C%22d%22%3A%22Euro%20Bund%22%7D%2C%7B%22s%22%3A%22EUREX%3AFBTP1!%22%2C%22d%22%3A%22Euro%20BTP%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBM1!%22%2C%22d%22%3A%22Euro%20BOBL%22%7D%5D%2C%22originalTitle%22%3A%22Bonds%22%7D%2C%7B%22title%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FX%3AEURUSD%22%7D%2C%7B%22s%22%3A%22FX%3AGBPUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDJPY%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCHF%22%7D%2C%7B%22s%22%3A%22FX%3AAUDUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCAD%22%7D%5D%2C%22originalTitle%22%3A%22Forex%22%7D%5D%2C%22utm_source%22%3A%22tokyosecurities.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22market-overview%22%7D"></iframe>

                    <div class="row match-height">
                        <div class="col-md-12 col-xl-12">
                            <div class="card card-congratulation-medal text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mt-4">
                                        <div class="card-body border-left-warning">
                                            <h5 class="card-title">News Alert!</h5>
                                            <h3>{{ $notification->notification ?? 'No New Notification' }}</h3>
                                            <p>{{ $notification->description ?? '' }}</p>
                                            <a href="{{ $notification->link ?? ''}}">{{ $notification->link ?? ''}}</a>
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
                                    <h5 class="card-title">Recent Transactions</h5>
                                    <div class="table-responsive">
                                        <table id="transactionTable" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">Type</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{ ucfirst($transaction->type) }}</td>
                                                    <td>$ {{ $transaction->amount }}</td>
                                                    <td>{{ $transaction->paymentStatus->name }}</td>
                                                    <td>{{ date_format($transaction->created_at ,'M d, Y') }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="calendar"></div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
        $('#transactionTable').DataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            order: [[3, 'desc']],
            scrollX: true
        });
    });
</script>
@endsection
