@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('create-education') }}" class="btn btn-info btn-sm float-right">
                        Create Education
                    </a>
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Documents</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Document</th>
                            <th scope="col">Uploaded By</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ url('uploads/kyc/'.$document->user_id.'/'.$document->document_file) }}">{{ $document->document }}</a>
                                </td>
                                <td>{{ $document->user->username ?? '' }}</td>
                                <td style="display: none" class="document_id"> {{$document->id}}</td>
                                <td class="status">@if($document->status == - 1)
                                        <small class="drop-zone__prompt text-danger">Not Approved
                                        </small>
                                    @elseif($document->status == 0)
                                        <small class="drop-zone__prompt text-success">Submitted
                                        </small>
                                    @elseif($document->status == 1)
                                        <small class="drop-zone__prompt text-success">Approved
                                        </small>
                                    @endif</td>
                                <td>{{ date_format($document->created_at ,'d-m-Y')  }}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="btn btn-info btn-edit btn-sm" data-toggle="modal"
                                                data-target="#edit">
                                            <i class="fa fa-edit" style="color: white"></i>
                                            <form action="{{ route('delete-document', $document->id) }}" method="post"
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
                    <div class="modal fade" id="edit" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title float-left">Update Status</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <form method="post" action="{{ route('update-document-status') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="message">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="-1">Not Approved</option>
                                            <option value="0">Submitted</option>
                                            <option value="1">Approved</option>
                                        </select>
                                        <input type="hidden" name="document_id" id="document_id">
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
            var document_id = $(this).closest("tr").find('.document_id').text();
            $('#document_id').val(document_id);
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