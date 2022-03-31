@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="text-center">
                    <div class="card">
                    <div class="card-body mt-4">
                    <h2>Monday Trade Activation</h2>
                    <i class="bi bi-shield-fill-check text-success" style="font-size: 72px"></i>
                    <h4>Trading is activated for your account</h4>
                    <div class="alert alert-danger mt-4" style="position: inherit; text-align: left !important; width: 100% !important; min-width: 1px">
                    <ul>
                    <li>All Trading on Capital Live are based on UTC TIME.</li>
                    <li>Activation Button will only be available on Monday.</li>
                     <li>If you didn't activate your account trading on monday. You will not be able to receive
                    earnings
                    of that week.
                    </li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
