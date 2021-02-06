<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/font-awesome.min.css')}}">

    <!-- Ionicons CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/ionicons.min.css')}}">

    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/flaticon.min.css')}}">

    <!-- Icomoon CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/icomoon.min.css')}}">

    <!-- Tractor icon CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/tractor-icon.min.css')}}">

    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/swiper.min.css')}}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/animate.min.css')}}">

    <!-- Light gallery CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/lightgallery.min.css')}}">



    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">











    <!-- Revolution Slider CSS -->
    <link href="{{asset('revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('revolution/css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('revolution/custom-setting.css')}}" rel="stylesheet">


</head>

<body>
  <div id="app">
    <!--====================  preloader ====================-->
    <div class="preloader-activate preloader-active">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <img src="{{asset('img/preloader.gif')}}" alt="">
            </div>
        </div>
    </div>
    <!--====================  End of preloader  ====================-->
    <!--====================  header area ====================-->
    <div class="header-area header-sticky">
        <div class="header-area__desktop">
            <!--=======  header top bar  =======-->
            <div class="header-top-bar">
                <div class="container-fluid container-fluid--cp-60">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <!-- top bar right -->
                            <div class="top-bar-right-wrapper">
                                <ul class="topbar-info">
                                    <li><a href="mailto:fjrg.admon@montacargaszerimar.com"><i class="ion-ios-email-outline"></i>
                                            fjrg.admon@montacargaszerimar.com</a></li>
                                    <li><i class="ion-clock"></i> Lun - Sab: 9:00 - 19:00 / Dom Cerrado</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of header top bar  =======-->
            <!--=======  header navigation area  =======-->
            <div class="header-navigation-area">
                <div class="container-fluid container-fluid--cp-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-navigation-wrapper">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{asset('img/logo/logo-dark.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!-- header navigation -->
                                <div class="header-navigation border-left border-right">
                                    <div class="header-navigation__nav">
                                        <nav>
                                            @include('menus.menu')
                                        </nav>
                                    </div>
                                    <div class="header-navigation__contact">
                                        <div class="header-navigation__contact__image">
                                            <i class="ion-ios-telephone-outline"></i>
                                        </div>
                                        <div class="header-navigation__contact__content">
                                            <span class="text">Llámanos</span>
                                            <h6 class="sub-text"> <a href="tel:653 534 3827">653 534 3827</a> </h6>
                                            <h6 class="sub-text"> <a href="tel:653 535 3068 ">653 535 3068 </a> </h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- header search -->
                                <div class="header-search">
                                    <div class="social-links">
                                        <ul>
                                            <li><a href="//facebook.com" data-tippy="Facebook" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li><a href="//twitter.com" data-tippy="Twitter" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li><a href="//vimeo.com" data-tippy="Vimeo" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-vimeo"></i></a></li>
                                            <li><a href="//linkedin.com" data-tippy="Linkedin" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-linkedin"></i></a>
                                            </li>
                                            <li><a href="//skype.com" data-tippy="Skype" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-skype"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of header navigation area =======-->
        </div>
        <div class="header-area__mobile">
            <!--=======  mobile menu  =======-->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-sm-6 col-5">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{asset('img/logo/logo-dark.png')}}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-7">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content">
                                <div class="social-links d-none d-md-block">
                                    <ul>
                                        <li><a href="//facebook.com" data-tippy="Facebook" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="//twitter.com" data-tippy="Twitter" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="//vimeo.com" data-tippy="Vimeo" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-vimeo"></i></a></li>
                                        <li><a href="//linkedin.com" data-tippy="Linkedin" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-linkedin"></i></a></li>
                                        <li><a href="//skype.com" data-tippy="Skype" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__yellow" data-tippy-placement="bottom"><i class="ion-social-skype"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mobile-navigation-icon" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of mobile menu  =======-->
        </div>
    </div>
    <!--====================  End of header area  ====================-->
     @yield('content')
    <!--====================  footer area ====================-->
    <div class="footer-area section-space--inner--top--120 dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-content-wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <!-- footer intro wrapper -->
                                <div class="footer-intro-wrapper">
                                    <div class="footer-logo">
                                        <a href="#">
                                            <img src="{{asset('img/logo/logo-light.png')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="footer-desc">
                                      Av. Obregón # 5062 Col. Parque Industrial C.P. 53455. San Luis Rio Colorado, Sonora.
                                    </div>
                                    <div class="social-links">
                                        <ul>
                                            <li><a href="//facebook.com" data-tippy="Facebook" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="//twitter.com" data-tippy="Twitter" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="//vimeo.com" data-tippy="Vimeo" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-vimeo"></i></a></li>
                                            <li><a href="//linkedin.com" data-tippy="Linkedin" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-linkedin"></i></a></li>
                                            <li><a href="//skype.com" data-tippy="Skype" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-skype"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">EQUIPOS</h4>
                                    <ul class="footer-widget__navigation">
                                        @foreach ($typesEquipment as $item)
                                            <li><a href="{{route('equipments',[$item->slug])}}">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">COMPANY</h4>
                                    <ul class="footer-widget__navigation">
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Expertise</a></li>
                                        <li><a href="#">Sustainability</a></li>
                                        <li><a href="#">News & Media</a></li>
                                        <li><a href="#">Case Studies</a></li>
                                        <li><a href="#">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">INDUSTRIES</h4>
                                    <ul class="footer-widget__navigation">
                                        <li><a href="#">Electronic Materials</a></li>
                                        <li><a href="#">Gifts & Apparel</a></li>
                                        <li><a href="#">Auto Parts</a></li>
                                        <li><a href="#">Power Systems</a></li>
                                        <li><a href="#">Building Management</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright-wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-copyright-left">
                                    Sitio desarrollado por <a href="https://gavater.com" target="_blank" >&copy;Gavater</a> .{{date("Y")}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of footer area  ====================-->
    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__header">
            <div class="container-fluid--cp-60">
                <div class="row align-items-center">
                    <div class="col-md-4 col-sm-6 col-9">
                        <!-- logo -->
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{asset('img/logo/logo-dark.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-3">
                        <!-- mobile menu content -->
                        <div class="mobile-menu-content">
                            <a class="mobile-navigation-close-icon" id="mobile-menu-close-trigger" href="javascript:void(0)">
                                <i class="ion-ios-close-empty"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay__body">
            <nav class="offcanvas-navigation">
                @include('menus.mobile')
            </nav>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="ion-android-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->
    <!-- JS
    ============================================ -->
  </div>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- jQuery JS -->
    <script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>

    <!-- Popper JS -->
    <script src="{{asset('js/vendor/popper.min.js')}}"></script>

    <!-- Swiper Slider JS -->
    <script src="{{asset('js/plugins/swiper.min.js')}}"></script>

    <!-- Tippy JS -->
    <script src="{{asset('js/plugins/tippy.min.js')}}"></script>

    <!-- Light gallery JS -->
    <script src="{{asset('js/plugins/lightgallery.min.js')}}"></script>

    <!-- Light gallery video JS -->
    <script src="{{asset('js/plugins/lg-video.min.js')}}"></script>

    <!-- Waypoints JS -->
    <script src="{{asset('js/plugins/waypoints.min.js')}}"></script>

    <!-- Counter up JS -->
    <script src="{{asset('js/plugins/counterup.min.js')}}"></script>

    <!-- Appear JS -->
    <script src="{{asset('js/plugins/appear.min.js')}}"></script>

    <!-- Isotope JS -->
    <script src="{{asset('js/plugins/isotope.min.js')}}"></script>

    <!-- Mailchimp JS -->
    <script src="{{asset('js/plugins/mailchimp-ajax-submit.min.js')}}"></script>


    <!-- Main JS -->
    <script src="{{asset('js/main.js')}}"></script>

    <!-- Revolution Slider JS -->
    <script src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('revolution/revolution-active.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    <!--=====  End of JS files ======-->

    @yield('script')

</body>

</html>
