@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">{{ $pageTitle }}</h6>
                </div>
            </div>

            <div class="row justify-content-center">
                @isset($successfulDeposits)
                <div class="col-md-4 col-sm-6 mb-30">
                    <div class="widget-two box--shadow2 b-radius--5 bg--success">
                        <div class="widget-two__content">
                            <h2 class="text-white">${{ $successfulDeposits }}</h2>
                            <p class="text-white">Successful Deposit</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                <div class="col-md-4 col-sm-6 mb-30">
                    <div class="widget-two box--shadow2 b-radius--5 bg--6">
                        <div class="widget-two__content">
                            <h2 class="text-white">${{ $pendingDeposits }}</h2>
                            <p class="text-white">Pending Deposit</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                <div class="col-md-4 col-sm-6 mb-30">
                    <div class="widget-two box--shadow2 b-radius--5 bg--pink">
                        <div class="widget-two__content">
                            <h2 class="text-white">${{ $rejectedDeposits }}</h2>
                            <p class="text-white">Rejected Deposit</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                @endisset
                <div class="col-md-12">
                    <div class="card b-radius--10">
                        <div class="card-body p-0">
                            <div class="table-responsive--sm table-responsive">
                                <table class="table table--light style--two"  id="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Trx Number</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        {{--<th scope="col">Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deposits as $deposit)
                                        <tr>
                                            <td data-label="Date"> {{ date_format($deposit->created_at, 'd M, Y H:i A') }}</td>
                                            <td data-label="Trx Number"
                                                class="font-weight-bold text-uppercase">{{ $deposit->transactionId }}</td>
                                            <td data-label="Username"><a
                                                        href="{{ route('view-user', $deposit->userId) }}">{{ $deposit->user->username ?? 'N/A' }}</a>
                                            </td>
                                            <td data-label="Amount" class="font-weight-bold">{{ $deposit->amount }}
                                                USD
                                            </td>

                                            <td data-label="Status">
                                                @if($deposit->status == 1)
                                                    <span class="badge badge-light-info">Approved</span>
                                                @elseif($deposit->status == 0)
                                                    <span class="badge badge--warning">Pending</span>
                                                @elseif($deposit->status == 100)
                                                    <span class="badge badge--success">Successful</span>
                                                @elseif($deposit->status == -1)
                                                    <span class="badge badge--danger">Rejected</span>
                                                @endif

                                            </td>
                                            {{--<td data-label="Action">--}}
                                                {{--<a href="https://script.viserlab.com/bisurv/admin/deposit/details/1"--}}
                                                   {{--class="icon-btn ml-1 " data-toggle="tooltip" title=""--}}
                                                   {{--data-original-title="Detail">--}}
                                                    {{--<i class="la la-eye"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table><!-- table end -->
                            </div>
                        </div>
                    </div><!-- card end -->
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->
    </div>
@endsection