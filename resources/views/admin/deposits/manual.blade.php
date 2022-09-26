@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('create-manual-deposit') }}" class="btn btn-info btn-sm float-right">
                        Add Manual Deposit
                    </a>
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Manual Deposits</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($manualDeposits as $manual)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $manual->user->username ?? 'N/A' }}</td>
                                <td>{{ $manual->user->email }}</td>
                                <td>{{ $manual->amount }} $</td>
                                <td>{{ date_format($manual->created_at, 'd-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->


    </div><!-- body-wrapper end -->
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
