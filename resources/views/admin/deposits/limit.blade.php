@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-info btn-sm float-right" data-toggle="modal"
                            data-target="#add">
                        Create Deposit Limit
                    </button>
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Deposit Limit</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Limit</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($limits as $limit)
                            <tr>
                                <td>{{ $loop->iteration }}<input type="hidden" class="limit_id" value="{{$limit->id}}"></td>
                                <td class="account_type">{{ $limit->account_type }}</td>
                                <td class="limit">{{ $limit->limit }}</td>
                                <td>{{ date_format($limit->created_at, 'd-m-Y') }}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="btn btn-info btn-edit btn-sm" data-toggle="modal"
                                                data-target="#edit">
                                            <i class="fa fa-edit" style="color: white"></i></button>
                                        <form action="{{ route('delete-document', $limit->id) }}" method="post"
                                              id="delete-form">
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-delete ml-2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- table end -->
                    <div class="modal fade" id="add" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title float-left">Add Deposit Limit</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <form method="post" action="{{ route('add-deposit-limit') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="coin">Account Type</label>
                                        <input type="text" class="form-control" name="account_type" placeholder="Enter Account Type">
                                        <label for="limit">Limit</label>
                                        <input type="number" class="form-control" name="limit" placeholder="Enter deposit limit">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="edit" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title float-left">Update Deposit Limit</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <form method="post" action="{{ route('update-deposit-limit') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="coin">Account Type</label>
                                        <input type="text" class="form-control" name="account_type" id="account_type" placeholder="Enter account type">
                                        <label for="limit">Limit</label>
                                        <input type="number" class="form-control" name="limit" id="limit" placeholder="Enter Deposit limit">

                                        <input type="hidden" name="limit_id" id="limit_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->


    </div><!-- body-wrapper end -->
    <script>
        $(".btn-edit").click(function () {
            var limit_id = $(this).closest("tr").find('.limit_id').val();
            var account_type = $(this).closest("tr").find('.account_type').text();
            var limit = $(this).closest("tr").find('.limit').text();

            $('#limit_id').val(limit_id);
            $('#account_type').val(account_type);
            $('#limit').val(limit);
        });
        $(".btn-delete").click(function () {
            if (confirm("Are you sure you want to delete this?")) {
                $("#delete-form").submit();
            } else {
                return false;
            }
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