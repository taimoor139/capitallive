<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register TokyoSecurities</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf_token" content="aengrfDr54WOKRM0t4RrXsgPKUSpYO3VW4RzvlFp" />

    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css"> --}}
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css"> --}}
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/charts/chart-apex.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css"> --}}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/partner.css">
    <script>
        function OTPTimer(date, id) {
            var d2 = new Date(date);
            var x = setInterval(function() {
                var now = new Date();
                var nowUTC = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(), now.getUTCHours(),
                    now.getUTCMinutes(), now.getUTCSeconds());
                var distance = d2 - nowUTC;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if (date) {
                    $("#" + id).html(minutes + ":" + seconds);
                    if (distance < 0) {
                        clearInterval(x);
                        $("#" + id).attr('onclick', "sendOTP(this)");
                        $("#" + id).html('Send Code');
                    }
                }
            }, 1000);
        }
    </script>
    <style>
        .alert {
            min-width: 400px;
            position: fixed;
            right: 10px;
            top: 77px;
            z-index: 1000;
        }

    </style>
</head>

<body class="h-100">




    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="https://tokyosecurities.com" class="logo d-flex align-items-center w-auto">
                                    <img src="https://tokyosecurities.com/assets/logo/logo-black.png" alt=""
                                        style="max-height: 60px">
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body border-top-warning border-bottom-warning">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>
                                    <form class="row g-3" method="POST" action="{{ route('register') }}"
                                        id="registerForm" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="full_name" class="form-label">Enter Your Full Name</label>
                                            <input type="text" class="form-control" id="name"
                                                @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input type="email" class="form-control" id="email"
                                                @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" value=""
                                                    id="username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                @error('password') is-invalid @enderror" name="password" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="password-confirm" class="form-label">Confirm Your Password</label>
                                            <input type="password" class="form-control"
                                                id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="col-12">
                                            <label for="sponsor" class="form-label">Sponsor</label>
                                            <input type="text" name="sponsor" class="form-control" id="sponsor"
                                                value="">
                                            <div id="validateSponsor" class="mb-1"></div>

                                        </div>
                                        <div class="col-12">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" name="terms" type="checkbox" value="1"
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <button class="btn btn-warning w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('login') }}">Log
                                                    in</a></p>
                                        </div>
                                        <div class="col-12 text-center">
                                            <hr>
                                            <a href="{{ url('/') }}"><button type="button"
                                                    class="btn btn-outline-primary">Back to Homepage</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>



    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a> --}}

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->
    <script src="../../../assets/js/main.js"></script>
    {{-- <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script> --}}
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    <script>
        $("#sponsor").on('keyup', function() {
            validateSponsor(this);
        })

        function validateSponsor(e) {

            let route = "https:\/\/tokyosecurities.com\/register\/valid-sponsor"
            axios.post(route, {
                sponsor: $('#sponsor').val(),
            }).then(function(response) {
                $("#validateSponsor").removeClass('text-danger');
                $("#validateSponsor").addClass('text-success');
                $("#validateSponsor").html('Sponsor name is ' + response.data.sponsor.name)
            }).catch(function(error) {
                if ($('#sponsor').val() === "") {
                    $("#validateSponsor").html('')
                } else {
                    $("#validateSponsor").removeClass('text-success');
                    $("#validateSponsor").addClass('text-danger');
                    $("#validateSponsor").html(error.response.data.sponsor)

                }
            });
        }
    </script>
</body>

</html>
