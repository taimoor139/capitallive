@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-info btn-sm float-right" data-toggle="modal"
                       data-target="#add">
                        Create Withdraw Limit
                    </button>
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Withdrawal Limit</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Limit</th>
                            <th scope="col">Fee(%)</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($limits as $limit)
                                <tr>
                                    <td>{{ $loop->iteration }}<input type="hidden" class="limit_id" value="{{ $limit->id }}"></td>
                                    <td class="coin">{{ $limit->coin }}</td>
                                    <td class="limit">{{ $limit->limit }}</td>
                                    <td class="fee">{{ $limit->fee }}</td>
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
                                    <h4 class="modal-title float-left">Add Withdraw Limit</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <form method="post" action="{{ route('add-withdrawal-limit') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="coin">Coin</label>
                                        <input type="text" class="form-control" name="coin" placeholder="Enter coin name">
                                        <label for="limit">Limit</label>
                                        <input type="number" class="form-control" name="limit" placeholder="Enter withdraw limit">
                                        <label for="fee">Fee</label>
                                        <input type="text" class="form-control" name="fee" placeholder="Enter withdraw fee">
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
                                    <h4 class="modal-title float-left">Update Withdraw Limit</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <form method="post" action="{{ route('update-withdrawal-limit') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="coin">Coin</label>
                                        <input type="text" class="form-control" name="coin" id="coin" placeholder="Enter coin name">
                                        <label for="limit">Limit</label>
                                        <input type="number" class="form-control" name="limit" id="limit" placeholder="Enter withdraw limit">
                                        <label for="fee">Fee</label>
                                        <input type="text" class="form-control" name="fee" id="fee" placeholder="Enter withdraw fee">

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
            var coin = $(this).closest("tr").find('.coin').text();
            var fee = $(this).closest("tr").find('.fee').text();
            var limit = $(this).closest("tr").find('.limit').text();


            $('#limit_id').val(limit_id);
            $('#coin').val(coin);
            $('#fee').val(fee);
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