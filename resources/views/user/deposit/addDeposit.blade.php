<div class="modal fade" id="addDeposit" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  border-top-warning border-bottom-warning">
            
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-currency-exchange text-primary"></i> Make New Deposit</h5>
                
                {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                <span id="deposit-warning" class="alert-danger"></span>
            </div>
           
            
            <form id="depositForm">
                <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Account Type</label>
                                <select class="form-control" name="accountType" id="account_type">
                                    <option hidden value="">Please Select</option>
                                    @foreach($depositTypes as $type)
                                        <option value="{{ $type->id }}"> {{ $type->account_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error error_account_type d-none d-none"></span>
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <select class="form-control" name="currency" id="currency">
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
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="amount">Enter Amount
                                    <small class="text-muted">USD</small>
                                </label>
                                <input type="number" class="form-control" name="amount" id="amount"
                                       placeholder="Enter USD">
                                <p class="text-danger error error_amount error_coin d-none d-none"></p>
                                <span id="amount-warning" class="alert-warning"></span>
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
<script>
    var _token = $('#_token').val();
    var limit = 0;
    $('#account_type').change(function () {

        var amount = $('#amount').val();
        var accountType = $(this).val();

        $.ajax({
            url:"{{ route('account-type') }}",
            type:'POST',
            data:{accountType:accountType,_token:_token },
            success:function(response){
                limit = response['limit']
                if (amount < limit) {
                    $('#amount-warning').html('The amount must be at least '+ limit +'.');
                    $('.processBtn').prop('disabled', true);
                } else if(amount > limit){
                    $('.processBtn').prop('disabled', false);
                }
                else {
                    $('.processBtn').prop('disabled', false);
                }
            }
        })
    });


    $('#amount').keyup(function () {
        var amount = $(this).val();
        var accountType = $('#account_type').val();
        if (!accountType) {
            $('.processBtn').prop('disabled', true);
        } else if (amount < limit) {
            $('#amount-warning').html('The amount must be at least '+limit+'.')
            $('.processBtn').prop('disabled', true);
        } else {
            $('#amount-warning').html('');
            $('.processBtn').prop('disabled', false);
        }
    });

    $('#depositForm').on('submit', function (e) {
        e.preventDefault();
        $('.processBtn').prop('disabled', true);

        var amount = $('#amount').val();
        var currency = $('#currency').val();
        var accountType = $('#account_type').val();
        var _token = $('#_token').val();
        if(accountType && currency && accountType){
            $.ajax({
                url: "{{ route('deposit-store') }}",
                type: "POST",
                data: {
                    _token: _token,
                    amount: amount,
                    currency: currency,
                    accountType: accountType
                },
                beforeSend: function(){
                    $('.loader').show()
                },
                complete: function(){
                    $('.loader').hide();
                },
                success: function (response) {
                    console.log(response)
                    if (response) {
                        window.open(response);
                        location.reload();
                    } else {
                        $('#deposit-warning').html('Something went Wrong!');
                        setTimeout(function () {
                            location.reload();
                        }, 5000);
                    }
                }
            })
        } else {
            $('#deposit-warning').html('Please fill all fields!')
        }
    });

</script>
