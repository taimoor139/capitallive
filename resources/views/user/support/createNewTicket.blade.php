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
                    <div class="col-lg-8 ">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Open a New Ticket
                                </h5>
                                <form method="post" action="{{ route('create-ticket') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">Category</label>
                                        <select class=" form-control" name="category" id="category">
                                            <option hidden="" value="">Please Select</option>
                                            <option value="Deposit">
                                                Deposit
                                            </option>
                                            <option value="Withdraw">
                                                Withdraw
                                            </option>
                                            <option value="Network">
                                                Network
                                            </option>
                                            <option value="Others">
                                                Others
                                            </option>
                                            <option value="Return Policy Application">
                                                Return Policy Application
                                            </option>
                                            <option value="KYC Approval">
                                                KYC Approval
                                            </option>
                                            <option value="Ownership Change">
                                                Ownership Change
                                            </option>
                                            <option value="Queries">
                                                Queries
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">Subject</label>
                                        <input type="text" name="subject" class="form-control count-words" value="" max="50"
                                            maxlength="50">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">Message</label>
                                        <textarea rows="5" class="form-control" name="message"></textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">File</label>
                                        <input class="form-control" name="ticket_document" type="file"
                                            id="ticket_document">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">
                                            Open New Ticket
                                        </button>
                                    </div>
                                </form>
                            </div>
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
