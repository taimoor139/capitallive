@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">Earning Account</h5>
                                <p class="card-text">Statistics <i class="bi bi-clipboard-data text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">$ {{ round($monthlyEarning, 2) }}</h5>
                                <p class="card-text">This Month <i class="bi bi-person-lines-fill text-primary"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">$ {{ round($totalEarning, 2) }}</h5>
                                <p class="card-text">Total Earning <i class="bi bi-diagram-2 text-primary"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">

                                <h5 class="card-title p-0 pt-4">
                                    $ {{ round($currentEarning, 4) }}
                                    @if($currentEarning > 10)
                                        <small><a
                                                href="{{ route('move-earning') }}">Move</a></small>
                                    @endif
                                </h5>
                                <p class="card-text">Pending <i class="bi bi-unlock-fill text-danger">
                                         </i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top-warning  border-bottom-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-currency-dollar text-danger"></i> Earning Account</h5>
                        <table class="table table-hover" id="earningTable">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($earnings as $earning)
                                <tr>
                                    <td>{{ date_format($earning->created_at, 'Y-m-d') }}</td>
                                    <td>{{ round($earning->earning, 4) }}</td>
                                    <td>{{ $earning->percentage }}</td>
                                    <td>{{ ($earning->status == 0 ? 'Pending':'Completed') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
     <script>
        $(document).ready(function () {
            $('#earningTable').DataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": true,
                "dom": '<"pull-left"f><"pull-right"l>tip',
                order: [[0, 'desc']],
                scrollX: true
            });
        });
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
