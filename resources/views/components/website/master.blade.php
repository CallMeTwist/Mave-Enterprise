<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ben Nnam Foundation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="/assets/img/logo/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/boot/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<!-- preloader end  -->
<!-- header-area start -->
<header id="top-menu" class="transparent-head pb-20">
    <div class="header-top-area head-top-03 about-head grey-bg2 pt-10 pb-10 mb-10 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="top-cta">
                        <span><i class="far fa-phone"></i> <b>Call</b> : {{ get_settings()->phone }}</span>
                        <span><i class="far fa-envelope"></i> <b>Email</b> : <a href="mailto:{{ get_settings()->email }}">{{ get_settings()->email }}</a></span>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 d-flex align-items-center justify-content-end">
                    <div class="header-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-vimeo-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header-area main-head-02 sticky-02">
        <div class="container custom-container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                    <div class="logo">
                        <a class="logo-img" href="/">
                            <img src="/assets/img/logo/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 d-none d-lg-block text-right">
                    <div class="main-menu main-menu-02 pr-50 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{ request()->is('welcome') ? 'active' : '' }}" href="/">Home</a></li>
                                <li><a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                                <li><a class="{{ request()->is('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a></li>
                                <li><a class="{{ request()->is('event*') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
                                <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-1 col-md-6 col-6 d-flex align-items-center justify-content-end">
                    <div class="hamburger-menu mr-20 d-md-block d-lg-none">
                        <a href="javascript:void(0);">
                            <i class="far fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area end -->

<!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>

    <!-- offset-sidebar start -->
    <div class="offset-sidebar">
        <div class="offset-widget offset-logo mb-30">
            <a href="/">
                <img src="/assets/img/logo/header_logo_one.png" alt="logo">
            </a>
        </div>
        <div class="offset-widget mb-40">
            <div class="info-widget">
                <h4 class="offset-title mb-20">About Us</h4>
                <p class="mb-30">
                    But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                    was born and will give you a complete account of the system and expound the actual teachings of
                    the great explore
                </p>
                <a class="theme_btn theme_btn_bg" href="contact.html">Contact Us <span><i
                            class="fas fa-heart"></i></span></a>
            </div>
        </div>
        <div class="offset-widget mb-30 pr-10">
            <div class="info-widget info-widget2">
                <h4 class="offset-title mb-20">Contact Info</h4>
                <p> <i class="fal fa-address-book"></i> 23/A, Miranda City Likaoli Prikano, Dope</p>
                <p> <i class="fal fa-phone"></i> +0989 7876 9865 9 </p>
                <p> <i class="fal fa-envelope-open"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="01686f676e416479606c716d642f626e6c">[email&#160;protected]</a> </p>
            </div>
        </div>
    </div>
    <!-- offset-sidebar end -->

    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <ul id="mobile-menu-active">
            <li><a class="{{ request()->is('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Home</a></li>
            <li><a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
            <li><a class="{{ request()->is('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a></li>
            <li><a class="{{ request()->is('event*') ? 'active' : '' }}"  href="{{ route('events') }}">Events</a></li>
            <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contacts Us</a></li>
        </ul>
    </nav>
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>
<!-- slide-bar end -->

<main>
    {!! $slot !!}
</main>

<!--footer-area start-->
<footer class="footer-area black-bg pos-rel pt-80 pb-50" style="background-image:url(/assets/img/bg/02.png)">
    <div class="container">
        <div class="row mb-20">
            <div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp2 animated" data-wow-delay='.1s'>
                <div class="footer__widget mb-30">
                    <h5 class="semi-02-title mb-25">Quick Links</h5>
                    <p>We are dedicated to transforming lives through education and community support, ensuring every individual has the opportunity to thrive and achieve their full potential.</p>
                    <div class="footer-log mt-25">
                        <a href="/" class="footer-logo mb-30"><img src="/assets/img/logo/logo.png" alt="" style="max-width: 300px;"></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                <div class="footer__widget fot_abot mb-30 pl-40">
                    <h5 class="semi-02-title mb-25">Quick Link</h5>
                    <ul class="fot-list">
                        <li><a href="{{ route('about') }}">Our Organization</a></li>
                        <li><a href="#">Become a Volunteer</a></li>
                        <li><a href="#">Global Sponsors</a></li>
                        <li><a href="{{ route('events') }}">Recent Events</a></li>
                        <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp2 animated" data-wow-delay='.5s'>
                <div class="footer__widget fot_abot mb-25">
                    <h5 class="semi-02-title mb-25">Photo Gallery</h5>
                    <div class="insta-feed">
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/01.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/02.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/03.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/04.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/05.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/06.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/07.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/08.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                        <a class="insta" href="#">
                            <img src="/assets/img/instagram/09.jpg" alt="">
                            <span><i class="far fa-plus"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp2 animated" data-wow-delay='.7s'>
                <div class="footer__widget fot__subscribe mb-30">
                    <h5 class="semi-02-title mb-25">Our Newsletters</h5>
                    <p class="mb-25">But I must explain to you how all
                        mistaken idea denouncing</p>
                    <div class="form-area mb-30">
                        <form action="form.php">
                            <input type="text" class="form-control" placeholder="Enter Your Email">
                            <button class="theme_btn theme_btn_bg mt-10">subscribe now <span><i class="fas fa-envelope"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--scroll-target-btn-->
        <!-- <a href="#top-menu" class="scroll-target"><i class="far fa-arrow-up"></i></a> -->
        <!--scroll-target-btn-->
        <div class="copy-right-area copy-area-02 pt-30">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="copyright text-center">
                        <p>Copyright © 2024, <span>Ben Nnam Foundation</span>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer-area end-->

<!-- JS here -->
</script><script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery.meanmenu.min.js"></script>
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/jquery.nice-select.js"></script>
<script src="/assets/js/ajax-form.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/waypoints.min.js"></script>
<script src="/assets/js/jquery.scrollUp.min.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.easypiechart.js"></script>
<script src="/assets/js/tilt.jquery.js"></script>
<script src="/assets/js/parallax.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/main.js"></script>
</body>

</html>
