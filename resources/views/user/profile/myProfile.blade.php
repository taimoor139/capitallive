@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-wrapper">
            <h5 class="card-title"><i class="bi bi-currency-exchange text-danger"></i> Profile
                {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#new_withdrawal" style="float: right">New Withdrawal
                </button> --}}
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#changeProfilePicture">Change Profile Picture</i></a>
                @include('user.profile.changeProfilePic')
            </h5>
            <div class="content-body">
                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div
                                    class="card-body profile-card pt-4 d-flex flex-column align-items-center border-top-warning border-bottom-warning">
                                    @if(Auth::user()->image)
                                        <img
                                            src="{{url('/uploads/profile_pictures/'.Auth::user()->image)}}"
                                            alt="Profile" class="rounded-circle">
                                    @else
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', Auth::user()->name) }}&amp;color=7F9CF5&amp;background=EBF4FF"
                                            alt="Profile" class="rounded-circle">
                                    @endif
                                    <h2>{{ Auth::user()->name }}</h2>
                                    <h3><b>{{ Auth::user()->username }}</b></h3>
                                    <h3><i class="bi bi-envelope-fill"></i> <a href="/cdn-cgi/l/email-protection"
                                                                               class="__cf_email__"
                                                                               data-cfemail="50313435353c31383d35343d352431616110373d31393c7e333f3d">{{ Auth::user()->email }}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card">
                                <div
                                    class="card-body profile-card pt-2 pb-2 d-flex flex-column border-top-warning border-bottom-warning">
                                    <div class="row">
                                        <div class="col-12 pt-2">
                                            <h6><b>My Rank </b><span style="float:right; font-size: 18px !important;"
                                                                     class="text-danger">{{ Auth::user()->rankAward->title ?? '' }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div
                                                    class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                                                    <b>Left RP</b>
                                                    {{ $points->left_rp ?? 0 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div
                                                    class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                                                    <b>Right RP</b>
                                                    {{ $points->right_rp ?? 0 }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div
                                                    class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                                                    <b>Left BP</b>
                                                    {{ $points->left_bp ?? 0 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div
                                                    class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                                                    <b>Right BP</b>
                                                    {{ $points->right_bp ?? 0 }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body pt-3 border-top-warning border-bottom-warning">
                                    <h5 class="card-title">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label  p-2">Full Name</div>
                                        <div class="col-8 col-lg-9 col-md-8  p-2">{{ Auth::user()->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Username</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2">{{ Auth::user()->username }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Email</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2"><a href="/cdn-cgi/l/email-protection"
                                                                                    class="__cf_email__"
                                                                                    data-cfemail="f9989d9c9c959891949c9d949c8d98c8c8b99e94989095d79a9694">{{ Auth::user()->email }}</a>
                                            <b class='text-success'>Verified<i class='bi bi-check-all text-success'></i></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Phone</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2">{{ Auth::user()->number }} <b
                                                class='text-danger'>unverified<i class='bi bi-x'></i></b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Country</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2">{{ Auth::user()->country }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Tax Country</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2"> {{ Auth::user()->country }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Address</div>
                                        <div class="col-8 col-lg-9 col-md-8 p-2">{{ Auth::user()->address }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Date Of Birth</div>
                                        <div
                                            class="col-8 col-lg-9 col-md-8 p-2">{{ date_format(date_create(Auth::user()->birth), 'M d, Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-lg-3 col-md-4 label p-2">Registered</div>
                                        <div
                                            class="col-8 col-lg-9 col-md-8 p-2">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pt-4">
                                            <i class="bi bi-dot"></i><small class="text-muted"> To change profile
                                                details, please
                                                contact support</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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
