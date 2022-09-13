@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal"
                            data-target="#create">
                        Create Notification
                    </button>
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Notifications</h6>
                    </div>
                    <table id="table" class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Notification</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td class="notification_id">{{ $notification->id }}</td>
                                <td>
                                    @if(strlen($notification->notification) > 25)
                                        {{ substr_replace($notification->notification, '...', 25) }}
                                    @else
                                        {{ $notification->notification }}
                                    @endif
                                    <input type="hidden" class="notification" value="{{ $notification->notification }}">
                                </td>
                                <td>
                                    @if(strlen($notification->description) > 25)
                                        {{ substr_replace($notification->description, '...', 25) }}
                                    @else
                                        {{ $notification->description }}
                                    @endif
                                    <input type="hidden" class="description" value="{{ $notification->description }}">
                                </td>
                                <td>{{ date_format($notification->created_at ,'d-m-Y')  }}</td>
                                <td>

                                    <input type="hidden" class="link" value="{{ $notification->link }}">

                                    <div class="row">
                                        <button type="button" class="btn btn-info btn-edit btn-sm" data-toggle="modal"
                                                data-target="#edit">
                                            <i class="fa fa-edit" style="color: white"></i>
                                        </button>
                                        <form action="{{ route('delete-notification', $notification->id) }}"
                                              method="post" id="delete-form">
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-delete  ml-2">
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
        <div class="modal fade" id="edit" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Edit Notification</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form method="post" action="{{ route('update-notification') }}">
                        @csrf
                        <div class="modal-body">
                            <label for="message">Notification</label>
                            <input class="form-control" type="text" name="message" id="message">
                            <input class="form-control" type="hidden" name="notification_id" id="notification_id">


                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="10" id="description"></textarea>

                            <label for="description">Link</label>
                            <input type="text" class="form-control" name="link" id="link"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="modal fade" id="create" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Create Notification</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form method="post" action="{{ route('create-notification') }}">
                        @csrf
                        <div class="modal-body">
                            <label for="notification">Notification</label>
                            <input class="form-control" type="text" name="notification" id="notification">

                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="10" id="description"></textarea>

                            <label for="description">Link</label>
                            <input type="text" class="form-control" name="link" id="link"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div><!-- body-wrapper end -->
    <script>
        $(".btn-edit").click(function () {
            var notification = $(this).closest("tr").find('input.notification').val();
            var notification_id = $(this).closest("tr").find('td.notification_id').first().text();
            var description = $(this).closest("tr").find('input.description').val();
            var link = $(this).closest("tr").find('input.link').val();

            $('#message').val(notification);
            $('#notification_id').val(notification_id);
            $('#description').val(description);
            $('#link').val(link);
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