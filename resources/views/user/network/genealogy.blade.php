@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ $totalLeftMembers }}</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Left Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ round($points->left_bp, 0) ?? 0 }}</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Left Bonus Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ $totalRightMembers }}</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Right Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ round($points->right_bp, 0) ?? 0 }}</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-success"></i> Right Bonus Points</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <input type="text" name="left_search" id="left_search" value=""
                                                   class="search form-control" placeholder="start search here">
                                            <small
                                                    class="pl-2 text-uppercase font-weight-bold text-muted">search
                                            </small>
                                            <input type="hidden" name="type" value="left">
                                        </div>
                                        <div class="col-md-5">
                                            <select name="left_rank" id="left_rank" class="search form-control">
                                                <option value="">choose option</option>
                                                <option value="STARTER" class="text-uppercase">STARTER</option>
                                                <option value="BRONZE" class="text-uppercase">BRONZE</option>
                                                <option value="SILVER" class="text-uppercase">SILVER</option>
                                                <option value="GOLD" class="text-uppercase">GOLD</option>
                                                <option value="PLATINUM" class="text-uppercase">PLATINUM</option>
                                                <option value="TITANIUM" class="text-uppercase">TITANIUM</option>
                                                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                                                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR
                                                    EXECUTIVE
                                                </option>
                                                <option value="RUBY" class="text-uppercase">RUBY</option>
                                                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                                                <option value=" BLUE DIAMOND" class="text-uppercase"> BLUE DIAMOND
                                                </option>
                                                <option value="ROYAL DIAMOND" class="text-uppercase"> ROYAL DIAMOND
                                                </option>
                                                <option value="CROWN DIAMOND" class="text-uppercase"> CROWN DIAMOND
                                                </option>
                                            </select>
                                            <small class="pl-2 text-uppercase font-weight-bold text-muted">Ranks</small>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-warning btn-sm float-end py-1">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card border-top-warning  border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-person-square text-danger"></i> Left Members</h5>
                                <table id="table" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Rank</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($leftMembers)
                                        @foreach($leftMembers as $leftMember)
                                            @if($leftMember->user)
                                                <tr class="member-row">
                                                    <td style="display: none"
                                                        data-title="username">{{ $leftMember->user->username ??  ''  }}</td>
                                                    <td data-title="Id">{{ $loop->iteration }}</td>
                                                    <td data-title="name">
                                                        {{--                                                        <img style="width: 20px; height: 20px"--}}
                                                        {{--                                                             src="/assets/flags/pk.svg"--}}
                                                        {{--                                                             alt="flag">--}}
                                                        {{ $leftMember->user->name ?? '' }}
                                                    </td>
                                                    <td style="display: none"
                                                        data-title="Ref by">{{ $leftMember->user->referral->referrer_name }}</td>
                                                    <td data-title="Rank">{{  $leftMember->user->rankAward->title ?? '' }}</td>
                                                    <td style="display: none"
                                                        data-title="Status">@if($leftMember->user->status == 1)
                                                            <span class="badge badge-pill bg--danger">Banned</span>
                                                        @else
                                                            <span class="badge badge-pill bg--success">Active</span>

                                                        @endif</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center text-danger">NO DATA</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <form>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <input type="text" name="right_search" id="right_search" value=""
                                                   class="search form-control" placeholder="start search here">
                                            <input type="hidden" name="type" value="right">
                                            <small
                                                    class="pl-2 text-uppercase font-weight-bold text-muted">search
                                            </small>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="right_rank" id="right_rank" class="search form-control">
                                                <option value="">choose option</option>
                                                <option value="STARTER" class="text-uppercase">STARTER</option>
                                                <option value="BRONZE" class="text-uppercase">BRONZE</option>
                                                <option value="SILVER" class="text-uppercase">SILVER</option>
                                                <option value="GOLD" class="text-uppercase">GOLD</option>
                                                <option value="PLATINUM" class="text-uppercase">PLATINUM</option>
                                                <option value="TITANIUM" class="text-uppercase">TITANIUM</option>
                                                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                                                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR
                                                    EXECUTIVE
                                                </option>
                                                <option value="RUBY" class="text-uppercase">RUBY</option>
                                                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                                                <option value=" BLUE DIAMOND" class="text-uppercase"> BLUE DIAMOND
                                                </option>
                                                <option value="ROYAL DIAMOND" class="text-uppercase"> ROYAL DIAMOND
                                                </option>
                                                <option value="CROWN DIAMOND" class="text-uppercase"> CROWN DIAMOND
                                                </option>
                                            </select>
                                            <small class="pl-2 text-uppercase font-weight-bold text-muted">Ranks</small>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-warning btn-sm float-end py-1">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card border-top-warning  border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-person-square text-success"></i> Right Members
                                </h5>
                                <table id="table" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Rank</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($rightMembers)
                                        @foreach($rightMembers as $rightMember)
                                            @if($rightMember->user)
                                                <tr class="member-row">
                                                    <td style="display: none"
                                                        data-title="username">{{ $rightMember->user->username ??  ''  }}</td>
                                                    <td data-title="Id">{{ $loop->iteration }}</td>
                                                    <td data-title="name">
                                                        {{--                                                        <img style="width: 20px; height: 20px"--}}
                                                        {{--                                                             src="/assets/flags/pk.svg"--}}
                                                        {{--                                                             alt="flag">--}}
                                                        {{ $rightMember->user->name ?? '' }}
                                                    </td>
                                                    <td style="display: none"
                                                        data-title="Ref by">{{ $rightMember->user->referral->referrer_name }}</td>
                                                    <td data-title="Rank">{{  $rightMember->user->rankAward->title ?? '' }}</td>
                                                    <td style="display: none"
                                                        data-title="Status">@if($rightMember->user->status == 1)
                                                            <span class="badge badge-pill bg--danger">Banned</span>
                                                        @else
                                                            <span class="badge badge-pill bg--success">Active</span>

                                                        @endif</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center text-danger">NO DATA</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade modal-xl" id="detailsModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title float-left">Member</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body member-details">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade modal-xl " id="nextMemberModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title float-left">Member</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body nextMemberModal-body">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function members(event) {
            var username = event.cells.namedItem("member_username").innerHTML;
           
            if (username) {
                var _token = $('#_token').val();
                var member = '';
                $.ajax({
                    url: "{{ route('user-members') }}",
                    type: "POST",
                    data: {username: username, _token: _token},
                    success: function (response) {
                        member += '<table id="table" class="table table-hover member-table"><thead><tr><th scope="col">#</th><th scope="col">Name</th><th scope="col">Ref By</th><th scope="col">Position</th><th scope="col">Status</th></tr></thead><tbody>';

                        $.each(response, function (index, obj) {
                            member += '<tr onclick="members(this)"><td>' + (parseInt(index) + 1) + '</td><td>' + obj.name + '</td><td style="display: none" data-title="username" id="member_username">' + obj.username + '</td><td>' + obj.ref_by + '</td><td>' + obj.position + '</td><td>' + obj.status + '</td></tr>'
                        });
                        member += '</tbody></table>';
                        $(".nextMemberModal-body").html(member);
                    }
                });
            }

        }
    </script>
    <script>
        $(document).ready(function () {

            $('#detailsModal').on('show.bs.modal', function (e) {
                var _button = $(e.relatedTarget);
                var result = "";
                var $row = $(_button).closest("tr"); // Find the row
                var $tds = $row.find("td");
                $.each($tds, function () {
                    var t = $(this).attr('data-title');
                    var v = $(this).text();
                    result += '<div><span style="font-weight: bold">' + t + '</span> : ' + v + '</div>';
                });
                $(this).find("#container").html(result);
            });

            $('.member-row').on('click', function () {
                var username = '';
                var tds = $(this).find("td");
                $.each(tds, function () {
                    var t = $(this).attr('data-title');
                    var v = $(this).text();
                    if (t == "username") {
                        username = v;
                    }
                });

                if (username) {
                    var _token = $('#_token').val();
                    var member = '';
                    $.ajax({
                        url: "{{ route('user-members') }}",
                        type: "POST",
                        data: {username: username, _token: _token},
                        success: function (response) {
                            member += '<table id="table" class="table table-hover member-table"><thead><tr><th scope="col">#</th><th scope="col">Name</th><th scope="col">Ref By</th><th scope="col">Position</th><th scope="col">Status</th></tr></thead><tbody>';
                            $.each(response, function (index, obj) {
                                console.log(obj.name)
                                member += '<tr data-toggle="modal" data-target="#nextMemberModal"><td>' + (parseInt(index) + 1) + '</td><td>' + obj.name + '</td><td style="display: none" data-title="username">' + obj.username + '</td><td>' + obj.ref_by + '</td><td>' + obj.position + '</td><td>' + obj.status + '</td></tr>'
                            });
                            member += '</tbody></table>';
                            $(".member-details").html(member);
                            $('#detailsModal').modal('show');
                        }
                    });
                }
            });
            $('#nextMemberModal').on('show.bs.modal', function (e) {
                var _button = $(e.relatedTarget);
                var username = "";
                var $row = $(_button).closest("tr"); // Find the row
                var $tds = $row.find("td");
                $.each($tds, function () {
                    var t = $(this).attr('data-title');
                    var v = $(this).text();
                    if (t == "username") {
                        username = v;
                    }
                });
                if (username) {
                    var _token = $('#_token').val();
                    var member = '';
                    $.ajax({
                        url: "{{ route('user-members') }}",
                        type: "POST",
                        data: {username: username, _token: _token},
                        success: function (response) {
                            member += '<table id="table" class="table table-hover member-table"><thead><tr><th scope="col">#</th><th scope="col">Name</th><th scope="col">Ref By</th><th scope="col">Position</th><th scope="col">Status</th></tr></thead><tbody>';

                            $.each(response, function (index, obj) {
                                member += '<tr onclick="members(this)"><td>' + (parseInt(index) + 1) + '</td><td>' + obj.name + '</td><td style="display: none" data-title="username" id="member_username">' + obj.username + '</td><td>' + obj.ref_by + '</td><td>' + obj.position + '</td><td>' + obj.status + '</td></tr>'
                            });
                            member += '</tbody></table>';
                            $(".nextMemberModal-body").html(member);
                            $('#detailsModal').modal('hide');
                        }
                    });
                }
            });

        });
    </script>
@endsection
