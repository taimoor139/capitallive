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
                <div class="col-md-3 col-sm-6 mb-20 col-6">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">12</h5>
                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Left Members</p>
                </div>
                </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-20 col-6">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">12755</h5>
                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Left Bonus Points</p>
                 </div>
                </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-20 col-6">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">0</h5>
                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Right Members</p>
                </div>
                </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-20 col-6">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">0</h5>
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
                <input type="text" name="left_search" id="left_search" value="" class="search form-control" placeholder="start search here">
                <small class="pl-2 text-uppercase font-weight-bold text-muted">search</small>
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
                <option value="COORDINATOR" class="text-uppercase">COORDINATOR</option>
                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR EXECUTIVE</option>
                <option value="DIRECTOR" class="text-uppercase">DIRECTOR</option>
                <option value="MARKETING DIRECTOR" class="text-uppercase">MARKETING DIRECTOR</option>
                <option value="NATIONAL MARKETING DIRECTOR" class="text-uppercase">NATIONAL MARKETING DIRECTOR</option>
                <option value="REGIONAL MARKETING DIRECTOR" class="text-uppercase">REGIONAL MARKETING DIRECTOR</option>
                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                <option value="ROYAL DIAMOND" class="text-uppercase">ROYAL DIAMOND</option>
                </select>
                <small class="pl-2 text-uppercase font-weight-bold text-muted">Ranks</small>
                </div>
                <div class="col-md-2">
                <button type="submit" class="btn btn-warning btn-sm float-end w-100 py-2">Search
                </button>
                </div>
                </div>
                </div>
                </form>
                </div>
                <div class="card border-top-warning  border-bottom-warning">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-square text-danger"></i> Left Members</h5>
                <table class="table table-hover">
                <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Deposit</th>
                <th scope="col">Rank</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>1</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Muhammad Younus</td>
                <td>25040</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>2</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Aqeel Ahmed</td>
                <td>15000</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>3</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Haris111</td>
                <td>1740</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>4</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Umairshafiq</td>
                <td>1130</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>5</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Muhammad Umer</td>
                <td>1130</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>6</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Rizwan Iqbal</td>
                <td>1052</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>7</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Hamza Sarwar</td>
                <td>1101</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>8</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Fahad Tahir</td>
                <td>1700</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>9</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Ghasfar Ali Mirza</td>
                <td>1730</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>10</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Hamdan Kaiser Sheikh</td>
                <td>1700</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>11</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Fatima Jabeen</td>
                <td>25510</td>
                <td>STARTER</td>
                </tr>
                <tr>
                <td>12</td>
                <td>
                <img style="width: 20px; height: 20px" src="/assets/flags/pk.svg" alt="flag">
                Fatima Jabeen</td>
                <td>25510</td>
                <td>STARTER</td>
                </tr>
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
                <input type="text" name="right_search" id="right_search" value="" class="search form-control" placeholder="start search here">
                <input type="hidden" name="type" value="right">
                <small class="pl-2 text-uppercase font-weight-bold text-muted">search</small>
                </div>
                <div class="col-md-5">
                <select name="right_rank" id="right_rank" class="search form-control">
                <option value="">choose option</option>
                <option value="STARTER" class="text-uppercase">STARTER</option>
                <option value="BRONZE" class="text-uppercase">BRONZE</option>
                <option value="SILVER" class="text-uppercase">SILVER</option>
                <option value="GOLD" class="text-uppercase">GOLD</option>
                <option value="PLATINUM" class="text-uppercase">PLATINUM</option>
                <option value="COORDINATOR" class="text-uppercase">COORDINATOR</option>
                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR EXECUTIVE</option>
                <option value="DIRECTOR" class="text-uppercase">DIRECTOR</option>
                <option value="MARKETING DIRECTOR" class="text-uppercase">MARKETING DIRECTOR</option>
                <option value="NATIONAL MARKETING DIRECTOR" class="text-uppercase">NATIONAL MARKETING DIRECTOR</option>
                <option value="REGIONAL MARKETING DIRECTOR" class="text-uppercase">REGIONAL MARKETING DIRECTOR</option>
                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                <option value="ROYAL DIAMOND" class="text-uppercase">ROYAL DIAMOND</option>
                </select>
                <small class="pl-2 text-uppercase font-weight-bold text-muted">Ranks</small>
                </div>
                <div class="col-md-2">
                <button type="submit" class="btn btn-warning btn-sm float-end w-100 py-2">Search
                </button>
                </div>
                </div>
                </div>
                </form>
                </div>
                <div class="card border-top-warning  border-bottom-warning">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-square text-success"></i> Right Members</h5>
                <table class="table table-hover">
                <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Deposit</th>
                 <th scope="col">Rank</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td colspan="10" class="text-center text-danger">NO DATA</td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>

        </div>
    </div>
</div>
@endsection
