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
                        <h6 class="page-title">Education</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->users->username ?? '' }}</td>
                                <td>{{ date_format($article->created_at ,'d-m-Y')  }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('view-education', $article->id) }}"
                                           class="btn btn-info btn-edit btn-sm">
                                            <i class="fa fa-edit" style="color: white"></i>
                                        </a>
                                        <form action="{{ route('delete-education', $article->id) }}" method="post"
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
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->


    </div><!-- body-wrapper end -->
    <script>

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