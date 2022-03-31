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
                <img src="https://tokyosecurities.com/img/g2fa.png" class="img-fluid model-icon" style="width: 8%;" alt="">
                <span class="px-3">Google 2FA</span>
                <hr>
                <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as
                factors) to verify your identity. Two factor authentication protects against phishing, social engineering and
                password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
                <form method="POST" action="https://tokyosecurities.com/2fa/generateSecret" id="generate2faSecret">
                <input type="hidden" name="_token" value="8Ac8sEpFAkT42hNsxtuPeusexEey6h8RFZgYPKTd">
                <p style="text-align: center;">
                <button type="submit" class="btn btn-primary mt-4">Enable 2FA</button>
                </p>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="card">
                <div class="card-body pt-3 border-top-warning border-bottom-warning">
                <h5 class="card-title pb-0">Change Password</h5>
                <p>Update your account password to keep your account secure. <br>Never share account password with
                anyone.</p>
                <div class="tab-content pt-2">
                <form method="post" action="https://tokyosecurities.com/my-profile/change-password" id="changePasswordForm">
                <input type="hidden" name="_token" value="8Ac8sEpFAkT42hNsxtuPeusexEey6h8RFZgYPKTd"> <div class="form-group mb-2">
                <label>Please enter current password</label>
                <div class="password-toggle">
                <input type="password" name="current_password" class="form-control">
                <span class="toggle-icon"><i class="mdi mdi-eye"></i></span>
                </div>
                </div>
                <div class="form-group mb-2">
                <label>Please enter new password for your account</label>
                <div class="password-toggle">
                <input type="password" name="password" class="form-control">
                <span class="toggle-icon"><i class="mdi mdi-eye"></i></span>
                </div>
                </div>
                <div class="form-group">
                <label>Confirm new password</label>
                <div class="password-toggle">
                <input type="password" name="password_confirmation" class="form-control">
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
</div>
@endsection
