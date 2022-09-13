@extends('layouts.user.master')
@section('content')
    <style>
        .cm-toggle {
            -webkit-appearance: none;
            -webkit-tap-highlight-color: transparent;
            position: relative;
            border: 0;
            outline: 0;
            cursor: pointer;
            margin: 10px;
        }


        /* To create surface of toggle button */
        .cm-toggle:after {
            content: '';
            width: 60px;
            height: 28px;
            display: inline-block;
            background: rgba(196, 195, 195, 0.55);
            border-radius: 18px;
            clear: both;
        }


        /* Contents before checkbox to create toggle handle */
        .cm-toggle:before {
            content: '';
            width: 32px;
            height: 32px;
            display: block;
            position: absolute;
            left: 0;
            top: -3px;
            border-radius: 50%;
            background: rgb(255, 255, 255);
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }


        /* Shift the handle to left on check event */
        .cm-toggle:checked:before {
            left: 32px;
            box-shadow: -1px 1px 3px rgba(0, 0, 0, 0.6);
        }
        /* Background color when toggle button will be active */
        .cm-toggle:checked:after {
            background: #16a085;
        }

    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="text-center">
                    <div class="card">
                        <div class="card-body mt-4">
                            <h2>Monday Trade Activation</h2>
                            <i class="bi bi-shield-fill-check text-success" style="font-size: 72px"></i>
                            <h4>Trading is {{ (Auth::user()->trade_activation == 1 ? 'activated' : 'not activated') }} for your account</h4>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <form action="{{ route('trade-status') }}" method="post" id="trade-form" style="display: none">
                                        @csrf
                                        <input type="checkbox" name="status" id="status" class="cm-toggle"
                                                {{ (Auth::user()->trade_activation == 1 ? 'checked' : '') }} >
                                    </form>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="alert alert-danger mt-4"
                                 style="position: inherit; text-align: left !important; width: 100% !important; min-width: 1px">
                                <ul>
                                    <li>All Trading on Capital Live are based on UTC TIME.</li>
                                    <li>Activation Button will only be available on Monday.</li>
                                    <li>If you didn't activate your account trading on monday. You will not be able to
                                        receive
                                        earnings
                                        of that week.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#status').change(function () {
            $('#trade-form').submit();
        });

        var d = new Date();
        var day = d.getDate();


        var today = d.getDay();
        var days = ['Sun','Mon','Tues','Wed','Thrus','Fri','Sat'];
        if(days[today] == 'Mon'){
            $('#trade-form').css('display', 'block')
        }
    </script>

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
