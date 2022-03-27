<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="#e9e8f0" name="theme-color" />
    <title>Legal Docs - Capital First</title>
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
            font-size: 20px;
            /* background: url('../Images/logo.png'); */
            background-size: 99.7%;
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
                        style="height: 50px; width: 100%;"></iframe>
                </div>
            </div>
        </div>
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
                                Capital First
                            </a>
                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Contact Us</a>
                            </li>
                            <li><a href="/legal-docs">Legal Docs<i class="fas fa-gavel fa-sm"></i></a></li>
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
    <!-- Middle Part -->
    <main>
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-text-center uk-margin-medium-bottom">
                        <h1>Legal Docs</h1>
                    </div>
                    <div class="uk-grid-divider uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>
                        <div>
                            <i class="fas fa-file fa-lg in-icon-wrap circle primary-color"
                                style="background-color: #4629ff;"></i>
                            <h3 class="uk-margin-top">Terms of Service</h3>
                            <p>Read the Terms of Service and License Agreement for Blockit as well as our BlockitApp
                                &amp; Developer Agreements.</p>
                            <ul class="uk-list uk-margin-top">
                                <li><a class="uk-flex uk-flex-middle" href="#"><i
                                            class="fas fa-file-pdf fa-sm uk-margin-small-right"></i>Term of Services for
                                        Blockit Trade</a></li>
                            </ul>
                        </div>
                        <div>
                            <i class="fas fa-globe fa-lg in-icon-wrap circle primary-color"
                                style="background-color: #4629ff;"></i>
                            <h3 class="uk-margin-top">Policies</h3>
                            <p>Find out more about what information we collect at Blockit, how we use it, and what
                                control you have over your data.</p>
                            <ul class="uk-list uk-margin-top">
                                <li><a class="uk-flex uk-flex-middle" href="#"><i
                                            class="fas fa-file-pdf fa-sm uk-margin-small-right"></i>Privacy
                                        Statement</a></li>
                            </ul>
                        </div>
                        <div class="uk-visible@m">
                            <i class="fas fa-shield-alt fa-lg in-icon-wrap circle primary-color"
                                style="background-color: #4629ff;"></i>
                            <h3 class="uk-margin-top">Resolution of Disputes</h3>
                            <p>Your investments are safe with us, issuance of 70% of your total capital in case you are
                                not making any type profit - Affiliate and Copy-Trading, because a small amount of risk
                                is necessary to generate any potential profits and our draw down limit is 30%.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m">
                        <div class="uk-card uk-card-large uk-card-default in-card-paper">
                            <div class="uk-card-body">
                                <h2>Company Faq</h2>
                                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                                    molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
                                    consectetur adipiscing elit labore et dolore magna veritatis et quasi architecto
                                    beatae vitae.</p>
                                <p>Aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                    excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit laborum.</p>
                                <hr class="uk-margin-medium-top uk-margin-small-bottom">
                                <ul class="in-faq-5" data-uk-accordion="collapsible: false">
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#">Brand Guidelines</a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list uk-list-bullet">
                                                <li>Follow the Company Brand Guides</li>
                                                <li>Never use Company in the plural or possessive form</li>
                                                <li>Never use Company trademark generically in referring to the product
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="uk-accordion-title" href="#">Specifically restricted uses</a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list uk-list-bullet">
                                                <li>Removing, distorting or altering any element of Company trademarks
                                                    or branding</li>
                                                <li>Shortening, abbreviating, or using acronyms out of Company
                                                    trademarks</li>
                                                <li>Combining your trademark or product name, visually or in text, with
                                                    any Company trademark</li>
                                                <li>Indicating Company is endorsing or promoting your trademark or
                                                    product</li>
                                                <li>Registering Company trademarks as or incorporated in social media
                                                    account names, or aliases</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="uk-accordion-title" href="#">Company Trademarks</a>
                                        <div class="uk-accordion-content">
                                            <p>Company trademarks include the following list. The absence of any Company
                                                trademark, product name, service name, or any other name from this list
                                                does not waive Company intellectual property rights.</p>
                                            <p>The Company logo and name is ® Registered in the Canada and The United
                                                States with registrations pending elsewhere. The ® Registered mark shall
                                                only be used in Canada and The United States until registrations are
                                                completed elsewhere.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div
                                    class="uk-card uk-card-default uk-card-small uk-card-body uk-border-rounded uk-margin-medium-top">
                                    <p class="uk-text-small">For general inquiries please contact <a
                                            class="uk-text-lowercase uk-link" href="mailto:"><span class="__cf_email__"
                                                data-cfemail="dfb3bab8beb39fafadb0b9b6abf1b6bb"></span></a>
                                    </p>
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

    <script src="{{ asset('assets') }}/frontend/js/Script-main.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/Script.js"></script>
    <script defer src="{{ asset('assets') }}/frontend/js/Script-defer.js"></script>
    <script src="{{ asset('assets') }}/frontend/js/Script-theme.js"></script>
</body>

</html>
