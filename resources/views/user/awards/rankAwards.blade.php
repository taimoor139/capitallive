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
                                <h5 class="card-title p-0 pt-4">{{ Auth::user()->rankAward->title ?? '' }}</h5>
                                <p class="card-text">Current Rank</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ Auth::user()->rankAward->title ?? '' }} | {{ $awardEarned ?? 0 }} $</h5>
                                <p class="card-text">Rank Earned | Award</p>
                            </div>
                        </div>
                    </div>
                    @if($currentUserRank->award_id != 14)
                        <div class="col-xl-3 col-sm-6 mb-20">
                            <div class="card border-left-warning">
                                <div class="card-body">
                                    <h5 class="card-title p-0 pt-4">{{ $nextAward->title ?? '' }}</h5>
                                    <p class="card-text">Next Rank</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-20">
                            <div class="card border-left-warning">
                                <div class="card-body">
                                    <h5 class="card-title p-0 pt-4">{{ $nextAward->left_points ?? 0 }}
                                        | {{ $nextAward->right_points ?? 0 }}</h5>
                                    <p class="card-text">Points to Next Rank</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card border-top-warning border-bottom-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-award"></i> Rank Awards Earned</h5>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rank</th>
                                <th scope="col">Award</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delivery @</th>
                                <th scope="col">Delivered</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Auth::user()->awards)
                                @foreach(Auth::user()->awards as $awards)
                                    <tr>
                                        <td>{{ $awards->rank->id  }}</td>
                                        <td>{{ $awards->rank->title ?? '' }}</td>
                                        <td>{{ $awards->rank->award ?? ''}}</td>
                                        <td><span class=text-success>COMPLETED</span></td>
                                        <td>
                                            {{ $awards->created_at }}
                                        </td>
                                        <td>DELIVERED</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card border-top-warning border-bottom-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-award"></i> Rank Awards List</h5>
                        <div class="table-responsive">
                            <table class="table table-border table-hover">
                                <thead>
                                <tr>
                                    <th>Rank Title</th>
                                    <th>Left Points</th>
                                    <th>Right Points</th>
                                    <th>Rank Award</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ranks as $rank)
                                    @if($earnedUserRanks && in_array($rank->id, $earnedUserRanks))
                                        <tr style="background-color: #ffdf80">
                                    @else
                                        <tr>
                                            @endif
                                            <td>{{ $rank->title }}</td>
                                            <td>${{ number_format($rank->left_points) }}</td>
                                            <td>${{ number_format($rank->right_points) }}</td>
                                            <td>${{ number_format($rank->award) }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
