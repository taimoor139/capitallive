@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card border-top-warning border-bottom-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-journal-plus"></i> Forex Education</h5>
                        <div class="alert-danger p-3">
                            <strong>No Education Available!</strong> No Educational articles available currently for your
                            region.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
