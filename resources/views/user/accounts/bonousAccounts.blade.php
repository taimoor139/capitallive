@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">Bonus Account</h5>
                                <p class="card-text">Statistics <i class="bi bi-clipboard-data text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">$ {{ $directBonuses }}</h5>
                                <p class="card-text">Direct Bonus <i class="bi bi-person-lines-fill text-primary"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">$ {{ $networkBonuses }}</h5>
                                <p class="card-text">Network Bonus <i class="bi bi-diagram-2 text-primary"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">$ {{ $pendingBonuses }}</h5>
                                <p class="card-text">Pending Bonus <i class="bi bi-unlock-fill text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top-warning  border-bottom-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-diagram-2 text-primary"></i> Bonus History</h5>
                        <table class="table table-hover" id="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                {{--<th scope="col">From</th>--}}
                                <th scope="col">Amount</th>
                                <th scope="col">Percentage</th>
                                {{--<th scope="col">Points</th>--}}
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bonuses as $bonus)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date_format($bonus->created_at, 'd-m-Y') }}</td>
                                    @if($bonus->type == 1)
                                        <td>Network</td>
                                    @elseif($bonus->type == 2)
                                        <td>Direct</td>
                                    @else
                                        <td> Award</td>
                                    @endif
                                    <td>$ {{ $bonus->amount }}</td>
                                    <td>{{ $bonus->percentage }}</td>
                                    <td>
                                        @if($bonus->status == 0)
                                            Pending
                                        @else
                                            Completed
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>

                {{-- <div class="row justify-content-center">
                    <div class="col-12">

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
