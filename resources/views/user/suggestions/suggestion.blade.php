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
                                    Suggestion
                                </h5>
                                <form method="post" action="https://tokyosecurities.com/suggestion"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="EorKYtzOG2PIUhc96eqNlYdiKjYYuZcSTQgtNqAt">
                                    <div class="col-12 mt-2">
                                        <label for="inputEmail4">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                            value="">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="description">Description</label>
                                        <textarea rows="5" class="form-control" name="description" placeholder="Enter Description"
                                            id="description"></textarea>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">
                                            Submit
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
