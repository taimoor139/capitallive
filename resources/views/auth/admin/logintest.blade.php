<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital Live - Admin Login</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png"
          href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="../../../css/grid.min.css">
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="../../../css/bootstrap-toggle.min.css">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="../../../css/all.min.css">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="../../../css/line-awesome.min.css">


    <!-- select 2 css -->
    <link rel="stylesheet" href="../../../css/select2.min.css">
    <!-- jvectormap css -->
    <link rel="stylesheet"
          href="../../../css/jquery-jvectormap-2.0.5.css">
    <!-- datepicker css -->
    <link rel="stylesheet" href="../../../css/datepicker.min.css">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="../../../css/jquery-timepicky.css">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet"
          href="../../../css/bootstrap-clockpicker.min.css">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet"
          href="../../../css/bootstrap-pincode-input.css">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="../../../css/app.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <style type="text/css">
        @font-face {
            font-weight: 400;
            font-style: normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2') format('woff2');
        }

        @font-face {
            font-weight: 500;
            font-style: normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2') format('woff2');
        }

        @font-face {
            font-weight: 700;
            font-style: normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2') format('woff2');
        }

        @font-face {
            font-weight: 900;
            font-style: normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2') format('woff2');
        }</style>
</head>
<body data-new-gr-c-s-check-loaded="14.1063.0" data-gr-ext-installed="">
<div class="page-wrapper default-version">
    <div class="form-area bg_img" data-background="../../../img/1.jpg"
         style="background-image: url(&quot;../../../img/1.jpg&quot;);">
        <div class="form-wrapper">
            <h4 class="logo-text mb-15">Welcome to <strong>Capital Live</strong></h4>
            <p>Admin Login to Capital Live dashboard</p>
            <form action="{{ route('login') }}" method="POST" class="cmn-form mt-30">
                @csrf
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" name="email" class="form-control b-radius--capsule" id="email"
                           @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                    autocomplete="email" autofocus />
                    <i class="fa fa-user input-icon"></i>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror


                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="password" class="form-control b-radius--capsule" id="password"
                           @error('password') is-invalid @enderror" required
                    autocomplete="current-password" />
                    <i class="fa fa-lock input-icon"></i>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                    @enderror>
                </div>
                <div class="form-group d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin-reset-password') }}" class="text-muted text--small"><i
                            class="fa fa-lock"></i>Forgot password?</a>
                </div>
          
                <div class="form-group">
                    <button type="submit" class="submit-btn mt-25 b-radius--capsule">Login <i
                            class="fa fa-sign-in"></i></button>
                </div>
            </form>
        </div>
    </div><!-- login-area end -->
</div>


<!-- jQuery library -->
<script src="../../../js/jquery-3.6.0.min.js"></script>
<!-- bootstrap js -->
<script src="../../../js/bootstrap.bundle.min.js"></script>
<!-- bootstrap-toggle js -->
<script src="../../../js/bootstrap-toggle.min.js"></script>
<!-- slimscroll js for custom scrollbar -->
<script src="../../../js/jquery.slimscroll.min.js"></script>
<script src="../../../js/nicEdit.js"></script>
<!-- seldct 2 js -->
<script src="../../../js/select2.min.js"></script>

<link rel="stylesheet" href="../../../css/iziToast.min.css">
<script src="../../../js/iziToast.min.js"></script>

<!-- 
<script>
    
    'use strict';

    function notify(status, message) {
        @if(Session::has('error'))
        iziToast[status]({
            message: {{ session('error') }},
            position: "topRight"
        });
        @endif
    }
</script> -->

<script>
        'use strict';
        @if(Session::has('status'))
                iziToast.error({
            message: "{{ session('status') }}",
            position: "topRight"
        });
        @endif
            </script>

<script src="https://script.viserlab.com/bisurv/assets/admin/js/app.js"></script>


<script>
    "use strict";
    (function ($) {
        bkLib.onDomLoaded(function () {
            $(".nicEdit").each(function (index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({fullPanel: false}).panelInstance('nicEditor' + index, {hasPanel: true});
            });
        });

        $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function () {
            $('.nicEdit-main').focus();
        });
    })(jQuery);
</script>

<script>
        @if(Session::has('status'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('status') }}");
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
</body>
<loom-container id="lo-engage-ext-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>
<loom-container id="lo-companion-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>
