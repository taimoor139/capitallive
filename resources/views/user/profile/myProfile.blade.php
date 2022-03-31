@extends('layouts.user.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section class="section profile">
                <div class="row">
                <div class="col-xl-4">
                <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center border-top-warning border-bottom-warning">
                <img src="https://ui-avatars.com/api/?name=Adeel+Ahmed&amp;color=7F9CF5&amp;background=EBF4FF" alt="Profile" class="rounded-circle">
                <h2>{{ Auth::user()->name }}</h2>
                <h3><b>{{ Auth::user()->username }}</b></h3>
                <h3><i class="bi bi-envelope-fill"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="50313435353c31383d35343d352431616110373d31393c7e333f3d">[email&#160;protected]</a></h3>
                </div>
                </div>
                <div class="card">
                <div class="card-body profile-card pt-2 pb-2 d-flex flex-column border-top-warning border-bottom-warning">
                <div class="row">
                <div class="col-12 pt-2">
                <h6><b>My Rank </b><span style="float:right; font-size: 18px !important;" class="text-danger">Partner</span></h6>
                </div>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                <div class="row">
                <div class="col-6">
                <div class="card">
                <div class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                <b>Left RP</b>
                25510
                </div>
                </div>
                </div>
                <div class="col-6">
                <div class="card">
                <div class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                <b>Right RP</b>
                0
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
                <div class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                <b>Left BP</b>
                12755
                </div>
                </div>
                </div>
                <div class="col-6">
                <div class="card">
                <div class="card-body profile-card pt-3 d-flex flex-column border-top-warning border-bottom-warning">
                <b>Right BP</b>
                0
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
                <div class="col-8 col-lg-9 col-md-8  p-2">Adeel Ahmed</div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Username</div>
                <div class="col-8 col-lg-9 col-md-8 p-2">Adeel1</div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Email</div>
                 <div class="col-8 col-lg-9 col-md-8 p-2"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f9989d9c9c959891949c9d949c8d98c8c8b99e94989095d79a9694">[email&#160;protected]</a> <b class='text-success'>Verified<i class='bi bi-check-all text-success'></i></b></div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Phone</div>
                <div class="col-8 col-lg-9 col-md-8 p-2">+923224689000 <b class='text-danger'>unverified<i class='bi bi-x'></i></b></div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Country</div>
                <div class="col-8 col-lg-9 col-md-8 p-2"><img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag"> Pakistan
                </div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Tax Country</div>
                <div class="col-8 col-lg-9 col-md-8 p-2"><img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag"> Pakistan</div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Address</div>
                <div class="col-8 col-lg-9 col-md-8 p-2">House#35-H,muhalla canal berg multan road,lahore</div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Date Of Birth</div>
                <div class="col-8 col-lg-9 col-md-8 p-2">November 24, 1991</div>
                </div>
                <div class="row">
                <div class="col-4 col-lg-3 col-md-4 label p-2">Registered</div>
                <div class="col-8 col-lg-9 col-md-8 p-2">January 16, 2022</div>
                </div>
                <div class="row">
                <div class="col-12 pt-4">
                <i class="bi bi-dot"></i><small class="text-muted"> To change profile details, please
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
@endsection
