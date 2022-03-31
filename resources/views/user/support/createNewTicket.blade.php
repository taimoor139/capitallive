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
                    <div class="col-lg-8 p-5">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Open a New Ticket
                                </h5>
                                <form method="post" action="https://tokyosecurities.com/support/new-ticket"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="EorKYtzOG2PIUhc96eqNlYdiKjYYuZcSTQgtNqAt">
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">Category</label>
                                        <select class=" form-control" name="category" id="category">
                                            <option hidden="" value="">Please Select</option>
                                            <option value="1">
                                                Deposit
                                            </option>
                                            <option value="2">
                                                Withdraw
                                            </option>
                                            <option value="3">
                                                Network
                                            </option>
                                            <option value="4">
                                                Others
                                            </option>
                                            <option value="6">
                                                Return Policy Application
                                            </option>
                                            <option value="7">
                                                KYC Approval
                                            </option>
                                            <option value="8">
                                                Ownership Change
                                            </option>
                                            <option value="15">
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
@endsection
