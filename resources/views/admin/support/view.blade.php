@extends('layouts.admin.master')
@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">Support Tickets</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                    <a href="{{ route('all-tickets') }}"
                       class="btn btn-sm btn--dark box--shadow1 text--small"><i class="fa fa-fw fa-backward"></i> Go
                        Back </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            <h6 class="card-title  mb-4">
                                <div class="row">
                                    <div class="col-sm-8 col-md-6">
                                        @if($ticket->status == 0)
                                            <span class="badge badge--success py-1 px-2">Open</span>
                                        @else
                                            <span class="badge badge--danger py-1 px-2">Closed</span>
                                        @endif
                                        [Ticket#{{ $ticket->ticket_id }}] {{ $ticket->subject }}
                                    </div>
                                    <div class="col-sm-4  col-md-6 text-sm-right mt-sm-0 mt-3">

                                        <button class="btn btn--danger btn-sm" type="button" data-toggle="modal"
                                                data-target="#DelModal">
                                            <i class="fa fa-lg fa-times-circle"></i> Close Ticket
                                        </button>
                                    </div>
                                </div>
                            </h6>

                            <form action="{{ route('reply-message', $ticket->ticket_id) }}"
                                  enctype="multipart/form-data" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="3" id="inputMessage"
                                              placeholder="Your Message" spellcheck="false"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputAttachments">Attachments</label>
                                    <div class="file-upload-wrapper" data-text="Select your file!">
                                        <input type="file" name="attachments" id="inputAttachments"
                                               class="file-upload-field">
                                    </div>
                                    <div id="fileUploadsContainer"></div>
                                </div>
                                <div class=" ticket-attachments-message text-muted mt-3">
                                    Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx
                                </div>

                                {{--<button type="button" class="btn btn--dark add-more mt-2"><i class="fa fa-plus"></i>--}}
                                {{--</button>--}}


                                <button class="btn btn--primary btn-block mt-4" type="submit" name="replayTicket"
                                        value="1"><i class="fa fa-fw fa-lg fa-reply"></i> Reply
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    @foreach($ticket->messages as $message)
                    <div class="card">
                        <div class="card-body">
                            <div class="row border border-primary border-radius-3 my-3 mx-2 {{ ($ticket->user_id == $message->user_id ? 'bg--info' : 'bg--success') }}">
                                <div class="col-md-3 border-right text-right">
                                    <h5 class="my-3">{{ $message->users->name ?? '' }}</h5>
                                    <p><a href="{{ route('view-user', $ticket->user_id)  }}">@ {{ $message->users->username ?? '' }}</a>
                                    </p>
                                    <button data-id="{{ $message->id }}" type="button" data-toggle="modal" data-target="#DelMessage"
                                            class="btn btn-danger btn-sm my-3 delete-message"><i
                                                class="fa fa-trash"></i> Delete
                                    </button>
                                </div>

                                <div class="col-md-9">
                                    <p class="text-muted font-weight-bold my-3">
                                        Posted on {{ date_format($message->created_at, 'M d, Y') }} @ {{ date_format($message->created_at, 'H:i A') }}</p>
                                    <p>{{ $message->message }}</p>
                                    @if($message->file)
                                        <a href="{{ route('admin-download-message', $message->file) }}"
                                           target="_blank" class="text-danger fw-bolder">
                                            <img
                                                    src="{{ public_path()."/uploads/ticket_attachments/".$message->file }}"
                                                    class="img-thumbnail ml-3" width="100">
                                            Attached File
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>

            <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Close Support Ticket!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Are you want to Close This Support Ticket?</strong>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="{{ route('closed-ticket', $ticket->ticket_id) }}">
                                @csrf
                                <button type="button" class="btn btn--secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn--success" name="replayTicket" value="2"> Close
                                    Ticket
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="DelMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                            <form method="post" action="{{ route('delete-message') }}">
                                @csrf
                                <input type="hidden" name="message_id" class="message_id">
                                <button type="button" class="btn btn--dark" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn--danger"><i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div><!-- bodywrapper__inner end -->
    </div>

    <script>
        'use strict';
        (function ($) {
            $('.delete-message').on('click', function (e) {
                $('.message_id').val($(this).data('id'));
            });

//            $('.add-more').on('click', function () {
//                $("#fileUploadsContainer").append(`
//                                            <div class="file-upload-wrapper" data-text="Select your file!">
//                                            <input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field"/>
//                                            </div>`)
//            })
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