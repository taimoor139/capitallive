@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Support Tickets</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Submitted By</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td><a href="{{ route('views-ticket', $ticket->id) }}">[Ticket#{{$ticket->ticket_id}}] {{ $ticket->subject }}</a></td>
                                <td><a href="{{ route('view-user', $ticket->user_id) }}">{{ $ticket->users->username ?? '' }}</a></td>
                                <td><span class="{{ ($ticket->status == 0 ? 'text-success' : 'text-danger') }}">{{ ($ticket->status == 0 ? 'Active' : 'Close') }}</span></td>
                                <td>
                                    <button data-id="{{ $ticket->ticket_id }}" type="button" data-toggle="modal" data-target="#DelTicket"
                                            class="btn btn-danger btn-sm my-3 delete-ticket"><i
                                                class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- table end -->
                </div>
                <div class="modal fade" id="DelTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Reply!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this?</strong>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="{{ route('delete-ticket') }}">
                                    @csrf
                                    <input type="text" name="ticket_id" class="ticket_id">
                                    <button type="button" class="btn btn--dark" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn--danger"><i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->

    <script>
        'use strict';
        (function ($) {
            $('.delete-ticket').on('click', function (e) {
                $('.ticket_id').val($(this).data('id'));
            });
        })(jQuery)
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