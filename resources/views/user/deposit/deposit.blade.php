@extends('layouts.user.master')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-top-warning border-bottom-warning">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-currency-exchange text-primary"></i> My Deposits
                    <a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addDeposit" style="float: right">New Deposit
                </a>
                    @include('user.deposit.addDeposit')
                </h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">300000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC6T2SZZO7WTIGUUL5WAGZWF
                                </small>
                            </td>
                            <td title="2022-03-28 05:31:04">Mar 28, 2022 - 05:31</td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                2x Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/bnb.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BNB</span>
                                <small class="text-md font-weight-bolder">10000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC4H1TUZMD1YXAYMAJFYT78P
                                </small>
                            </td>
                            <td title="2022-03-21 14:15:14">Mar 21, 2022 - 14:15</td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                3X Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">1000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC1AJKJC8MPHYV1OGVOFUKN2
                                </small>
                            </td>
                            <td title="2022-03-13 18:05:26">Mar 13, 2022 - 18:05</td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">1000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC32YECFSPVBKCIWSAAVVT5W
                                </small>
                            </td>
                            <td title="2022-03-11 07:46:59">Mar 11, 2022 - 07:46</td>
                        </tr>
                        <tr>
                            <td>
                                5
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/usdt.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>USDT</span>
                                <small class="text-md font-weight-bolder">1000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC3LHJRJU0JAH6ZIJY71M5B2
                                </small>
                            </td>
                            <td title="2022-03-07 07:59:50">Mar 07, 2022 - 07:59</td>
                        </tr>
                        <tr>
                            <td>
                                6
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">1649 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC34VCSCYASESKBYY5JQUQQB
                                </small>
                            </td>
                            <td title="2022-03-04 14:41:16">Mar 04, 2022 - 14:41</td>
                        </tr>
                        <tr>
                            <td>
                                7
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">10000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGC1RGBTUTBSPOS50EC5OLGNR
                                </small>
                            </td>
                            <td title="2022-03-01 15:59:09">Mar 01, 2022 - 15:59</td>
                        </tr>
                        <tr>
                            <td>
                                8
                            </td>
                            <td>
                                2x Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/usdt.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>USDT</span>
                                <small class="text-md font-weight-bolder">12000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGB6GIZALDA9DZIQWJ8D11KT6
                                </small>
                            </td>
                            <td title="2022-02-28 17:27:40">Feb 28, 2022 - 17:27</td>
                        </tr>
                        <tr>
                            <td>
                                9
                            </td>
                            <td>
                                2x Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">100000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGB7F4MXCSGLYUTLIWYA6FLJX
                                </small>
                            </td>
                            <td title="2022-02-28 16:50:01">Feb 28, 2022 - 16:50</td>
                        </tr>
                        <tr>
                            <td>
                                10
                            </td>
                            <td>
                                2x Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/usdt.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>USDT</span>
                                <small class="text-md font-weight-bolder">100000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGB52ABCFZPRS4GFBMG8WPHZF
                                </small>
                            </td>
                            <td title="2022-02-28 16:49:30">Feb 28, 2022 - 16:49</td>
                        </tr>
                        <tr>
                            <td>
                                11
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/btc.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>BTC</span>
                                <small class="text-md font-weight-bolder">1000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGB5JDOYO5CILUXIEKLBPOFFB
                                </small>
                            </td>
                            <td title="2022-02-28 16:49:10">Feb 28, 2022 - 16:49</td>
                        </tr>
                        <tr>
                            <td>
                                12
                            </td>
                            <td>
                                3x Factor
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/usdt.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>USDT</span>
                                <small class="text-md font-weight-bolder">18000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Completed
                                <br>
                                <small>395F5F808489A695CB7BDBC-AD
                                </small>
                            </td>
                            <td title="2022-01-16 20:15:34">Jan 16, 2022 - 20:15</td>
                        </tr>
                        <tr>
                            <td>
                                13
                            </td>
                            <td>
                                3X Level
                            </td>
                            <td>
                                <img src="https://tokyosecurities.com/img/usdt.svg"
                                    class="img-fluid rounded-circle" width="30px" alt="">
                                <span>USDT</span>
                                <small class="text-md font-weight-bolder">18000 <span
                                        class="text-muted">USD</span></small>
                            </td>
                            <td>
                                Cancelled
                                <br>
                                <small>CPGA7FSE4SMETONCSTFQYDB2KZ
                                </small>
                            </td>
                            <td title="2022-01-16 20:13:56">Jan 16, 2022 - 20:13</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
</div>
@endsection
