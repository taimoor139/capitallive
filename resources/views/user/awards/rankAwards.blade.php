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
                    <h5 class="card-title p-0 pt-4">STARTER</h5>
                    <p class="card-text">Current Rank</p>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                    <div class="card border-left-warning">
                    <div class="card-body">
                    <h5 class="card-title p-0 pt-4">$ 0</h5>
                    <p class="card-text">Rank Earned</p>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                    <div class="card border-left-warning">
                    <div class="card-body">
                    <h5 class="card-title p-0 pt-4">BRONZE</h5>
                    <p class="card-text">Next Rank</p>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                    <div class="card border-left-warning">
                    <div class="card-body">
                    <h5 class="card-title p-0 pt-4">+23010
                    | 2500</h5>
                    <p class="card-text">Points to Next Rank</p>
                    </div>
                    </div>
                    </div>
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
                    <tr>
                    <td>1</td>
                    <td>STARTER</td>
                    <td>$0</td>
                    <td><span class=text-success>COMPLETED</span></td>
                    <td>
                     2022-01-16 20:10:55
                    </td>
                    <td>DELIVERED</td>
                    </tr>
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
                    <tr style="background-color: #ffdf80">
                    <td>STARTER</td>
                    <td>0</td>
                    <td>0</td>
                    <td>
                    $0
                    </td>
                    </tr>
                    <tr>
                    <td>BRONZE</td>
                    <td>2,500</td>
                    <td>2,500</td>
                    <td>
                    $100
                    </td>
                    </tr>
                    <tr>
                    <td>SILVER</td>
                    <td>5,000</td>
                    <td>5,000</td>
                    <td>
                    $150 + Company Badge
                    </td>
                    </tr>
                    <tr>
                    <td>GOLD</td>
                    <td>10,000</td>
                    <td>10,000</td>
                    <td>
                    $200
                    </td>
                    </tr>
                    <tr>
                    <td>PLATINUM</td>
                    <td>20,000</td>
                    <td>20,000</td>
                    <td>
                    $250
                    </td>
                    </tr>
                    <tr>
                    <td>COORDINATOR</td>
                    <td>50,000</td>
                    <td>50,000</td>
                    <td>
                    IPAD
                    </td>
                    </tr>
                    <tr>
                    <td>EXECUTIVE</td>
                    <td>100,000</td>
                    <td>100,000</td>
                    <td>
                    INTERNATIONAL TRIP
                     </td>
                    </tr>
                    <tr>
                    <td>SENIOR EXECUTIVE</td>
                    <td>250,000</td>
                    <td>250,000</td>
                    <td>
                    MACBOOK + IPHONE
                    </td>
                    </tr>
                    <tr>
                    <td>DIRECTOR</td>
                    <td>500,000</td>
                    <td>500,000</td>
                    <td>
                    $5000
                    </td>
                    </tr>
                    <tr>
                    <td>MARKETING DIRECTOR</td>
                    <td>1,000,000</td>
                    <td>1,000,000</td>
                    <td>
                    Car Award
                    </td>
                    </tr>
                    <tr>
                    <td>NATIONAL MARKETING DIRECTOR</td>
                    <td>2,500,000</td>
                    <td>2,500,000</td>
                    <td>
                    $15000
                    </td>
                    </tr>
                    <tr>
                    <td>REGIONAL MARKETING DIRECTOR</td>
                    <td>5,000,000</td>
                    <td>5,000,000</td>
                    <td>
                    $20000
                    </td>
                    </tr>
                    <tr>
                    <td>DIAMOND</td>
                    <td>7,500,000</td>
                    <td>7,500,000</td>
                    <td>
                    Car Award
                    </td>
                    </tr>
                    <tr>
                    <td>ROYAL DIAMOND</td>
                    <td>10,000,000</td>
                    <td>10,000,000</td>
                    <td>
                    APARTMENT IN HOME COUNTRY
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
