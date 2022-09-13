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
            <a href="/" class="d-flex justify-content-center"><img src="/login.png" alt="Capital first"></a>

            <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
            <p class="card-text mb-2">Make your app management easy and fun!</p>
            <form class="cmn-form mt-30" method="POST" action="{{ route('register') }}"
                  id="registerForm">
                @csrf
                <input type="hidden" name="register_type" value="{{ \App\Models\User::ADMIN_USER }}">
                <div class="form-group">
                    <label for="register-username">Enter Your Full Name</label>

                    <input type="text" class="form-control" id="name"
                           @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                    required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>

                    <input type="email" class="form-control" id="email"
                           @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" id="username"
                               @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                    <span id="usernameCheck" class="alert-danger"></span>
                </div>

                <div class="form-group">
                    <label for="register-password">Password</label>

                    <div class="input-group input-group-merge form-password-toggle">

                        <input type="password" class="form-control" id="password"
                               @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                        <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="register-password">Confirm Your
                        Password</label>

                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control" id="password-confirm"
                               name="password_confirmation" required autocomplete="new-password">

                        <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                        </div>
                    </div>
                    <div id="passwordCheck">

                    </div>

                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="sponsor">Sponsor</label>--}}

                    {{--<input type="text" class="form-control" id="sponsor"--}}
                           {{--@error('sponsor') is-invalid @enderror" name="sponsor"--}}
                    {{--value="{{ (isset($referrer) ? $referrer:'')}}" autocomplete="sponsor" {{ (isset($referrer) ? "readonly":"") }}>--}}
                    {{--@error('sponsor')--}}
                    {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $message }}</strong>--}}
                                            {{--</span>--}}
                    {{--@enderror--}}
                    {{--<input type="hidden" id="_token" value="{{ csrf_token() }}">--}}
                    {{--<span id="sponsorCheck" class="alert-danger"></span>--}}
                {{--</div>--}}

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" value="1" name="terms" type="checkbox"
                               required
                               id="register-privacy-policy" tabindex="4"/>
                        <label class="custom-control-label" for="register-privacy-policy">
                            I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <but`ton class="btn btn-primary btn-block signup" tabindex="5">Sign up</button>
            </form>

            <p class="text-center mt-2">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                Sign in instead
                </a>
            </p>
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

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
    $('#username').keyup(function () {
        if ($(this).val() == $('#sponsor').val()) {
            toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.error("Sponsor and Username cannot be same");
            $('.signup').attr('disabled', true);
        } else {
            $('#usernameCheck').html(" ");
            $('.signup').attr('disabled', false);
        }
        var _token = $("#_token").val();
        var username = $(this).val();
        $.ajax({
            url: '{{ route("usernameValidation") }}',
            type: 'POST',
            data: {username: username, _token: _token},
            success: function (response) {
                if (response == 1) {
                    toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                    toastr.error("Username is already taken. Try Another!");
                    // $('#sponsorCheck').html("Username is already taken. Try Another!");
                    $('.signup').attr('disabled', true);
                } else {
                    $('#sponsorCheck').html(" ");
                    $('.signup').attr('disabled', false);
                }
            }
        });
    });

    {{--$('#sponsor').keyup(function () {--}}
        {{--var referrerName = $(this).val();--}}
        {{--var _token = $("#_token").val();--}}
        {{--$.ajax({--}}
            {{--url: '{{ route("referrerValidation") }}',--}}
            {{--type: 'POST',--}}
            {{--data: {referrerName: referrerName, _token: _token},--}}
            {{--success: function (response) {--}}
                {{--if (response == 1) {--}}
                    {{--$('#sponsorCheck').html("Sponsor is not Valid!");--}}
                    {{--$('.signup').attr('disabled', true);--}}
                {{--} else {--}}
                    {{--$('#sponsorCheck').html(" ");--}}
                    {{--$('.signup').attr('disabled', false);--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}

    {{--});--}}

    $('#password-confirm').keyup(function (){
        var password = $('#password').val();

        if(password != $(this).val()){
            $('#passwordCheck').html('<span  class="alert-danger">Passwords did not matched!</span>');
        } else {
            $('#passwordCheck').html('<span  class="alert-success">Passwords matched!</span>');
        }
    })

    $('#password').keyup(function (){
        var cPassword = $('#password-confirm').val();

        if(cPassword && cPassword != $(this).val()){
            $('#passwordCheck').html('<span  class="alert-danger">Passwords did not matched!</span>');
        } else if(cPassword && cPassword == $(this).val()){
            $('#passwordCheck').html('<span  class="alert-success">Passwords matched!</span>');
        }
    })



</script>

<script>
    'use strict';

    function notify(status, message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
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


</body>
<loom-container id="lo-engage-ext-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>
<loom-container id="lo-companion-container">
    <loom-shadow classname="resolved"></loom-shadow>
</loom-container>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>
