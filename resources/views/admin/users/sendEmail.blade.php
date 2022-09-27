@extends('layouts.admin.master')

@section('content')

    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">Send Email To All Users</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                </div>
            </div>


            <div class="row mb-none-30">
                <div class="col-xl-12">
                    <div class="card">
                        <form action="{{ route('send-email') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Subject <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Email subject"
                                               name="subject" required="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Message <span
                                                    class="text-danger">*</span></label>

                                        <textarea name="message" rows="10" class="form-control nicEdit"
                                                  placeholder="Your message"
                                                  ></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Attachment</label>

                                        <input type="file" name="attachment"  class="form-control nicEdit">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center">
                                        <button type="submit" class="btn btn-block btn--primary mr-2">Send Email
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
