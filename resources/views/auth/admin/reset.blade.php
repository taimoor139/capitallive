@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">Password Setting</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                    <a href="{{ route('view-profile') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="fa fa-user"></i>Profile Setting</a>
                </div>
            </div>

            <div class="row mb-none-30">
                <div class="col-lg-3 col-md-3 mb-30">
                    <div class="card b-radius--5 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="d-flex p-3 bg--primary align-items-center">
                                <div class="avatar avatar--lg">

                                    @if(Auth::user()->image)

                                        <img src="/uploads/profile_pictures/{{Auth::user()->image}}"
                                             alt="Image">
                                    @else

                                        <img src="https://script.viserlab.com/bisurv/assets/images/avatar.png"
                                             alt="Image">
                                    @endif
                                </div>
                                <div class="pl-3">
                                    <h4 class="text--white">{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Name <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Username <span class="font-weight-bold">{{ Auth::user()->username }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Email <span class="font-weight-bold">{{ Auth::user()->email }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 mb-30">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-50 border-bottom pb-2">Change Password</h5>

                            <form action="{{ route('update-admin-password') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" type="password" placeholder="Password" name="current_password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" placeholder="New Password" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn btn--primary btn-block btn-lg">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- bodywrapper__inner end -->
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