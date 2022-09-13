@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body pt-3 border-top-warning border-bottom-warning">
                                <h5 class="card-title">TokyoSecurities Security | 2FA</h5>
                                <div id="google2faSection">
                                    <div class="main-content-box">
                                        <img src="https://tokyosecurities.com/img/g2fa.png" class="img-fluid model-icon"
                                             style="width: 8%;" alt="">
                                        <span class="px-3">Google 2FA</span>
                                        <hr>
                                        <p>Two factor authentication (2FA) strengthens access security by requiring two
                                            methods (also referred to as
                                            factors) to verify your identity. Two factor authentication protects against
                                            phishing, social engineering and
                                            password brute force attacks and secures your logins from attackers
                                            exploiting weak or stolen credentials.</p>

                                        @if($data['user']->loginSecurity == null)
                                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        Enable 2FA
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                                            1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: <code>{{ $data['secret'] }}</code><br/>
                                            {!! $data['google2fa_url'] !!}
                                            <br/><br/>
                                            2. Enter the pin from Google Authenticator app:<br/><br/>
                                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                                    <label for="secret" class="control-label">Authenticator Code</label>
                                                    <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                                                    @if ($errors->has('verify-code'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                        </span>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    Enable 2FA
                                                </button>
                                            </form>
                                        @elseif($data['user']->loginSecurity->google2fa_enable)
                                            <div class="alert alert-success">
                                                2FA is currently <strong>enabled</strong> on your account.
                                            </div>
                                            <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                    <label for="change-password" class="control-label">Current Password</label>
                                                    <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                                    @if ($errors->has('current-password'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-body pt-3 border-top-warning border-bottom-warning">
                                <h5 class="card-title pb-0">Change Password</h5>
                                <p>Update your account password to keep your account secure. <br>Never share account
                                    password with
                                    anyone.</p>

                                <form method="post" action="{{ route('updatePassword') }}" id="changePasswordForm">
                                    <div class="tab-content pt-2">
                                        @csrf
                                        <label>Please enter current password</label>
                                        <div class="password-toggle">
                                            <input type="password" name="current_password" class="form-control" required>
                                            <span class="toggle-icon"><i class="mdi mdi-eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Please enter new password for your account</label>
                                        <div class="password-toggle">
                                            <input type="password" name="password" class="form-control" required>
                                            <span class="toggle-icon"><i class="mdi mdi-eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm new password</label>
                                        <div class="password-toggle">
                                            <input type="password" name="password_confirmation" class="form-control" required>
                                            <span class="toggle-icon"><i class="mdi mdi-eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-warning w-150">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('success') }}");
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
@endsection
