@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row justify-content-center">
                    <div class="card border-top-warning border-bottom-warning">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-award"></i>Support <a href="{{ route('new-ticket') }}" class="btn btn-warning float-right text-uppercase">New Ticket</a>
                                <br>
                                <small>Open ticket for any issues related to your account. Our team will get back to you soon.</small>
                            </h5>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Ticket ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        @if($ticket->file)
                                            <td>
                                                <a href="{{ route('download-ticket', $ticket->file) }}"
                                                   target="_blank" class="fw-bolder">
                                                    Attached File
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('tickets') }}" class="fw-bolder">
                                                    Attached File
                                                </a>
                                            </td>
                                        @endif

                                        <td>{{ $ticket->category ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('view-ticket',$ticket->ticket_id) }}">{{ $ticket->subject ?? ''}}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('view-ticket',$ticket->ticket_id) }}">{{ $ticket->ticket_id }}</a>
                                        </td>
                                        <td>{{ ($ticket->status == 0 ? "Pending" : "Closed") }}</td>
                                        <td>
                                            {{ $ticket->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
@endsection
