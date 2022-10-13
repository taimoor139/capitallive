@extends('layouts.user.master')
@section('content')
    <div class="app-content content" style="margin-top:-8%;">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h1 class="card-title etitle">Earning Charts</h1>
                <ul class="nav nav-pills nav-fill navtop">
                    <li class="nav-item">
                        <a class="nav-link active" href="#calender1" data-toggle="tab">{{ $fx1RoiTitle }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calender2" data-toggle="tab">{{ $fx2RoiTitle }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calender3" data-toggle="tab">{{ $fx3RoiTitle }}</a>
                    </li>
                </ul>
                <hr>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="calender1">
                        <div id="calendar-wrap">
                            <header><h1 class="etitle">{{  $date->format('M') }}  {{ $date->format('Y') }}</h1></header>
                            <div id="calendar">
                                <ul class="weekdays">
                                    <li>Sunday</li>
                                    <li>Monday</li>
                                    <li>Tuesday</li>
                                    <li>Wednesday</li>
                                    <li>Thursday</li>
                                    <li>Friday</li>
                                    <li>Saturday</li>
                                </ul>
                                <ul class="days">
                                    {!! $type1 !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="calender2">
                        <div id="calendar-wrap">
                            <header><h1 class="etitle">{{  $date->format('M') }}  {{ $date->format('Y') }}</h1></header>
                            <div id="calendar">
                                <ul class="weekdays">
                                    <li>Sunday</li>
                                    <li>Monday</li>
                                    <li>Tuesday</li>
                                    <li>Wednesday</li>
                                    <li>Thursday</li>
                                    <li>Friday</li>
                                    <li>Saturday</li>
                                </ul>
                                <ul class="days">
                                    {!! $type2 !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="calender3">
                        <div id="calendar-wrap">
                            <header><h1 class="etitle">{{  $date->format('M') }}  {{ $date->format('Y') }}</h1></header>
                            <div id="calendar">
                                <ul class="weekdays">
                                    <li>Sunday</li>
                                    <li>Monday</li>
                                    <li>Tuesday</li>
                                    <li>Wednesday</li>
                                    <li>Thursday</li>
                                    <li>Friday</li>
                                    <li>Saturday</li>
                                </ul>
                                <ul class="days">
                                    {!! $type3 !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection