<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | D’PRESIDENTIAL LUXXETOUR</title>
    <meta content="D’PRESIDENTIAL LUXXETOUR" name="description">
    <meta content="D’PRESIDENTIAL LUXXETOUR" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="{{asset('assets-ii/css/master.css')}}">
    <!-- SWITCHER-->
    <link href="{{asset('assets-ii/plugins/switcher/css/switcher.css')}}" rel="stylesheet" id="switcher-css">
    <link href="{{asset('assets-ii/plugins/switcher/css/color1.css')}}" rel="alternate stylesheet" title="color1">
    <link href="{{asset('assets-ii/plugins/switcher/css/color2.css')}}" rel="alternate stylesheet" title="color2">
    <link href="{{asset('assets-ii/plugins/switcher/css/color3.css')}}" rel="alternate stylesheet" title="color3">
    <script src="{{asset('assets-ii/plugins/switcher/js/dmss.js')}}"></script>
    <link href="{{asset('css/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
    {{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    @livewireStyles
    <style>
        .home-input {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 1px;
        }

        .text-light {
            color: #fff;
        }

        .nav-link {
            color: #fff !important;
        }
        .input-group-text-left{
            border-top-left-radius: 0px!important;
            border-bottom-left-radius:0px !important;
            /* border-bottom-right-radius:0px !important; */
        }
        .input-group-text-right{
            border-top-right-radius: 0px!important;
            border-bottom-right-radius:0px !important;
            /* border-bottom-left-radius:0px !important; */
        }
        .my-form-control{
            height:48px !important;
        }
        .my-show-location{
            background:white;
            padding:15px;
            /* border-top-right-radius: 5px!important;
            border-top-left-radius: 5px!important; */
            border-radius:5px !important;
            width: 450px;
            cursor: pointer;
        }
        .my-show-location li{
            list-style: none !important;
        }
        .service-card{
            padding: 20px;
            background: rgb(245, 245, 245);
            border-radius: 15px;
            margin-top:15px;
            
        }
        .service-card a{
            background: #333;
            padding: 8px 20px;
            color: #fff !important;
            border-radius: 30px;
            margin-top: 10px !important;
        }
        .service-card div{
            font-size:12px !important;
            margin-bottom:10px;
        }
        .get-items-centered {
            display: flex !important;
            align-items: center;
        }

        /* Override flex display for small screens */
        @media (max-width: 991.98px) {
            .d-none {
                display: none !important;
            }
        }
        .my-btn-dark{
            background: #333;
            padding: 8px 20px;
            color: #fff !important;
            border-radius: 30px;
            margin-top: 10px !important;
        }
        .my-btn-light{
            background: #fff;
            padding: 8px 20px;
            color: #333f !important;
            border-radius: 30px;
            margin-top: 10px !important;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/icon-dark.png') }}">
</head>

<body class="page">
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->
    <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">

        <!-- Start Switcher-->
        <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i></div>
                <div class="form_holder">
                    <div class="predefined_styles">
                        <div class="skin-theme-switcher">
                            <h4>Color</h4><a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1"
                                style="background-color:#016f92;"></a><a class="styleswitch" href="javascript:void(0);"
                                data-switchcolor="color2" style="background-color:#9e8a2b;"></a><a class="styleswitch"
                                href="javascript:void(0);" data-switchcolor="color3"
                                style="background-color:#28af0f;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end switcher-->


        <!-- ==========================-->
        <!-- SEARCH MODAL-->
        <!-- ==========================-->
        <div class="header-search open-search">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 col-10 offset-1">
                        <div class="navbar-search">
                            <form class="search-global">
                                <input class="search-global__input" type="text" placeholder="Type to search"
                                    autocomplete="off" name="s" value="" />
                                <button class="search-global__btn"><i class="icon stroke icon-Search"></i></button>
                                <div class="search-global__note">Begin typing your search above and press return to
                                    search.</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button class="search-close close" type="button"><i class="fa fa-times"></i></button>
        </div>
        <!-- ==========================-->
        <!-- MOBILE MENU-->
        <!-- ==========================-->
        <div data-off-canvas="mobile-slidebar left overlay">
            <a class="navbar-brand scroll" href="/"><img class="scroll-logo" src="{{asset('logo/d-logo-light.png')}}"
                    height="40" alt="logo" /></a>

            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">About</a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/listing">Car Rentals</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/entertainment-listing">Entertainment Listing</a>
                </li>

                @if(!Auth::check())
                <li class="nav-item ">
                    <a class="nav-link" href="/dashboard2">Partner</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item "><a class="nav-link" href="/login">Login</a>

                </li>
                @else
                @if(Auth()->user()->role_id == 3)
                <li class="nav-item ">
                    <a class="nav-link" href="/dashboard2">Partner</a>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link" href="/dashboard2">Dashboard</a>
                </li>
                @endif
                <li class="nav-item "><a class="nav-link" href="/mybooking-orders">My Trips</a>
                    @endif
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button style="padding-right: 20px; color: #333 !important; margin-top: 10px;" type="submit"
                        class="btn btn-light btn-sm nav-link">Logout</button>
                </form>
                @endif
            </ul>
        </div>


        <header class="header header_main-pg">

            <div class="header-main">
                <div class="container" style="margin-top:25px;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <a class="navbar-brand navbar-brand_light scroll" href="/">
                                <img class="normal-logo" src="{{asset('logo/d-logo-light.png')}}" height="40"
                                    alt="logo" />
                            </a>
                            <a class="navbar-brand navbar-brand_dark scroll" href="/">
                                <img class="normal-logo" src="{{asset('logo/d-logo-light.png')}}" height="40"
                                    alt="logo" />
                            </a>
                        </div>
                        <div class="col-auto">
                            {{-- <div class="header-contacts d-none d-md-block d-lg-none d-xl-block">
                                <i class="ic text-primary fas fa-phone"></i>
                                <span class="header-contacts__inner">
                                    <span class="header-contacts__info">Call us for help</span>
                                        <a class="header-contacts__number" href="#">
                                            (258) 403 7961
                                        </a>
                                    </span>
                                </div> --}}
                            <!-- Mobile Trigger Start-->
                            <button class="menu-mobile-button js-toggle-mobile-slidebar toggle-menu-button d-lg-none"><i
                                    class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i></button>
                            <!-- Mobile Trigger End-->
                        </div>
                        <div class="col-lg d-none d-lg-block">
                            <nav class="navbar navbar-expand-md justify-content-end" id="nav">
                                <ul class="yamm main-menu navbar-nav">
                                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">About</a>

                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/listing">Car Rentals</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/entertainment-listing">Entertainment</a>
                                    </li>
                                    @if(!Auth::check())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/dashboard2">Partner</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/register">Register</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>
                                    @else
                                    @if(Auth()->user()->role_id == 3)
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/dashboard2">Partner</a>
                                    </li>
                                    @else
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/dashboard2">Dashboard</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/mybooking-orders">My Trips</a>
                                    </li>
                                    @endif

                                    @if(Auth::check())

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            style="color:#fffafa" class="btn btn-light btn-sm">LOGOUT</a>
                                    </form>
                                    @endif


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        

        {{ $slot }}
        <section class="section-default">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 text-center">
                        <div class="ui-subtitle">welcome to D’PRESIDENTIAL LUXXETOUR</div>
                        <h2 class="ui-title text-uppercase">premium car company</h2>
                        <div class="ui-decor bg-primary"></div>
                        <p>Et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ull laboris aliquip
                            ex
                            ea commodo consequat. Duis yirure dolorin reprehenderits volupta velit dolore fugiat nulla
                            pariatur excepteur sint occaecat cupidatat. Non proident sunt ind culpa qudesa officia
                            deserunt
                            mollit anim est laborum sed per unde omnis iste natus error sit voluptatem accusantium
                            dolore
                            mque.</p>
                    </div>
                </div>
                <div class="b-advantages-group row">
                    <div class="col-lg-4">
                        <div class="b-advantages row no-gutters">
                            <div class="col-auto"><i class="ic flaticon-lock"></i></div>
                            <div class="b-advantages__title col">We have the largest cars dealership</div>
                        </div>
                        <!-- end .b-advantages-->
                    </div>
                    <div class="col-lg-4">
                        <div class="b-advantages row no-gutters active">
                            <div class="col-auto"><i class="ic flaticon-vehicle-3"></i></div>
                            <div class="b-advantages__title col">We offers the best cars prices for all</div>
                        </div>
                        <!-- end .b-advantages-->
                    </div>
                    <div class="col-lg-4">
                        <div class="b-advantages row no-gutters">
                            <div class="col-auto"><i class="ic flaticon-toolbox-1"></i></div>
                            <div class="b-advantages__title col">We have modern workshop checkups</div>
                        </div>
                        <!-- end .b-advantages-->
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="section-area">
            <div class="container">
                <div class="text-center">
                    <div class="ui-subtitle">choose your dream cars</div>
                    <h2 class="ui-title text-uppercase">Latest offers</h2>
                    <div class="ui-decor bg-primary"></div>
                </div>
            </div>


            <div class="b-goods-slider js-slider"
                data-slick="{&quot;slidesToShow&quot;: 3, &quot;slidesToScroll&quot;: 1, &quot;autoplay&quot;: false, &quot;responsive&quot;: [{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1}}]}">
                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/1.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/2.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/3.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/1.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/2.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

                <div class="b-goods-slider__item">
                    <div class="b-goods-slider__img"><img class="img-scale"
                            src="{{asset('assets-ii/media/content/b-goods-slider/3.png')}}" alt="foto" /></div>
                    <div class="b-goods-slider__main">
                        <div class="b-goods-slider__title">Lexus A35 Quad</div>
                        <div class="b-goods-slider__price">Price:<strong class="text-primary"> 65,400</strong></div>
                        <ul class="b-goods-slider__list list-unstyled">
                            <li class="b-goods-slider__desrip">New</li>
                            <li class="b-goods-slider__desrip">2019</li>
                            <li class="b-goods-slider__desrip">Manual</li>
                            <li class="b-goods-slider__desrip">Petrol</li>
                            <li class="b-goods-slider__desrip">54k mi</li>
                        </ul>
                    </div>
                </div>
                <!-- end .b-goods-->

            </div>

        </section> --}}
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer-section footer-section_info">
                            <div class="footer__title"><img src="{{asset('logo/d-logo-light.png')}}" height="40"></div>
                            {{-- <div class="footer__slogan">autos dealers</div> --}}
                            <div class="footer-info">Eipisicing elit sed do eiusmod tempor laboe dolore magna aliqa Ut
                                enim ad
                                minim veniam quis nostrud exercitation ullam.</div>
                            <div class="footer-contacts">
                                <div class="footer-contacts__item"><i
                                        class="ic fas fa-map-marker-alt text-primary"></i>Fairview
                                    Ave, El Monte, CA 91732</div>
                                <div class="footer-contacts__item"><i class="ic fas fa-envelope text-primary"></i><a
                                        href="mailto:support@dpresidentialluxxetour.com">support@dpresidentialluxxetour.com</a>
                                </div>
                                {{-- <div class="footer-contacts__item">
                                    <i class="ic far fa-clock text-primary"></i>
                                    Mon to Fri :
                                    9:00am to 6:00pm
                                </div> --}}

                                <a class="footer-contacts__phone" href="tel:2584037961">
                                    (258) 403 7961
                                </a>
                                <div class="text-left">
                                    <ul class="footer-soc list-unstyled" style="margin-top:14px !important">
                                        <li class="footer-soc__item"><a class="footer-soc__link" href="#"
                                                target="_blank"><i class="ic fab fa-twitter"></i></a></li>
                                        <li class="footer-soc__item"><a class="footer-soc__link" href="#"
                                                target="_blank"><i class="ic fab fa-facebook"></i></a></li>
                                        <li class="footer-soc__item"><a class="footer-soc__link" href="#"
                                                target="_blank"><i class="ic fab fa-linkedin"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="footer-section footer-section_link">
                                    <h3 class="footer-section__title">Links</h3><i class="ui-decor bg-primary"></i>
                                    <ul class="footer-list list-unstyled">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Car Rentals</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                </section>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <section class="footer-section footer-section_subscribe">
                            <h3 class="footer-section__title">Feel Free to reach us</h3><i
                                class="ui-decor bg-primary"></i>
                            <form class="footer-form">
                                <div class="footer-form__info">Drop us an email and we will reach you within 24 hours
                                </div>
                                <div class="form-group">
                                    <input class="footer-form__input form-control" type="email"
                                        placeholder="your email">
                                </div>
                                <button class="btn btn-sm btn-primary">Subscribe</button>
                            </form>
                        </section>
                    </div>
                </div>

                <div class="footer-copyright">
                    Copyrights (c) {{ date('Y')}} D’PRESIDENTIAL LUXXETOUR. All rights reserved.
                    <a class="footer-copyright__link" href="privacy-policy.html">Privacy Policy</a>
                </div>
            </div>
        </footer>
        <!-- .footer-->
    </div>
    <!-- end layout-theme-->


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <script src="{{asset('assets-ii/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets-ii/js/jquery-migrate-1.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{asset('assets-ii/js/popper.min.js')}}"></script>
    <script src="{{asset('assets-ii/js/bootstrap.min.js')}}"></script>
    <!---->
    <!-- Color scheme-->
    <script src="{{asset('assets-ii/plugins/switcher/js/dmss.js')}}"></script>
    <!-- Select customization & Color scheme-->
    <script src="{{asset('assets-ii/js/bootstrap-select.min.js')}}"></script>
    <!-- Pop-up window-->
    <script src="{{asset('assets-ii/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- Headers scripts-->
    <script src="{{asset('assets-ii/plugins/headers/slidebar.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/headers/header.js')}}"></script>
    <!-- Mail scripts-->
    <script src="{{asset('assets-ii/plugins/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/contact_me.js')}}"></script>
    <!-- Filter and sorting images-->
    <script src="{{asset('assets-ii/plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/isotope/imagesLoaded.js')}}"></script>
    <!-- Progress numbers-->
    <script src="{{asset('assets-ii/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js')}}"></script>
    <!-- Animations-->
    <script src="{{asset('assets-ii/plugins/scrollreveal/scrollreveal.min.js')}}"></script>
    <!-- Scale images-->
    <script src="{{asset('assets-ii/plugins/ofi.min.js')}}"></script>
    <!-- Main slider-->
    <script src="{{asset('assets-ii/plugins/slider-pro/jquery.sliderPro.min.js')}}"></script>
    <!-- Sliders-->
    <script src="{{asset('assets-ii/plugins/slick/slick.js')}}"></script>
    <!-- Slider number-->
    <script src="{{asset('assets-ii/plugins/noUiSlider/wNumb.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/noUiSlider/nouislider.min.js')}}"></script>
    <!-- User customization-->
    <script src="{{asset('assets-ii/js/custom.js')}}"></script>
    <!-- Main slider-->
    <script src="{{asset('assets-ii/plugins/slider-pro/jquery.sliderPro.min.js')}}"></script>
    <!-- Sliders-->
    <script src="{{asset('assets-ii/plugins/slick/slick.js')}}"></script>
    <!-- Slider number-->
    <script src="{{asset('assets-ii/plugins/noUiSlider/wNumb.js')}}"></script>
    <script src="{{asset('assets-ii/plugins/noUiSlider/nouislider.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>


    <script>
        document.addEventListener('livewire:load', function () {
         window.addEventListener('notify', event => {
             toastr[event.detail.type](event.detail.message);
         });
     });
     
    </script>
    @livewireScripts
</body>

</html>