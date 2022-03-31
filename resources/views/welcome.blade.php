<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="#e9e8f0" name="theme-color" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/frontend/toastr/toastr.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home - Capital First</title>
    <!-- <link as="script" href="https://tokyosecurities.com/assets/theme/js/vendors/uikit.min.js" rel="preload">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/fa-brands-400.woff2" rel="preload"
        type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/fa-solid-900.woff2" rel="preload"
        type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/lato-v16-latin-700.woff2"
        rel="preload" type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/lato-v16-latin-regular.woff2"
        rel="preload" type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/montserrat-v14-latin-600.woff2"
        rel="preload" type="font/woff2"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon-precomposed">
    <script src="https://kit.fontawesome.com/23d9ae4e3d.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style-1.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style-2.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style-3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <style>
        .uk-sticky.uk-active a.uk-logo {
            width: 128px;
            height: 41px;
            font-size: 20px;
            /* background: url('../Images/logo.png'); */
            background-size: 99.7%;
        }

        .live {
            height: 430px;
            width: 580px;
        }

        @media (max-width: 1366px) {
            .live {
                width: 460px;
                margin-bottom: 20px;
            }

        }

        @media (max-width: 720px) {
            .live {
                width: 300px;
                margin-bottom: 20px;
            }

        }

    </style>
</head>

<body>
    @if (Session::has('contact-message'))
        <div class="alert alert-success" role="alert">
            <span class="alert-body">
                {{ Session::get('contact-message') }}
            </span>
        </div>
    @endif
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <header>
        <!-- Topbar -->
        <div class="uk-section uk-padding-small in-profit-ticker" style="padding: 0px !important;">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22US%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22Bitcoin%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22Ethereum%22%7D%5D%2C%22showSymbolLogo%22%3Atrue%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A46%2C%22utm_source%22%3A%22tokyosecurities.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
                        style="height: 50px; width: 100%;"></iframe>
                </div>

            </div>
        </div>
        <!-- Navbar -->
        <div class="uk-section uk-padding-remove-vertical">

            <nav class="uk-navbar-container uk-navbar-transparent"
                data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">

                            <a class="uk-logo" href="#">

                                Capital First
                            </a>

                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="/" style="color: #555555;">Home</a></li>
                            <li><a href="/about-us" style="color: #555555;">About Us</a></li>
                            <li><a class="nav-link scrollto" href="#contact" style="color: #555555;">Contact Us</a>
                            </li>
                            <li><a href="/legal-docs" style="color: #555555;">Legal Docs<i
                                        class="fas fa-gavel fa-sm"></i></a>
                            </li>
                        </ul>

                        <div class="uk-navbar-item uk-visible@m in-optional-nav">


                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="uk-button uk-button-text">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="uk-button uk-button-text">Sign
                                                up</a>
                                        @endif
                                @endif
                            </div>
                            @endif


                            {{-- <div>
                                <a class="uk-button uk-button-text" href="">Login</a>
                                <a class="uk-button uk-button-text" href="">Sign
                                    up</a>
                            </div> --}}
                        </div>
                    </div>
            </div>
            </nav>

            </div>

        </header>
        <main>
            <!-- Home Banner -->
            <div class="uk-section uk-padding-remove-vertical">
                <div class="in-slideshow uk-visible-toggle" data-uk-slideshow>
                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="uk-container">
                                <div class="uk-grid" data-uk-grid>
                                    <div class="uk-width-1-2@m">
                                        <div class="uk-overlay">
                                            <h1>Get more <span class="in-highlight">freedom</span> in the markets.</h1>
                                            <p class="uk-text-lead uk-visible@m">Trade Cryptocurrencies, Stock Indices,
                                                Commodities and Forex from a single account</p>
                                            <div class="in-slideshow-button">
                                                <a class="uk-button uk-button-primary uk-border-rounded"
                                                    href="{{ route('register') }}">Open
                                                    account</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-position-center">
                                        <img alt="slideshow-image" class="uk-animation-slide-top-small"
                                            data-src="{{ asset('assets') }}/frontend/images/1.png" data-uk-img
                                            height="540" src="" width="862">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-container">
                                <div class="uk-grid" data-uk-grid>
                                    <div class="uk-width-1-2@m">
                                        <div class="uk-overlay">
                                            <h1>Let top <span class="in-highlight">traders</span> do the job for you!</h1>
                                            <p class="uk-text-lead uk-visible@m">Covesting allows you to automatically copy
                                                top
                                                performing traders and achieve the returns</p>
                                            <div class="in-slideshow-button">
                                                <a class="uk-button uk-button-primary uk-border-rounded" href="#">Open
                                                    account</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-position-center">
                                        <img alt="slideshow-image" class="uk-animation-slide-top-small"
                                            data-src="{{ asset('assets') }}/frontend/images/2.png" data-uk-img
                                            height="540" src="" width="862">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" data-uk-slidenav-previous
                        data-uk-slideshow-item="previous" href="#"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" data-uk-slidenav-next
                        data-uk-slideshow-item="next" href="#"></a>
                    <div class="uk-container in-slideshow-feature uk-visible@m">
                        <div class="uk-grid uk-flex uk-flex-center">
                            <div class="uk-width-3-4@m">
                                <div class="uk-child-width-1-4" data-uk-grid>
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="fas fa-drafting-compass in-icon-wrap small circle uk-box-shadow-small"
                                                style="background-color: #4629ff;"></i>
                                        </div>
                                        <div>
                                            <p class="uk-text-bold uk-margin-remove">Enhanced Tools</p>
                                        </div>
                                    </div>
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="fas fa-book in-icon-wrap small circle uk-box-shadow-small"
                                                style="background-color: #4629ff;"></i>
                                        </div>
                                        <div>
                                            <p class="uk-text-bold uk-margin-remove">Trading Guides</p>
                                        </div>
                                    </div>
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="fas fa-bolt in-icon-wrap small circle uk-box-shadow-small"
                                                style="background-color: #4629ff;"></i>
                                        </div>
                                        <div>
                                            <p class="uk-text-bold uk-margin-remove">Fast execution</p>
                                        </div>
                                    </div>
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="fas fa-percentage in-icon-wrap small circle uk-box-shadow-small"
                                                style="background-color: #4629ff;"></i>
                                        </div>
                                        <div>
                                            <p class="uk-text-bold uk-margin-remove">0% Commission</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="uk-section uk-section-muted in-padding-large-vertical@s in-profit-9">
                <div class="uk-container">
                    <div class="uk-grid-divider uk-grid" data-uk-grid="">
                        <div class="uk-width-expand@m in-margin-top-20@s uk-first-column">
                            <h2>Trading products</h2>
                            <p>Choose from 6 asset classes and get access to 500+ trading instruments</p>
                        </div>
                        <div class="uk-width-2-3@m">
                            <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-text-center uk-grid"
                                data-uk-grid="">
                                <div class="uk-first-column">
                                    <i class="fas fa-euro-sign in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Forex</p>
                                </div>
                                <div>
                                    <i class="fab fa-btc in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Crypto</p>
                                </div>
                                <div>
                                    <i class="fas fa-chart-area in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Indexes</p>
                                </div>
                                <div>
                                    <i class="fas fa-file-contract in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Stocks</p>
                                </div>
                                <div>
                                    <i class="fas fa-tint in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Energy</p>
                                </div>
                                <div>
                                    <i class="fas fa-cube in-icon-wrap circle uk-box-shadow-small"
                                        style="color: #4629ff;"></i>
                                    <p class="uk-text-bold uk-margin-small-top">Commodities</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Choose Inc -->
            <div class="uk-section uk-padding-large in-padding-large-vertical@s in-profit-10">
                <div class="uk-container uk-background-contain uk-background-bottom-right">
                    <div class="uk-grid uk-grid-stack" data-uk-grid="">
                        <div class="uk-width-1-1 in-offset-bottom-20 uk-first-column">
                            <h2 class="uk-margin-small-bottom">Why choose Capital First?</h2>
                            <p class="uk-text-lead uk-margin-remove-top">We offer one-click trading experience with 3,000+
                                world-renowned markets.</p>
                        </div>
                    </div>
                    <div class="uk-grid-large uk-grid" data-uk-grid="">
                        <div class="uk-width-1-2@s uk-width-1-3@m uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-1.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Wide range of instruments</h4>
                            <p>We offer access to a wide range of asset classes,
                                including FX, metals, stocks and indices.
                            </p>
                        </div>
                        <div class="uk-width-1-2@s uk-width-1-3@m">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-2.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Unparalleled market conditions</h4>
                            <p>Whether you’re a trading beginner, a forex market expert or a long-term investor interested
                                in
                                stocks – you’ll find the trading account you’re looking for.</p>
                        </div>
                        <div class="uk-width-1-2@s uk-width-1-3@m">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-3.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Protection of funds</h4>
                            <p>Capital First provides its services to over 20k clients in 10+ countries around the world.
                                We
                                always
                                strictly abide by the regulations and the protection of our clients’ investment is our
                                primary
                                concern.</p>
                        </div>
                        <div class="uk-width-1-2@s uk-width-1-3@m uk-grid-margin uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-4.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Committed to forex education</h4>
                            <p>Build your trading skills with Capital First
                                Become a better trader
                                with our free educational resources.</p>
                        </div>
                        <div class="uk-width-1-2@s uk-width-1-3@m uk-grid-margin">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-5.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Regular contests &amp; promotions</h4>
                            <p>Everyone loves getting a little extra. That’s why we offer our loyal clients frequent
                                promotions
                                and a continuous cashback program.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What can you trade with Profit Inc? -->
            <div class="uk-section uk-padding-large uk-background-contain uk-background-bottom-center in-padding-large-vertical@s in-offset-top-40 in-profit-14"
                data-src="" data-uk-img="" style="background-image: url({{ asset('assets') }}/frontend/images/3.jpg);">
                <div class="uk-container uk-margin-bottom">
                    <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-text-center uk-grid uk-grid-stack"
                        data-uk-grid="">
                        <div class="uk-width-1-1 uk-first-column">
                            <h2>What can you trade with Capital First?</h2>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-6.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Forex</h4>
                            <p>The market is a global decentralized or over-the-counter market for the trading of
                                currencies.</p>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-7.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Shares</h4>
                            <p>A stock is a financial instrument that represents ownership in a company or corporation.</p>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-8.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Indices</h4>
                            <p>Is the instruments that give you the right to buy or sell specific security on a specific
                                date at
                                a specific price.</p>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <img alt="profit-icon" data-src="{{ asset('assets') }}/frontend/images/icon-9.png"
                                data-uk-img="" height="86" src="" width="86">
                            <h4 class="uk-heading-bullet uk-margin-top">Commodities</h4>
                            <p>A commodity is a basic good used in commerce that is interchangeable with other goods of the
                                same
                                type.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Fx & Spot Metal Quotes -->
            <!-- <div class="uk-section uk-padding-large in-padding-large-vertical@s in-profit-12">
                            <div class="uk-container">
                                <div class="uk-grid-large uk-flex uk-flex-center uk-grid" data-uk-grid="">
                                    <div class="uk-width-1-2@m uk-text-center uk-first-column">
                                        <div class="tradingview-widget-container">
                                            <div class="tradingview-widget-container__widget"></div>
                                            <iframe scrolling="no" allowtransparency="true" frameborder="0"
                                                src="https://s.tradingview.com/embed-widget/market-overview/?locale=en#%7B%22colorTheme%22%3A%22light%22%2C%22dateRange%22%3A%2212M%22%2C%22showChart%22%3Afalse%2C%22largeChartUrl%22%3A%22%22%2C%22isTransparent%22%3Afalse%2C%22showSymbolLogo%22%3Atrue%2C%22showFloatingTooltip%22%3Afalse%2C%22width%22%3A%22600%22%2C%22height%22%3A%22410%22%2C%22tabs%22%3A%5B%7B%22title%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22d%22%3A%22US%20100%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ADJI%22%2C%22d%22%3A%22Dow%2030%22%7D%2C%7B%22s%22%3A%22INDEX%3ANKY%22%2C%22d%22%3A%22Nikkei%20225%22%7D%2C%7B%22s%22%3A%22INDEX%3ADEU40%22%2C%22d%22%3A%22DAX%20Index%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22d%22%3A%22UK%20100%22%7D%5D%2C%22originalTitle%22%3A%22Indices%22%7D%2C%7B%22title%22%3A%22Futures%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME_MINI%3AES1!%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22CME%3A6E1!%22%2C%22d%22%3A%22Euro%22%7D%2C%7B%22s%22%3A%22COMEX%3AGC1!%22%2C%22d%22%3A%22Gold%22%7D%2C%7B%22s%22%3A%22NYMEX%3ACL1!%22%2C%22d%22%3A%22Crude%20Oil%22%7D%2C%7B%22s%22%3A%22NYMEX%3ANG1!%22%2C%22d%22%3A%22Natural%20Gas%22%7D%2C%7B%22s%22%3A%22CBOT%3AZC1!%22%2C%22d%22%3A%22Corn%22%7D%5D%2C%22originalTitle%22%3A%22Futures%22%7D%2C%7B%22title%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME%3AGE1!%22%2C%22d%22%3A%22Eurodollar%22%7D%2C%7B%22s%22%3A%22CBOT%3AZB1!%22%2C%22d%22%3A%22T-Bond%22%7D%2C%7B%22s%22%3A%22CBOT%3AUB1!%22%2C%22d%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBL1!%22%2C%22d%22%3A%22Euro%20Bund%22%7D%2C%7B%22s%22%3A%22EUREX%3AFBTP1!%22%2C%22d%22%3A%22Euro%20BTP%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBM1!%22%2C%22d%22%3A%22Euro%20BOBL%22%7D%5D%2C%22originalTitle%22%3A%22Bonds%22%7D%2C%7B%22title%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FX%3AEURUSD%22%7D%2C%7B%22s%22%3A%22FX%3AGBPUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDJPY%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCHF%22%7D%2C%7B%22s%22%3A%22FX%3AAUDUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCAD%22%7D%5D%2C%22originalTitle%22%3A%22Forex%22%7D%5D%2C%22utm_source%22%3A%22tokyosecurities.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22market-overview%22%7D"
                                                style="box-sizing: border-box; height: 410px; width: 500px;"></iframe>
                                        </div>

                                    </div>
                                    <div class="uk-width-1-2@m">
                                        <h2>Live Fx &amp; Spot Metal Quotes</h2>
                                        <ul class="uk-list uk-list-bullet in-list-check uk-margin-bottom">
                                            <li>Ultra-competitive pricing</li>
                                            <li>Trading flexibility</li>
                                            <li>Best Copy-Trading platform</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

            <div class="container">
                <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
                    <div class="col-md-6">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0" class="live"
                            src="https://s.tradingview.com/embed-widget/market-overview/?locale=en#%7B%22colorTheme%22%3A%22light%22%2C%22dateRange%22%3A%2212M%22%2C%22showChart%22%3Afalse%2C%22largeChartUrl%22%3A%22%22%2C%22isTransparent%22%3Afalse%2C%22showSymbolLogo%22%3Atrue%2C%22showFloatingTooltip%22%3Afalse%2C%22width%22%3A%22600%22%2C%22height%22%3A%22410%22%2C%22tabs%22%3A%5B%7B%22title%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22d%22%3A%22US%20100%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ADJI%22%2C%22d%22%3A%22Dow%2030%22%7D%2C%7B%22s%22%3A%22INDEX%3ANKY%22%2C%22d%22%3A%22Nikkei%20225%22%7D%2C%7B%22s%22%3A%22INDEX%3ADEU40%22%2C%22d%22%3A%22DAX%20Index%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22d%22%3A%22UK%20100%22%7D%5D%2C%22originalTitle%22%3A%22Indices%22%7D%2C%7B%22title%22%3A%22Futures%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME_MINI%3AES1!%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22CME%3A6E1!%22%2C%22d%22%3A%22Euro%22%7D%2C%7B%22s%22%3A%22COMEX%3AGC1!%22%2C%22d%22%3A%22Gold%22%7D%2C%7B%22s%22%3A%22NYMEX%3ACL1!%22%2C%22d%22%3A%22Crude%20Oil%22%7D%2C%7B%22s%22%3A%22NYMEX%3ANG1!%22%2C%22d%22%3A%22Natural%20Gas%22%7D%2C%7B%22s%22%3A%22CBOT%3AZC1!%22%2C%22d%22%3A%22Corn%22%7D%5D%2C%22originalTitle%22%3A%22Futures%22%7D%2C%7B%22title%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME%3AGE1!%22%2C%22d%22%3A%22Eurodollar%22%7D%2C%7B%22s%22%3A%22CBOT%3AZB1!%22%2C%22d%22%3A%22T-Bond%22%7D%2C%7B%22s%22%3A%22CBOT%3AUB1!%22%2C%22d%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBL1!%22%2C%22d%22%3A%22Euro%20Bund%22%7D%2C%7B%22s%22%3A%22EUREX%3AFBTP1!%22%2C%22d%22%3A%22Euro%20BTP%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBM1!%22%2C%22d%22%3A%22Euro%20BOBL%22%7D%5D%2C%22originalTitle%22%3A%22Bonds%22%7D%2C%7B%22title%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FX%3AEURUSD%22%7D%2C%7B%22s%22%3A%22FX%3AGBPUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDJPY%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCHF%22%7D%2C%7B%22s%22%3A%22FX%3AAUDUSD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCAD%22%7D%5D%2C%22originalTitle%22%3A%22Forex%22%7D%5D%2C%22utm_source%22%3A%22tokyosecurities.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22market-overview%22%7D"></iframe>
                    </div>
                    <div class="col-md-6" style="padding-left: 55px">
                        <h2>Live Fx &amp; Spot Metal Quotes</h2>
                        <ul class=" uk-list uk-list-bullet in-list-check uk-margin-bottom">
                            <li>Ultra-competitive pricing</li>
                            <li>Trading flexibility</li>
                            <li>Best Copy-Trading platform</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Trade with world-leading copy trading platform -->
            <div class="uk-section uk-section-secondary uk-padding-large uk-background-contain uk-background-bottom-center in-padding-large-vertical@s in-profit-3"
                style="background-color: #01123C;" data-src="{{ asset('assets') }}/frontend/images/4.png" data-uk-img>
                <div class="uk-container uk-margin-small-bottom">
                    <div class="uk-grid-large" data-uk-grid>
                        <div class="uk-width-1-2@m">
                            <h2>Trade with world-leading copy trading platform</h2>
                            <p class="uk-text-lead">We are committed to meeting your CFD and FX trading needs</p>
                        </div>
                        <div class="uk-width-1-1">
                            <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-margin-small-top" data-uk-grid>
                                <div>
                                    <h1 class="uk-heading-bullet">
                                        <span class="count" data-counter-end="5">0</span>M+
                                    </h1>
                                    <p>Equity Capital</p>
                                </div>
                                <div>
                                    <h1 class="uk-heading-bullet">
                                        <span class="count" data-counter-end="30">0</span>k+
                                    </h1>
                                    <p>Client Accounts</p>
                                </div>
                                <div>
                                    <h1 class="uk-heading-bullet">
                                        <span class="count" data-counter-end="1">0</span>.5M+
                                    </h1>
                                    <p>Trading Volume</p>
                                </div>
                                <div>
                                    <h1 class="uk-heading-bullet">
                                        <span class="count" data-counter-end="24">0</span>/5
                                    </h1>
                                    <p>Customer Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start trading
                        with
                        Profit Inc. -->
            <div class="uk-section uk-section-muted uk-padding-large in-padding-large-vertical@s in-profit-15">
                <div class="uk-container">
                    <div class="uk-grid uk-flex uk-flex-center uk-grid-stack" data-uk-grid="">
                        <div class="uk-width-1-1 uk-width-5-6@m uk-first-column">
                            <p class="uk-text-lead uk-margin-remove-bottom uk-text-center in-offset-top-10">Start trading
                                with
                                Profit Inc.</p>
                            <h2 class="uk-margin-small-top uk-text-center">Fast account opening in 3 simple steps</h2>
                            <div class="uk-grid-large uk-child-width-1-3@m uk-text-center uk-margin-medium-top uk-grid"
                                data-uk-grid="">
                                <div class="uk-first-column">
                                    <span class="in-icon-wrap circle large">1</span>

                                    <h4 class=" uk-margin-top">Register</h4>
                                    <p>Choose an account type and submit your application</p>
                                </div>
                                <div>
                                    <span class="in-icon-wrap circle large">2</span>

                                    <h4 class="uk-margin-top">Fund</h4>
                                    <p>Fund your account using a wide range of funding methods.</p>
                                </div>
                                <div>
                                    <span class="in-icon-wrap circle large">3</span>

                                    <h4 class="uk-margin-top">Trade</h4>
                                    <p>Get lucrative benefits from experienced traders.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="uk-container" id="contact">
                <div class="uk-grid uk-flex uk-flex-center in-contact-6">
                    <hr class="uk-margin-medium">
                    <h1 class="uk-margin-small-top uk-text-center">Let's <span class="in-highlight">get in touch</span>
                    </h1>
                    <form class="uk-form uk-grid-small uk-margin-medium-top uk-grid" data-uk-grid=""
                        action="{{ route('contact-store') }}" method="POST">
                        @csrf

                        {{-- <div class="uk-form uk-grid-small uk-margin-medium-top uk-grid" data-uk-grid=""> --}}

                        <div class="uk-width-1-2@s uk-inline uk-first-column">
                            <span class="uk-form-icon fas fa-user fa-sm"></span>
                            <input class="uk-input uk-border-rounded" id="name" name="name" placeholder="Full name"
                                type="text">
                        </div>
                        <div class="uk-width-1-2@s uk-inline">
                            <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                            <input class="uk-input uk-border-rounded" id="email" name="email" placeholder="Email address"
                                type="email">
                        </div>
                        <div class="uk-width-1-1 uk-inline uk-grid-margin">
                            <span class="uk-form-icon fas fa-pen fa-sm"></span>
                            <input class="uk-input uk-border-rounded" id="subject" name="subject" placeholder="Subject"
                                type="text">
                        </div>
                        <div class="uk-width-1-1 uk-grid-margin">
                            <textarea class="uk-textarea uk-border-rounded" id="message" name="message" placeholder="Message" rows="6"></textarea>
                        </div>
                        <div class="uk-width-1-1 uk-grid-margin">
                            <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" type="submit">Send
                                Message</button>
                        </div>
                        {{-- </div> --}}
                    </form>

                </div>
            </div>
            </div>
        </main>

        <!-- Footer -->
        <footer>

            <div style="background-color: #233A7D;"
                class="uk-section uk-section-primary uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top">
                <div class="uk-container">
                    <div class="uk-child-width-1-2@s uk-child-width-1-5@m uk-flex" data-uk-grid>
                        <div>
                            <h4 class="uk-heading-bullet">Overview</h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Stock indices</a></li>
                                <li><a href="#">Commodities</a></li>
                                <li><a href="#">Forex</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="uk-heading-bullet">Company</h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="uk-heading-bullet">Legal</h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy &amp; Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="uk-visible@m">
                            <h4 class="uk-heading-bullet">Support</h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Documentation</a></li>
                            </ul>
                        </div>
                        <div class="uk-flex-first uk-flex-last@m">
                            <ul class="uk-list uk-link-text">
                                <!-- <li><img alt=" logo" class="uk-margin-small-bottom" height="36" src="../Images/logo-2.png"
                                                    width="130"> -->
                                <span>Capital First</span>
                                </li>
                                <li><a href="#"><i class="fas fa-envelope uk-margin-small-right"></i><span
                                            class="__cf_email__"
                                            data-cfemail="681b1d1818071a1c283c070311073b0d0b1d1a011c010d1b460b0705"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uk-grid uk-flex uk-flex-center uk-margin-large-top" data-uk-grid>
                        <div class="uk-width-5-6@m uk-margin-bottom">
                            <div class="in-footer-warning in-margin-top-20@s">
                                <h5 class="uk-text-small uk-text-uppercase"><span style="background-color: #233A7D">Our
                                        Trading Platform</span></h5>
                                <p class="uk-text-small">
                                    Our trading platform is MT4, Payment Processing / e-wallets, Forex Services and Crypto
                                    Currency Services.
                                </p>
                                {{-- <p class="uk-text-small">
                                    Our trading platform is MT4, Our strategy manager trading is on
                                    MT4
                                    platform. We use the platform of MTFXG for all our trades on MT4.
                                    "MTFXG is incorporated in the Republic of Kazakhstan with Business Identification Number
                                    26342 BC2021 and has been registered as Financial Services Provider on the 25/12/2020
                                    with
                                    the Ministry of Economy. The company is entitled to provide the following services to
                                    customers within and outside the Republic of Kazakhstan according to the accreditation
                                    issued by the Agency for Regulation and Development of the Financial Market of the
                                    Republic
                                    of Kazakhstan, dated 24/02/2021 and file number 36-0-12/5/ЮЛ-C-265: Payment Processing /
                                    e-wallets, Forex Services and Crypto Currency Services."
                                    <br><small>In case of any dispute, MTFXG only deal with Capital First strategy
                                        manager.</small>
                                </p> --}}
                            </div>
                            {{-- <div class="in-footer-warning in-margin-top-20@s">
                                <h5 class="uk-text-small uk-text-uppercase"><span
                                        style="background-color: #233A7D">Disclosure</span></h5>
                                <p class="uk-text-small"> The Maximum protection of funds level is 70%, because a small
                                    amount
                                    of risk is necessary to generate any potential profits and our draw down limit is 30%.
                                    You
                                    should not invest more than you can afford to lose and should ensure that you fully
                                    understand the risks involved. Trading leveraged products may not be suitable for all
                                    investors. Trading non-leveraged products such as stocks also involves risk as the value
                                    of
                                    a stock can fall as well as rise, which could mean getting back less than you originally
                                    put
                                    in. Past performance is no guarantee of future results. Before trading, please take into
                                    consideration your level of experience, investment objectives and seek independent
                                    financial
                                    advice if necessary. It is the responsibility of the Client to ascertain whether he/she
                                    is
                                    permitted to use the services of the Capital First brand based on the legal
                                    requirements in
                                    his/her country of residence. Please read Capital First’s full Risk
                                    Disclosure.</p>
                            </div>
                            <div class="in-footer-warning in-margin-top-20@s">
                                <h5 class="uk-text-small uk-text-uppercase"><span
                                        style="background-color: #233A7D">Regional
                                        Restrictions</span></h5>
                                <p class="uk-text-small">Capital First brand does not provide services to residents
                                    of the USA, Japan,
                                    Canada, Suriname, the Democratic Republic of Korea, Iraq, Iran, Brazil, Syria. Find out
                                    more
                                    in the Regulations section of our FAQs.
                                </p>
                            </div>
                            <div class="in-footer-warning in-margin-top-20@s">
                                <h5 class="uk-text-small uk-text-uppercase"><span
                                        style="background-color: #233A7D">Intellectual Property Rights</span></h5>
                                <p class="uk-text-small">Any unauthorized duplication, publication or quotation
                                    from Capital First
                                    website, in part or whole, without the prior written consent of Capital First
                                    constitutes a
                                    violation of Intellectual Property Rights and will be subject to litigation. This
                                    includes
                                    downloading or accessing the brand name, logos, banner images, agreement, etc.), hence
                                    may
                                    not be used, copied or otherwise presented without consent in any way.</p>
                            </div> --}}
                        </div>
                        <div class="uk-width-1-2@m in-copyright-text">
                            <p>© Capital First 2022. All rights reserved.</p>
                        </div>
                        <div class="uk-width-1-2@m uk-text-right@m in-footer-socials">
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-visible@m">
                <a class="in-totop fas fa-chevron-up" style="background-color: #4629ff;" data-uk-scroll href="#"></a>
            </div>

        </footer>

        <script type="text/javascript" src="{{ asset('assets') }}/frontend/toastr/toastr.min.js"></script>
        <script>
            @if (Session::has('message'))
                var type ="{{ Session::get('alert-type', 'info') }}"
                switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
                }
            @endif
        </script>
        <script src="{{ asset('assets') }}/frontend/js/Script-main.js"></script>

        <script src="{{ asset('assets') }}/frontend/js/Script.js"></script>
        <script defer src="{{ asset('assets') }}/frontend/js/Script-defer.js"></script>
        <script src="{{ asset('assets') }}/frontend/js/Script-theme.js"></script>
    </body>

    </html>
