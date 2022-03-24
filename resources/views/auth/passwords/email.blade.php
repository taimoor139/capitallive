<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Forgot Password TokyoSecurities</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf_token" content="aengrfDr54WOKRM0t4RrXsgPKUSpYO3VW4RzvlFp" />

    {{-- <link href="https://tokyosecurities.com/assets/img/favicon.png" rel="icon">
    <link href="https://tokyosecurities.com/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="https://tokyosecurities.com/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link href="https://tokyosecurities.com/assets/css/style.css?v=1" rel="stylesheet">
    <link href="https://tokyosecurities.com/assets/css/partner.css?v=1" rel="stylesheet"> --}}

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
    <!-- END: Custom CSS-->


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
                                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('assets/logo.png') }}" alt=""
                                        style="max-height: 60px">
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body border-top-warning border-bottom-warning">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Recover your account</h5>
                                        <p class="text-center small">Please enter email associated with your account. We
                                            will send an password reset link.</p>
                                    </div>
                                    <form  method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="forgot_email" class="form-label">Enter your Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" id="email" class="form-control"
                                                    @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email"
                                                    autofocus>
                                                <br>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-warning w-100 login-signup-btn" type="submit">Recover
                                                Account
                                            </button>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <p class="small mb-0"><a href="{{ route('register') }}">Create
                                                    an account</a> | <a href="{{ route('login') }}">Login
                                                    Back</a></p>
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


    {{-- <script src="https://tokyosecurities.com/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/chart.js/chart.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/echarts/echarts.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/quill/quill.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="https://tokyosecurities.com/assets/vendor/php-email-form/validate.js'"></script>

    <script src="https://tokyosecurities.com/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    </script> --}}
</body>

</html>
