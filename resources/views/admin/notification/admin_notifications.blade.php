@extends('layouts.admin.master')

@section('content')
    <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token">
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Notifications</h6>
                    </div>
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">Notification</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>
                                    @if($notification->type == 2)
                                        <a href="{{ ($notification->ticket_id ? route('views-ticket',[$notification->ticket_id]) : route('all-tickets')) }}">
                                            <span class="text-info">{{ $notification->description }}</span>
                                        </a>
                                    @elseif($notification->type == 3)
                                        <a href="{{ route('documents') }}">
                                            <span class="text-info">{{ $notification->description }}</span>
                                        </a>
                                    @endif
                                </td>
                                <td>{{ date_format($notification->created_at ,'d-m-Y')  }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- bodywrapper__inner end -->

    </div><!-- body-wrapper end -->
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
    <script>
        $(document).ready(function () {
            var _token = $('#_token').val()
            $.ajax({
                url: '{{ route("updateNotificationStatus") }}',
                type: "POST",
                data: {_token: _token},
                success: function () {
                }
            });
        })
    </script>
@endsection
