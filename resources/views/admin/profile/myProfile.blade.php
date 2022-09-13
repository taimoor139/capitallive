@extends('layouts.admin.master')
@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">Profile</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                    <a href="{{ route('updateAdminPassword') }}"
                       class="btn btn-sm btn--primary box--shadow1 text--small"><i class="fa fa-key"></i>Password
                        Setting</a>
                </div>
            </div>

            <div class="row mb-none-30">
                <div class="col-lg-3 col-md-3 mb-30">
                    <div class="card b-radius--5 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="d-flex p-3 bg--primary align-items-center">
                                <div class="avatar avatar--lg">

                                    @if(Auth::user()->image)

                                        <img src="/uploads/profile_pictures/{{Auth::user()->image}}"
                                             alt="Image">
                                    @else

                                        <img src="https://script.viserlab.com/bisurv/assets/images/avatar.png"
                                             alt="Image">
                                    @endif
                                </div>
                                <div class="pl-3">
                                    <h4 class="text--white">{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Name <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Username <span class="font-weight-bold">{{ Auth::user()->username }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Email <span class="font-weight-bold">{{ Auth::user()->email }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 mb-30">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-50 border-bottom pb-2">Profile Information</h5>
                            <form action="{{ route('profile-update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="image-upload">
                                                <div class="thumb">
                                                    <div class="avatar-preview">
                                                        @if(Auth::user()->image)
                                                            <div class="profilePicPreview"
                                                                 style="background-image: url('/uploads/profile_pictures/{{Auth::user()->image}}')">
                                                                <button type="button" class="remove-image"><i
                                                                            class="fa fa-times"></i></button>
                                                            </div>
                                                        @else
                                                            <div class="profilePicPreview"
                                                                 style="background-image: url('https://script.viserlab.com/bisurv/assets/images/avatar.png')">
                                                                <button type="button" class="remove-image"><i
                                                                            class="fa fa-times"></i></button>
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="avatar-edit">
                                                        <input type="file" class="profilePicUpload" name="img"
                                                               id="profilePicUpload1" accept=".png, .jpg, .jpeg" >
                                                        <label for="profilePicUpload1" class="bg--success">Upload
                                                            Image</label>
                                                        <small class="mt-2 text-facebook">Supported files: <b>jpeg,
                                                                jpg.</b> Image will be resized into 400x400px
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label  font-weight-bold">Email</label>
                                            <input class="form-control" type="email" name="email"
                                                   value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- bodywrapper__inner end -->
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
