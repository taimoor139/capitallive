@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Add Manual Deposit</h6>
                    </div>
                </div>
            </div>
            <form action="#" id="depositForm" method="post">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="container">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select class="form-control js-example-basic-single" id="user" name="user" required>
                                    <option>Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="currency">Account Type</label>
                                <select class="form-control" name="accountType" id="account_type" required>
                                    <option hidden value="">Please Select</option>
                                    <option value="1"> CF Standard Account
                                    </option>
                                    <option value="2"> CF Pro Account
                                    </option>
                                    <option value="3"> CF Brokerage Account
                                    </option>
                                </select>
                                <span class="text-danger error error_account_type d-none d-none"></span>
                            </div>
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <select class="form-control" name="currency" id="currency" required>
                                    <option hidden value="">Please Select</option>
                                    <option value="BTC">
                                        BTC - BTC
                                    </option>
                                    <option value="USDT.TRC20">
                                        USDT - USDT.TRC20
                                    </option>
                                </select>
                                <span class="text-danger error error_currency d-none d-none"></span>
                            </div>
                            <div class="form-group">
                                <label for="amount">Enter Amount
                                    <small class="text-muted">USD</small>
                                </label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                       placeholder="Enter USD" required>
                                <p class="text-danger error error_amount error_coin d-none d-none"></p>
                                <span id="amount-warning" class="alert-warning"></span>
                            </div>

                            <span id="amount-warning" class="alert-warning"></span>

                            <button type="submit" class="btn btn-info float-right processBtn">Submit</button>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $('#account_type').change(function () {

            var amount = $('#amount').val();
            var accountType = $(this).val();

            if (accountType == 1 && amount < {{ $fx1Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx1Limit }}.');
                $('.processBtn').prop('disabled', true);
            } else if (accountType == 2 && amount < {{ $fx2Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx2Limit }}.');
                $('.processBtn').prop('disabled', true);
            } else if (accountType == 3 && amount < {{ $fx3Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx3Limit }}.');
                $('.processBtn').prop('disabled', true);
            } else {
                $('.processBtn').prop('disabled', false);
            }
        });
        $('#amount').keyup(function () {
            var amount = $(this).val();
            var accountType = $('#account_type').val();

            if (accountType == '') {
                $('.processBtn').prop('disabled', true);
            } else if (accountType == 1 && amount < {{ $fx1Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx1Limit }}.')
                $('.processBtn').prop('disabled', true);
            } else if (accountType == 2 && amount < {{ $fx2Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx2Limit }}.')
                $('.processBtn').prop('disabled', true);
            } else if (accountType == 3 && amount < {{ $fx3Limit }}) {
                $('#amount-warning').html('The amount must be at least {{ $fx3Limit }}.')
                $('.processBtn').prop('disabled', true);
            } else {
                $('.processBtn').prop('disabled', false);
            }
        });
        $('#depositForm').on('submit', function (e) {
            
            $('.processBtn').prop('disabled', true);
            e.preventDefault();
            
            var amount = $('#amount').val();
            var user = $('#user').val();
            var currency = $('#currency').val();
            var accountType = $('#account_type').val();
            var _token = $('#_token').val();

            $.ajax({
                url: "{{ route('add-manual-deposit') }}",
                type: "POST",
                data: {
                    _token: _token,
                    user:user,
                    amount: amount,
                    currency: currency,
                    accountType: accountType
                },
                success: function (response) {
                    if (response == 1) {
                        location.reload();
                    } else {
                        $('#deposit-warning').html('Something went Wrong!');
                        setTimeout(function () {
                            location.reload();
                        }, 5000);
                    }
                }
            })
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