<div class="modal fade" id="addDeposit" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  border-top-warning border-bottom-warning">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-currency-exchange text-primary"></i> Make New Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('deposit-store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Account Type</label>
                                <select class="form-control" name="accountType" id="account_type">
                                    <option hidden value="">Please Select</option>
                                    <option value="1"> 3x Factor
                                    </option>
                                    <option value="2"> 2x Level
                                    </option>
                                    <option value="4"> 3X Level
                                    </option>
                                </select>
                                <span class="text-danger error error_account_type d-none d-none"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <select class="form-control" name="currency" id="currency">
                                    <option hidden value="">Please Select</option>
                                    <option value="1">
                                        BTC - BTC
                                    </option>
                                    <option value="3">
                                        BNB - BNB
                                    </option>
                                    <option value="4">
                                        XRP - XRP
                                    </option>
                                    <option value="6">
                                        USDT - USDT.TRC20
                                    </option>
                                </select>
                                <span class="text-danger error error_currency d-none d-none"></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="amount">Enter Amount <small class="text-muted">USD</small></label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                    placeholder="Enter USD">
                                <p class="text-danger error error_amount error_coin d-none d-none"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
