@extends('layouts.user.master')
@section('content')
    <style>
        .my-msg-box-msg {
            background-color: rgb(196, 248, 214);
            border-radius: 8px;
            padding: 15px;
            margin-top: 2.5rem !important;
            color: #0C102A;
        }

        .my-msg-box-msg2 {
            background-color: dodgerblue;
            border-radius: 8px;
            padding: 15px;
            margin-top: 2.5rem !important;
            color: #0C102A;
        }
    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 text-uppercase fw-bolder">
                                        <h5 class="card-title pb-0">{{ $ticket->category }} <span
                                                class="text-warning">|</span>
                                            {{ $ticket->id }}</h5>
                                        <span class="text-muted">
                                            Ticket # {{ $ticket->ticket_id }} <span class="text-warning">|</span>
                                            Status: {{ ($ticket->status == 0 ? "pending" : "close") }} <span
                                                class="text-warning">|</span>
                                            {{ date_format($ticket->created_at, 'M d, Y') }}
                                        </span>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end align-items-end">
                                        <form method="post"
                                              action="{{ route('close-ticket', $ticket->ticket_id) }}">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Close Ticket</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-box">
                                    <div class="main-box-content d-flex mt-1">
                                        <div class="main-box-content-icon">
                                            <img
                                                src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', Auth::user()->name) }}&amp;color=7F9CF5&amp;background=EBF4FF"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="main-box-content-name p-1">
                                            <h6 class="m-0">{{ Auth::user()->name}}</h6>
                                            <span>{{ date_format($ticket->created_at, 'M d, Y') }} ,
                                                <?php
                                                $datetime1 = new DateTime($ticket->created_at);
                                                $datetime2 = new DateTime(date('Y-m-d H:i:s'));
                                                $interval = $datetime1->diff($datetime2);

                                                if ($interval->format('%Y') > 0) {
                                                    echo $interval->format('%Y years');
                                                } else if ($interval->format('%Y') == 0 && $interval->format('%m') > 0) {
                                                    echo $interval->format('%m months');
                                                } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') > 0) {
                                                    echo $interval->format('%d days');
                                                } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') > 0) {
                                                    echo $interval->format('%H hours');
                                                } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') == 0 && $interval->format('%i') > 0) {
                                                    echo $interval->format('%i minutes');
                                                } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') == 0 && $interval->format('%i') == 0 && $interval->format('%s') > 0) {
                                                    echo $interval->format('%s seconds');
                                                } else {
                                                    echo '0 seconds';
                                                }
                                                ?> ago

                                            </span>
                                            <div class="main-box-content-msg pt-3">
                                                <p>{{ $ticket->subject }}</p>
                                            </div>
                                            @if($ticket->file)
                                                <a href="{{ route('download-ticket', $ticket->file) }}"
                                                   target="_blank" class="text-danger fw-bolder">
                                                    <img
                                                        src="{{ public_path()."/uploads/".$ticket->file }}"
                                                        class="img-thumbnail ml-3" width="100">
                                                    Attached File
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title pb-0">Message History</h5>
                                <hr>
                                <div class="msg-box">
                                    @if($ticket->messages)
                                        @foreach($ticket->messages as $message)
                                            <div
                                                class="my-msg-box d-flex {{ ($message->user_id == Auth::user()->id ? "flex-row-reverse" : "") }} pt-xl-0 pt-lg-0 pt-md-0 pt-4">
                                                <div class="my-msg-box-icon">
                                                    <img
                                                        src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $message->user_name) }}&amp;color=7F9CF5&amp;background=EBF4FF"
                                                        class="rounded-circle" alt="">
                                                </div>
                                                <div class="my-msg-box-name p-1">
                                                    <h6 class="m-0">{{ $message->user_name }}</h6>
                                                    <span>{{ date_format($message->created_at, 'M d, Y') }} ,
                                                <?php
                                                        $datetime1 = new DateTime($message->created_at);
                                                        $datetime2 = new DateTime(date('Y-m-d H:i:s'));
                                                        $interval = $datetime1->diff($datetime2);

                                                        if ($interval->format('%Y') > 0) {
                                                            echo $interval->format('%Y years');
                                                        } else if ($interval->format('%Y') == 0 && $interval->format('%m') > 0) {
                                                            echo $interval->format('%m months');
                                                        } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') > 0) {
                                                            echo $interval->format('%d days');
                                                        } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') > 0) {
                                                            echo $interval->format('%H hours');
                                                        } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') == 0 && $interval->format('%i') > 0) {
                                                            echo $interval->format('%i minutes');
                                                        } else if ($interval->format('%Y') == 0 && $interval->format('%m') == 0 && $interval->format('%d') == 0 && $interval->format('%H') == 0 && $interval->format('%i') == 0 && $interval->format('%s') > 0) {
                                                            echo $interval->format('%s seconds');
                                                        } else {
                                                            echo '0 seconds';
                                                        }
                                                        ?> ago</span>
                                                    <div
                                                        class="{{ ($message->user_id == Auth::user()->id ? "my-msg-box-msg" : "my-msg-box-msg2") }} mt-1">
                                                        {{ $message->message }}
                                                    </div>
                                                    @if($message->file)
                                                        <a href="{{ route('download-message', $message->file) }}"
                                                           target="_blank" class="text-danger fw-bolder">
                                                            <img
                                                                src="{{ public_path()."/uploads/ticket_attachments/".$message->file }}"
                                                                class="img-thumbnail ml-3" width="100">
                                                            Attached File
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($ticket->status == 0)
                        <div class="col-lg-12 ">
                            <div class="card border-top-warning border-bottom-warning">
                                <div class="card-body pt-2">
                                    <form method="post" enctype="multipart/form-data"
                                          action="{{ route('reply-ticket', $ticket->ticket_id) }}">
                                        @csrf
                                        <div class="msg-box">
                                            <div class="form-floating">
                                <textarea placeholder="Type A New Message" rows="5" class="form-control" name="message"
                                          id="floatingTextarea" style="height: 100px;"></textarea>
                                                <label for="floatingTextarea">Type A New Message</label>
                                            </div>
                                            <input class="form-control mt-3" type="file" name="attachments">
                                            <br>
                                            <button class="btn btn-warning mt-3">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
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
