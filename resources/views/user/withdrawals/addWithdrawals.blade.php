
<div class="modal fade " id="addWithdrawal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-top-warning border-bottom-warning">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-currency-exchange text-danger"></i> Make New Withdrawal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="withdrawForm" action="{{ route('withdrawal-store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Balance Account</label>
                                <select class="form-control" name="account_type" id="account_type">
                                    <option hidden value="">Select Balance Account</option>
                                    <option value="earning">
                                        Earning Balance (427.40 $)
                                    </option>
                                    <option value="bonus">
                                        Bonus Balance (0.00 $)
                                    </option>
                                </select>
                                <span class="text-danger error error_account_type d-none d-none"></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <select class="form-control currency" name="currency" id="currency">
                                    <option hidden value="">Please Select</option>
                                    <option
                                        data-coin="{&quot;id&quot;:1,&quot;name&quot;:&quot;BTC&quot;,&quot;current_price&quot;:47232.84,&quot;api_link&quot;:&quot;https:\/\/api.binance.com\/api\/v1\/ticker\/24hr?symbol=BTCUSDT&quot;,&quot;coin_code&quot;:&quot;BTC&quot;,&quot;icon_path&quot;:&quot;btc.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:0.0008,&quot;withdraw_fee&quot;:3,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-03-30T09:59:01.000000Z&quot;}"
                                        value="1">
                                        BTC - BTC
                                    </option>
                                    <option
                                        data-coin="{&quot;id&quot;:3,&quot;name&quot;:&quot;BNB&quot;,&quot;current_price&quot;:435.9,&quot;api_link&quot;:&quot;https:\/\/api.binance.com\/api\/v1\/ticker\/24hr?symbol=BNBUSDT&quot;,&quot;coin_code&quot;:&quot;BNB&quot;,&quot;icon_path&quot;:&quot;bnb.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:5,&quot;withdraw_fee&quot;:0,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-03-30T09:59:02.000000Z&quot;}"
                                        value="3">
                                        BNB - BNB
                                    </option>
                                    <option
                                        data-coin="{&quot;id&quot;:4,&quot;name&quot;:&quot;XRP&quot;,&quot;current_price&quot;:0.8597,&quot;api_link&quot;:&quot;https:\/\/api.binance.com\/api\/v1\/ticker\/24hr?symbol=XRPUSDT&quot;,&quot;coin_code&quot;:&quot;XRP&quot;,&quot;icon_path&quot;:&quot;xrp.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:5,&quot;withdraw_fee&quot;:0,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-03-30T09:59:02.000000Z&quot;}"
                                        value="4">
                                        XRP - XRP
                                    </option>
                                    <option
                                        data-coin="{&quot;id&quot;:6,&quot;name&quot;:&quot;USDT&quot;,&quot;current_price&quot;:1,&quot;api_link&quot;:null,&quot;coin_code&quot;:&quot;USDT.TRC20&quot;,&quot;icon_path&quot;:&quot;usdt.svg&quot;,&quot;allow_deposit&quot;:1,&quot;allow_withdraw&quot;:1,&quot;withdraw_limit&quot;:1,&quot;withdraw_fee&quot;:2.5,&quot;created_at&quot;:&quot;2021-12-15T19:46:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-02-02T19:24:32.000000Z&quot;}"
                                        value="6">
                                        USDT - USDT.TRC20
                                    </option>
                                </select>
                                <span class="coin_info"></span>
                                <span class="text-danger error error_currency d-none d-none"></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="amount">Enter Amount <small class="text-muted">USD</small></label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                    placeholder="Enter Amount in USD">
                                <p class="text-danger error error_amount error_coin d-none d-none"></p>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="withdrawal_address">Withdrawal Address</label>
                                <input type="text" class="form-control" name="withdraw_address" id="withdraw_address"
                                    placeholder="Enter valid Withdrawal Address">
                                <p class="text-danger error error_withdraw_address d-none d-none"></p>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="password">Account Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Account Password">
                                <p class="text-danger error error_password d-none d-none"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="text-danger error error_documents error_withdraw_limit d-none"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
