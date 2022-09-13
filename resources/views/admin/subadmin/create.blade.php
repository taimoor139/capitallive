@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">
            <form action="{{ route('store-subadmin') }}">
                <div class="col-md-12 card">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 pt-2">
                            <h6 class="page-title">Create SubAdmin</h6>
                            <hr>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                       name="confirm_password">
                            </div>
                            <div id="passwordCheck">

                            </div>
                            <hr>
                            <h6 class="page-title">Roles</h6>
                            <hr>
                            @foreach($roles as $role)
                                <div class="form-group">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
                                </div>
                            @endforeach

                            <br>
                            <div class=" pb-4">
                                <button type="submit" class="btn btn--info">Create</button>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#confirm_password').keyup(function (){
            var password = $('#password').val();

            if(password != $(this).val()){
                $('#passwordCheck').html('<span  class="alert-danger">Passwords did not matched!</span>');
            } else {
                $('#passwordCheck').html('<span  class="alert-success">Passwords matched!</span>');
            }
        })

        $('#password').keyup(function (){
            var cPassword = $('#confirm_password').val();

            if(cPassword && cPassword != $(this).val()){
                $('#passwordCheck').html('<span  class="alert-danger">Passwords did not matched!</span>');
            } else if(cPassword && cPassword == $(this).val()){
                $('#passwordCheck').html('<span  class="alert-success">Passwords matched!</span>');
            }
        })
    </script>
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