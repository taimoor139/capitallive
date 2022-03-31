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
                        <h5 class="card-title"><i class="bi bi-cloud-download-fill"></i> Downloads</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">File Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">T-S Affidavit(Official)</td>
                                    <td class="text-center"><a
                                            href="https://tokyostorage.s3.us-east-2.amazonaws.com/pdf/VrsVfH8I4k628zfHho0OzrNrNoxwiSrCHXsNuHnS.pdf">Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">T-S Return Policy(Only for New Members)</td>
                                    <td class="text-center"><a
                                            href="https://tokyostorage.s3.us-east-2.amazonaws.com/pdf/10AdRElX5Gzn90WvWTfEz6I1Lf5NfxRDZh7KL775.pdf">Download</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
