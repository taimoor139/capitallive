@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Earning Charts</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Return on Investment</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($charts as $chart)
                            <tr>
                                <td class="type">{{ $chart->deposit_type }}</td>
                                <td class="roi">{{ $chart->roi }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm btn-edit" data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Modal Header</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form method="post" action="{{ route('update-roi') }}">
                        @csrf
                        <div class="modal-body">
                            <label for="roi">Return on Investment</label>
                            <input class="form-control" type="text" name="roi" id="roi">
                            <input class="form-control" type="hidden" name="type" id="type">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div><!-- body-wrapper end -->
    <script>
        $(".btn-edit").click(function () {
            var type = $(this).closest("tr").find('td.type').first().text();
            var roi = $(this).closest("tr").find('td.roi').first().text();

            $('.modal-title').html(type);
            $('#roi').val(roi);
            $('#type').val(type);
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