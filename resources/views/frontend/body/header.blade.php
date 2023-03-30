<div id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="top-number">
                        <p><i class="fa fa-phone-square"></i> +0156 830 56 66</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="https://www.facebook.com/SDSINC.OFFICIAL"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://www.twitter.com/IncSiams"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/sdsincbd"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="https://dribbble.com/SDSInc"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                        {{-- <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
        <div class="sticky-area">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">

                </a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class=" scrollto" href="{{ url('/') }}">Home</a></li>
                        <li class="dropdown"><a class="nav-link scrollto" href="#about">About Us <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('frontend.aboutsds') }}">About Of SDSInc.</a></li>
                                <li><a href="{{ route('frontend.team') }}">Our Team</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="{{ route('frontend.service') }}">Services</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('frontend.portfolio') }}">Portfolio</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('frontend.blogs') }}">Blog</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('frontend.affiliate') }}">Affiliate</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('frontend.contact') }}">Contact</a></li>
                        {{-- <li><a class="nav-link scrollto font-bold text-danger" href="{{ url('/login') }}">Log in</a></li> --}}
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </div>
    </header><!-- End Header -->

</div>
<!--/header-->
