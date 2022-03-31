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
                <h5 class="card-title p-0 pt-4">$ 0</h5>
                <p class="card-text">This Month <i class="bi bi-person-lines-fill text-primary"></i></p>
                </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-20">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">$ 1402.2</h5>
                <p class="card-text">Total Earning <i class="bi bi-diagram-2 text-primary"></i></p>
                </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-20">
                <div class="card border-left-warning">
                <div class="card-body">
                <h5 class="card-title p-0 pt-4">
                $ 100.8 <small><a href="https://tokyosecurities.com/earning-account/move">Move</a></small> </h5>
                <p class="card-text">Pending <i class="bi bi-unlock-fill text-danger">
                Minimum: 10$ </i></p>
                </div>
                </div>
                </div>
                </div>
                <div class="card border-top-warning  border-bottom-warning">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-currency-dollar text-danger"></i> Earning Account</h5>
                <table class="table table-hover">
                <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Percentage</th>
                <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <th scope="row">1</th>
                 <td>2022-03-29</td>
                <td>$28.8</td>
                <td>0.16%</td>
                <td class="text-secondary">Pending</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>2022-03-28</td>
                <td>$23.4</td>
                <td>0.13%</td>
                <td class="text-secondary">Pending</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>2022-03-25</td>
                <td>$25.2</td>
                <td>0.14%</td>
                <td class="text-secondary">Pending</td>
                </tr>
                <tr>
                <th scope="row">4</th>
                <td>2022-03-24</td>
                <td>$23.4</td>
                <td>0.13%</td>
                <td class="text-secondary">Pending</td>
                </tr>
                <tr>
                <th scope="row">5</th>
                <td>2022-03-23</td>
                <td>$21.6</td>
                <td>0.12%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                <tr>
                <th scope="row">6</th>
                <td>2022-03-22</td>
                <td>$25.2</td>
                <td>0.14%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                <tr>
                <th scope="row">7</th>
                <td>2022-03-21</td>
                <td>$25.2</td>
                <td>0.14%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                <tr>
                <th scope="row">8</th>
                <td>2022-03-18</td>
                <td>$27</td>
                <td>0.15%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                <tr>
                <th scope="row">9</th>
                <td>2022-03-17</td>
                <td>$27</td>
                <td>0.15%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                <tr>
                <th scope="row">10</th>
                <td>2022-03-16</td>
                <td>$23.4</td>
                <td>0.13%</td>
                <td class="text-secondary">Completed</td>
                </tr>
                </tbody>
                </table>
                </div>
                <div class="card-footer">
                <nav>
                <ul class="pagination">
                <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item">
                <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                </li>
                </ul>
                </nav>
                </div>
                </div>


        </div>
    </div>
</div>
@endsection
