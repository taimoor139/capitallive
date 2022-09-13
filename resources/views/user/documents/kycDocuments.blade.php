@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" enctype="multipart/form-data"
                                  action="{{ route('document-verify') }}">
                                @csrf
                                <div class="card pt-4 border-top-warning border-bottom-warning">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 align-items-center flex-xl-row">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="select-title">
                                                            <span class="mb-0 text-capitalize">ID Document Front</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <option disabled>ID Card</option>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($idCardFront)
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    @if($idCardFront->status == - 1)
                                                        <small class="drop-zone__prompt text-danger">Not Approved
                                                        </small>
                                                        <input type="file" name="id_card_front" id="id_card_front">
                                                    @elseif($idCardFront->status == 0)
                                                        <small class="drop-zone__prompt text-success">Submitted
                                                        </small>
                                                    @elseif($idCardFront->status == 1)
                                                        <small class="drop-zone__prompt text-success">Approved
                                                        </small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    <input type="file" name="id_card_front" id="id_card_front" required>
                                                </div>
                                            @endif
                                            <div class="col-md-4 align-items-center flex-xl-row">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="select-title">
                                                            <span class="mb-0 text-capitalize">ID Document back</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <option disabled>ID Card</option>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($idCardBack)
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    @if($idCardBack->status == - 1)
                                                        <small class="drop-zone__prompt text-danger">Not Approved
                                                        </small>
                                                        <input type="file" name="id_card_back" id="id_card_back">
                                                    @elseif($idCardBack->status == 0)
                                                        <small class="drop-zone__prompt text-success">Submitted
                                                        </small>
                                                    @elseif($idCardBack->status == 1)
                                                        <small class="drop-zone__prompt text-success">Approved
                                                        </small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    <input type="file" name="id_card_back" id="id_card_back" required>
                                                </div>
                                            @endif
                                        </div>
                                        @if(!$idCardFront || !$idCardBack || $idCardFront->status == - 1 || $idCardBack->status == - 1)
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--<div class="col-lg-12">-->
                        <!--    <form method="post" enctype="multipart/form-data"-->
                        <!--          action="{{ route('document-verify') }}">-->
                        <!--        @csrf-->
                        <!--        <div class="card pt-4 border-top-warning border-bottom-warning">-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="row align-items-center">-->
                        <!--                    <div class="col-md-4 align-items-center flex-xl-row">-->
                        <!--                        <div class="row d-flex align-items-center">-->
                        <!--                            <div class="col-xl-5 col-lg-12 col-md-12 col-12">-->
                        <!--                                <div class="select-title">-->
                        <!--                                    <span-->
                        <!--                                        class="mb-0 text-capitalize">Proof of Residence </span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-xl-7 col-lg-12 col-md-12 col-12">-->
                        <!--                                <option disabled>Utility Bill</option>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    @if($proofOfResidence)-->
                        <!--                        <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">-->
                        <!--                            @if($proofOfResidence->status == - 1)-->
                        <!--                                <small class="drop-zone__prompt text-danger">Not Approved-->
                        <!--                                </small>-->
                        <!--                                <input type="file" name="residence" id="residence">-->
                        <!--                            @elseif($proofOfResidence->status == 0)-->
                        <!--                                <small class="drop-zone__prompt text-success">Submitted-->
                        <!--                                </small>-->
                        <!--                            @elseif($proofOfResidence->status == 1)-->
                        <!--                                <small class="drop-zone__prompt text-success">Approved-->
                        <!--                                </small>-->
                        <!--                            @endif-->
                        <!--                        </div>-->
                        <!--                    @else-->
                        <!--                        <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">-->
                        <!--                            <input type="file" name="residence" id="residence"-->
                        <!--                                   required>-->
                        <!--                        </div>-->
                        <!--                    @endif-->
                        <!--                </div>-->
                        <!--                @if(!$proofOfResidence || $proofOfResidence->status == - 1)-->
                        <!--                    <br>-->
                        <!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
                        <!--                @endif-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                        <div class="col-lg-12">
                            <form method="post" enctype="multipart/form-data"
                                  action="{{ route('document-verify') }}">
                                @csrf
                                <div class="card pt-4 border-top-warning border-bottom-warning">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 align-items-center flex-xl-row">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="select-title">
                                                            <span class="mb-0 text-capitalize">Agreement </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <option disabled>Affidavit</option>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($affidavit)
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    @if($affidavit->status == - 1)
                                                        <small class="drop-zone__prompt text-danger">Not Approved
                                                        </small>
                                                        <input type="file" name="affidavit" id="affidavit">
                                                    @elseif($affidavit->status == 0)
                                                        <small class="drop-zone__prompt text-success">Submitted
                                                        </small>
                                                    @elseif($affidavit->status == 1)
                                                        <small class="drop-zone__prompt text-success">Approved
                                                        </small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">
                                                    <input type="file" name="affidavit" id="affidavit" required>
                                                </div>
                                            @endif
                                        </div>
                                        @if(!$affidavit || $affidavit->status == - 1)
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--<div class="col-lg-12">-->
                        <!--    <form method="post" enctype="multipart/form-data"-->
                        <!--          action="{{ route('document-verify') }}">-->
                        <!--        @csrf-->
                        <!--        <div class="card pt-4 border-top-warning border-bottom-warning">-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="row align-items-center">-->
                        <!--                    <div class="col-md-4 align-items-center flex-xl-row">-->
                        <!--                        <div class="row d-flex align-items-center">-->
                        <!--                            <div class="col-xl-5 col-lg-12 col-md-12 col-12">-->
                        <!--                                <div class="select-title">-->
                        <!--                                    <span-->
                        <!--                                        class="mb-0 text-capitalize">Selfie with Agreement </span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-xl-7 col-lg-12 col-md-12 col-12">-->
                        <!--                                <option disabled>Selfie with Affidavit</option>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    @if($affidavitSelfie)-->
                        <!--                        <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">-->
                        <!--                            @if($affidavitSelfie->status == - 1)-->
                        <!--                                <small class="drop-zone__prompt text-danger">Not Approved-->
                        <!--                                </small>-->
                        <!--                                <input type="file" name="affidavit_selfie" id="affidavit_selfie">-->
                        <!--                            @elseif($affidavitSelfie->status == 0)-->
                        <!--                                <small class="drop-zone__prompt text-success">Submitted-->
                        <!--                                </small>-->
                        <!--                            @elseif($affidavitSelfie->status == 1)-->
                        <!--                                <small class="drop-zone__prompt text-success">Approved-->
                        <!--                                </small>-->
                        <!--                            @endif-->
                        <!--                        </div>-->
                        <!--                    @else-->
                        <!--                        <div class="col-md-8 pt-4 pt-xl-0 pt-md-0 align-items-center">-->
                        <!--                            <input type="file" name="affidavit_selfie" id="affidavit_selfie"-->
                        <!--                                   required>-->
                        <!--                        </div>-->
                        <!--                    @endif-->
                        <!--                </div>-->
                        <!--                @if(!$affidavitSelfie || $affidavitSelfie->status == - 1)-->
                        <!--                    <br>-->
                        <!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
                        <!--                @endif-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                        <div class="col-lg-12">
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
