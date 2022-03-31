@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">


                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-20">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">0</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> <b>LEFT</b>
                                    <small>Referrals</small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-20">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">0</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> <b>RIGHT</b>
                                    <small>Referrals</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="main-box">
                                        <div class="main-box-content d-flex justify-content-between">
                                            <div class="left d-flex">
                                                <div class="main-box-content-icon">
                                                    <i class="bi bi-link-45deg text-danger"></i>
                                                </div>
                                                <div class="main-box-content-name">
                                                    <h6 class="m-0">Referral Link</h6>
                                                    <a href="#"
                                                        class="text-primary text-decoration-underline copyBtn">https://tokyosecurities.com/register/Adeel1</a>
                                                </div>
                                            </div>
                                            <div class="copy-btn mt-2">
                                                <button class="btn btn-sm btn-outline-warning copy_btn"
                                                    data-clipboard-text="https://tokyosecurities.com/register/Adeel1">Copy
                                                    Link</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="main-box">
                                        <form method="post" class="m-0"
                                            action="https://tokyosecurities.com/referral/set-position">
                                            <div class="main-box-content d-flex justify-content-between">
                                                <input type="hidden" name="_token"
                                                    value="8Ac8sEpFAkT42hNsxtuPeusexEey6h8RFZgYPKTd">
                                                <div class="d-flex">
                                                    <div class="main-box-content-icon">
                                                        <i class="bi bi-link-45deg text-danger"></i>
                                                    </div>
                                                    <div class="main-box-content-name">
                                                        <h6 class="m-0">Position</h6>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="position" value="LEFT" id="positionLEFT"
                                                                        checked>
                                                                    <label class="form-check-label"
                                                                        for="positionLEFT">LEFT</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input " type="radio"
                                                                        name="position" value="RIGHT" id="positionRIGHT">
                                                                    <label class="form-check-label"
                                                                        for="positionRIGHT">RIGHT</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="copy-btn mt-2">
                                                    <button class="btn btn-sm btn-warning">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top-warning">
                        <h4 class="card-title">Direct Sponsors</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center">NO DATA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
