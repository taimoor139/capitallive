<div class="modal fade " id="addWithdrawal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-top-warning border-bottom-warning">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-currency-exchange text-danger"></i> Make New Withdrawal</h5>
                {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
            </div>
            <form method="post" id="withdrawForm" action="{{ route('withdrawal-store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Balance Account</label>
                                <select class="form-control" name="balance_account" id="balance_account" required>
                                    <option hidden value="">Select Balance Account</option>
                                    <option value="earning" data="{{ number_format($earningBalance) }}">
                                        Earning Balance ({{ number_format($earningBalance) }} $)
                                    </option>
                                    <option value="bonus" data="{{ number_format($bonusBalance) }}">
                                        Bonus Balance ({{ number_format($bonusBalance) }} $)
                                    </option>
                                </select>
                                <span class="error_account_type text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Account Type</label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    <option hidden value="">Please Select</option>
                                    <option value="CF Standard Account"> CF Standard Account 50$
                                    </option>
                                    <option value="CF Pro Account"> CF Pro Account 500$
                                    </option>
                                    <option value="CF Brokerage Account"> CF Brokerage Account 1000$
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <select class="form-control currency" name="currency" id="currency" required>
                                    <option hidden value="">Please Select</option>
                                    <option
                                        data-coin="{&quot;id&quot;:1,&quot;name&quot;:&quot;BTC&quot;,&quot;current_price&quot;:47232.84,&quot;api_link&quot;:&quot;https:\/\/api.binance.com\/api\/v1\/ticker\/24hr?symbol=BTCUSDT&quot;,&quot;coin_code&quot;:&quot;BTC&quot;,&quot;icon_path&quot;:&quot;btc.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:0.0008,&quot;withdraw_fee&quot;:3,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-03-30T09:59:01.000000Z&quot;}"
                                        value="BTC">
                                        BTC - BTC
                                    </option>
                                    <option
                                        data-coin="{&quot;id&quot;:6,&quot;name&quot;:&quot;USDT&quot;,&quot;current_price&quot;:1,&quot;api_link&quot;:null,&quot;coin_code&quot;:&quot;USDT.TRC20&quot;,&quot;icon_path&quot;:&quot;usdt.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:1,&quot;withdraw_fee&quot;:2.5,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-02-02T19:24:32.000000Z&quot;}"
                                        value="USDT">
                                        USDT - USDT.TRC20
                                    </option>
                                </select>
                                <span class="coin_info" style="display: none"><span class="text-muted bolder">Withdrawal Limit : <span id="limit"></span> USD</span>, <span
                                        class="text-danger bolder">Withdrawal Fee : <span id="fee" class="text-danger bolder"></span> %</span><br></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="amount">Enter Amount <small class="text-muted">USD</small></label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                       placeholder="Enter Amount in USD" required />
                                <span class="error_amount text-danger error error_coin"></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="withdrawal_address">Withdrawal Address</label>
                                <input type="text" class="form-control" name="withdraw_address" id="withdraw_address"
                                       placeholder="Enter valid Withdrawal Address"
                                       required />
                                <p class="text-danger error error_withdraw_address d-none d-none"></p>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="password">Account Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Account Password" required />
                                <p class="text-danger error error_password d-none d-none"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="text-danger error error_documents error_withdraw_limit"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.processBtn').click(function (){
        var withdrawDays = [1,2,3]
        var d = new Date();
        var day = d.getDate();


        var today = d.getDay();
        var days = ['Sun','Mon','Tues','Wed','Thrus','Fri','Sat'];


        if(days[today] != 'Mon' ){
            $('.error_withdraw_limit').html('Withdraw is only allow on Monday of every week!');
        } else {
             $('#withdrawForm').submit();
        }

    });


    $('#balance_account').change(function (){
        var amount = $('option:selected', this).attr('data');
        if(amount <= 0){
            $('.error_account_type').css('display', 'block');
            $('.error_account_type').html("Amount must be greater than 0");
            $('.processBtn').prop('disabled', true);
        } else {
            $('.error_account_type').css('display', 'none');
            $('.processBtn').prop('disabled', false);
        }
    });

    $('#amount').keyup(function (){
        var earningAmount = $('option:selected', '#balance_account').attr('data');
        var amount = $(this).val();

        if(parseInt(amount) > parseInt(earningAmount) || parseInt(amount) <= 0 ){
            $('.error_amount').html("Amount must be less or equal to balance");
            $('.error_amount').css('display', 'block');
            $('.processBtn').prop('disabled', true);
        } else if(parseInt(amount) < {{ (array_key_exists('limit', $usdtLimit) ? $usdtLimit["limit"] : 0)  }} || parseInt(amount) < {{ (array_key_exists('limit', $usdtLimit) ? $usdtLimit["limit"] : 0) }} ){
            $('.error_amount').html("Amount must be greater or equal to limit");
            $('.error_amount').css('display', 'block');
            $('.processBtn').prop('disabled', true);
        } else {
            $('.error_amount').css('display', 'none');
            $('.processBtn').prop('disabled', false);
        }
    });

    $('#currency').change(function (){
        var currency = $(this).val();
        var amount = $('#amount').val();

        if(currency == 'BTC'){
            $('#limit').html({{ (array_key_exists('limit', $btcLimit) ? $btcLimit["limit"] : 0) }})
            $('#fee').html({{ (array_key_exists('fee', $btcLimit) ? $btcLimit["fee"] : 0) }})
            if(parseInt(amount) < parseInt({{$btcLimit["limit"]}})){
                $('.error_amount').html("Amount must be greater or equal to the limit");
                $('.error_amount').css('display', 'block');
                $('.processBtn').prop('disabled', true);
            } else {
                $('.error_amount').css('display', 'none');
                $('.processBtn').prop('disabled', false);
            }
        } else if(currency == 'USDT'){
            $('#limit').html({{ (array_key_exists('limit', $usdtLimit) ? $usdtLimit["limit"] : 0) }})
            $('#fee').html({{ (array_key_exists('fee', $usdtLimit) ? $usdtLimit["fee"] : 0) }})
            if(parseInt(amount) < parseInt({{ $usdtLimit["limit"] }})){
                $('.error_amount').html("Amount must be greater or equal to the limit");
                $('.error_amount').css('display', 'block');
                $('.processBtn').prop('disabled', true);
            } else {
                $('.error_amount').css('display', 'none');
                $('.processBtn').prop('disabled', false);
            }
        }

        $('.coin_info').css('display', 'block');
    })
</script>
<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
