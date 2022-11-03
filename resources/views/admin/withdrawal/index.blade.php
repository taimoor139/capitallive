@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">{{ $pageTitle }}</h6>
                </div>
                <button type="button" class="btn btn-info btn-edit btn-lg float-left" data-toggle="modal"
                        data-target="#mass_withdrawal" style="display: none" id="mass_status_change">Change Status</button>
            </div>
            <div class="select-all-withdraw">
                <input type="checkbox" id="checkAll">
                                                Select All
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card b-radius--10">
                        <div class="card-body p-0">
                            <div class="table-responsive--sm table-responsive">
                                <table id="accountTable" class="table table--light style--two">
                                    <thead>
                                    <tr>
                                        <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                                Select All
                                        </th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Wallet Address</th>
                                        <th scope="col">Amount</th>
{{--                                        <th scope="col">Time</th>--}}
                                        <th scope="col">Status</th>
                                        <th scope="col">Withdraw Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td><input type="checkbox" name="mass_user_id" value="{{ $withdrawal->id }}" id="mass_withdraw" class="mass_withdraw"></td>
                                            <td class="withdraw_id">{{ $withdrawal->id }}</td>
                                            <td><a href="{{ route('view-user', $withdrawal->userId) }}">{{ $withdrawal->user->name }}</a></td>
                                            <td>{{ $withdrawal->withdraw_address }}</td>
{{--                                            <td > N/A</td>--}}
                                            <td>{{ $withdrawal->amount }} $</td>
{{--                                            <td>N/A</td>--}}
                                            <td data-label="Status">
                                                @if($withdrawal->status == 1)
                                                    <span class="badge badge--info">Approved</span>
                                                @elseif($withdrawal->status == 0)
                                                    <span class="badge badge--warning">Pending</span>
                                                @elseif($withdrawal->status == 2)
                                                    <span class="badge badge--warning">Pending</span>
                                                @elseif($withdrawal->status == 100)
                                                    <span class="badge badge--success">Successful</span>
                                                @elseif($withdrawal->status == -1)
                                                    <span class="badge badge--danger">Rejected</span>
                                                @endif

                                            </td>
                                            <td data-label="Status">
                                                @if($withdrawal->withdraw_status)
                                                    <span class="badge badge--info">{{ $withdrawal->withdraw_status }}</span>
                                                @else
                                                    <span class="badge badge--danger">Not Processed</span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="row">
                                                    <button type="button" class="btn btn-info btn-edit btn-sm" data-toggle="modal"
                                                            data-target="#edit">
                                                        <i class="fa fa-edit" style="color: white"></i>
                                                    </button>
                                                    <form action="{{ route('delete-withdrawal', $withdrawal->id) }}"
                                                          method="post" id="delete-form">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm btn-delete  ml-2">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table><!-- table end -->
                            </div>
                        </div>
                        <div class="modal fade" id="edit" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title float-left">Edit Withdrawal</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <form method="post" action="{{ route('update-withdrawal') }}">
                                        @csrf
                                        <input type="hidden" name="withdrawal_id" id="withdrawal_id">
                                        <div class="modal-body">
                                            <label for="message">Status</label>
                                            <select class="form-control" name="status">
                                                <option>Select Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Approved</option>
                                                <option value="100">Successful</option>
                                                <option value="-1">Rejected</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="mass_withdrawal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title float-left">Edit Withdrawal</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <form method="post" action="{{ route('update-mass-withdrawal') }}">
                                        @csrf
                                        <input type="hidden" name="withdrawal_ids" id="withdrawal_ids">
                                        <div class="modal-body">
                                            <label for="message">Status</label>
                                            <select class="form-control" name="status">
                                                <option>Select Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Approved</option>
                                                <option value="100">Successful</option>
                                                <option value="-1">Rejected</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div><!-- card end -->
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->
    </div>
    <script>
        $("#checkAll").click(function () {
            if($('input:checkbox').not(this).prop('checked', this.checked)){
                $('#mass_status_change').css('display', 'block');
            }
            if($(this).prop('checked') == false){
                $('#mass_status_change').css('display', 'none');
            }
        });
        $(".btn-edit").click(function () {
            var withdrawal_id = $(this).closest("tr").find('td.withdraw_id').first().text();

            $('#withdrawal_id').val(withdrawal_id);
        });

        $(".btn-delete").click(function () {
            if (confirm("Are you sure you want to delete this?")) {
                $("#delete-form").submit();
            } else {
                return false;
            }
        });

        $('.mass_withdraw').click(function(){
            if($(this).is(":checked")){
                $('#mass_status_change').css('display', 'block');
            } else {
               let val = [];
                $(':checkbox:checked').each(function(i){
                   val[i] = i + 1;
                });
                if(val.length <= 0){
                    $('#mass_status_change').css('display', 'none');
                }
            }

        });
        $('#mass_status_change').click(function(){
            var ids = []
            $(':checkbox:checked').each(function(i){
                ids[i] = $(this).val();
            });
            $('#withdrawal_ids').val(ids);
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
