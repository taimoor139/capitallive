<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="#e9e8f0" name="theme-color" />
    <title>About - Capital First</title>
    <!-- <link as="script" href="https://tokyosecurities.com/assets/theme/js/vendors/uikit.min.js" rel="preload"> -->

    <!-- <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/fa-brands-400.woff2" rel="preload"
        type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/fa-solid-900.woff2" rel="preload"
        type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/lato-v16-latin-700.woff2"
        rel="preload" type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/lato-v16-latin-regular.woff2"
        rel="preload" type="font/woff2">
    <link as="font" crossorigin href="https://tokyosecurities.com/assets/theme/fonts/montserrat-v14-latin-600.woff2"
        rel="preload" type="font/woff2"> -->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon-precomposed">
    <script src="https://kit.fontawesome.com/23d9ae4e3d.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style-1.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style-2.css">
    <style>
        .uk-sticky.uk-active a.uk-logo {
            width: 128px;
            height: 41px;
            /* background: url('../Images/logo.png'); */
            background-size: 99.7%;
            font-size: 20px;
        }
    </style>
</head>

<body>
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
                        style="box-sizing: border-box; height: 70px; width: 100%;"></iframe>
                </div>

            </div>
        </div>
        <!-- Navbar -->
        <div class="uk-section uk-padding-small in-profit-ticker" style="padding: 0px !important;">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>

            </div>
        </div>
        <div class="uk-section uk-padding-remove-vertical">

            <nav class="uk-navbar-container uk-navbar-transparent"
                data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">

                            <a class="uk-logo" href="{{ url('/') }}">
                                <!-- <img alt="logo" class="in-offset-top-10" height="36" src="../Images/logo.png"
                                    width="130"> -->
                                Capital First
                            </a>

                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="{{ url('/') }}" style="color: #555555;">Home</a></li>
                            <li><a href="/about-us" style="color: #555555;">About Us</a></li>
                            <li><a class="nav-link scrollto" href="{{ url('/') }}#contact"
                                    style="color: #555555;">Contact Us</a>
                            </li>
                            <li><a href="/legal-docs" style="color: #555555;">Legal Docs<i
                                        class="fas fa-gavel fa-sm"></i></a></li>
                        </ul>
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="uk-button uk-button-text">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                            class="uk-button uk-button-text">Sign
                                            up</a>
                                        @endif
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

        </div>

    </header>
    <!-- MiddlePart -->
    <main>

        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-5@m uk-text-center">
                            <h1 class="uk-margin-small-bottom">Putting our clients first<br /><span
                                    class="in-highlight">since 2005</span>
                            </h1>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove-top">For more than 15 years, we’ve
                                been
                                empowering clients by helping them take control of their financial lives.</p>
                        </div>
                    </div>
                    <div class="uk-grid uk-grid-large uk-child-width-1@m uk-margin-medium-top" data-uk-grid>
                        <div class="uk-flex uk-flex-left">
                            <div class="uk-margin-right">
                                <i class="fas fa-leaf fa-lg in-icon-wrap circle primary-color"
                                    style="background-color: #4629ff;"></i>
                            </div>
                            <div>
                                <h3>What we do?</h3>
                                <p>As one of the successful brands, we are specialists in l trading, giving you the
                                    potential to generate financial returns on both rising and falling prices across FX,
                                    indices, commodities, and shares. Whether you’re an experienced trader or completely
                                    new
                                    to it, we’re here to help you find freedom in the financial markets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m">
                        <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                            <div class="uk-width-1-2@m">
                                <h4 class="uk-text-muted in-offset-bottom-10">Number speaks</h4>
                                <h1 class="uk-margin-medium-bottom">We always ready<br>for a <span
                                        class="in-highlight">challenge.</span>
                                </h1>
                            </div>
                            <div class="uk-width-1-2@m">
                                <div class="uk-margin-large" data-uk-grid>
                                    <div class="uk-width-1-3@m">
                                        <h1 class="uk-text-primary uk-text-right@m">
                                            <span style="color: #4629ff;" class="count" data-counter-end="1500">0</span>
                                        </h1>
                                        <hr class="uk-divider-small uk-text-right@m">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <h3>Trading instruments</h3>
                                        <p>Trade your favorite instruments from around the world.</p>
                                    </div>
                                </div>
                                <div class="uk-margin-large" data-uk-grid>
                                    <div class="uk-width-1-3@m">
                                        <h1 class="uk-text-primary uk-text-right@m">
                                            <span style="color: #4629ff;" class=" count" data-counter-end="16">0</span>
                                        </h1>
                                        <hr class="uk-divider-small uk-text-right@m">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <h3>Countries covered</h3>
                                        <p>Provide copy-trading services in 16 countries around the world.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <p class="uk-text-small">Our trading platform is MT4, Our strategy manager trading is on MT4
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
                            </p>
                        </div>
                        <div class="in-footer-warning in-margin-top-20@s">
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
                            <h5 class="uk-text-small uk-text-uppercase"><span style="background-color: #233A7D">Regional
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
                        </div>
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

    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="{{ asset('assets') }}/frontend/js/Script-main.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/Script.js"></script>
    <script defer src="{{ asset('assets') }}/frontend/js/Script-defer.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/Script-theme.js"></script>
</body>

</html>
