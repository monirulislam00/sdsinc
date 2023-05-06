<?php
    $dptname = DB::table('departments')->get()->all();
?>
<section id="bottom" style="padding-top: 15px">
    <div class="container fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="footer-logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
                </a>

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>SDSInc</h3>
                            <ul>
                                <li><a href="{{url('/About_of_SDSINC.')}}">About us</a></li>
                                {{-- <li><a href="copyright.html">Copyright</a></li> --}}
                                {{-- <li><a href="terms.html">Terms of use</a></li> --}}
                                {{-- <li><a href="privacy-policy.html">Privacy policy</a></li> --}}
                                <li><a href="{{url('/contact')}}">Contact us</a></li>
                            </ul>
                            <br />
                            <h3>Affiliated</h3>
                            <ul>

                                <li><a href="{{url('/affiliate')}}">Join Affiliate</a></li>

                            </ul>
                        </div>
                    </div>
                    <!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Support</h3>
                            <ul>
                                {{-- <li><a href="#">Faq</a></li> --}}
                                <li><a href="{{url('/blogs')}}">Blog</a></li>
                                <li><a href="{{url('/our_team')}}">Meet the team</a></li>
                                <li><a href="{{url('/service')}}">Service</a></li>
                                <li><a href="{{url('/portfolio')}}">Portfolio</a></li>
                                {{-- <li><a href="#">Documentation</a></li>
                                <li><a href="#">Refund policy</a></li>
                                <li><a href="billing.html">Billing system</a></li> --}}
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Developers</h3>
                            <ul>
                                @foreach ( $dptname as $dpt)
                                <li><a href="{{url('/our_team#'.$dpt->department_name)}}">{{$dpt->department_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Our Partners</h3>
                            <ul>
                                <li><a href="https://www.emirates.com/bd/english/">Emirates</a></li>
                                <li><a href="https://www.summitcommunications.net/">Summit Comunnication Ltd.</a></li>
                                <li><a href="https://www.emdad.ae/">EMDAD SERVICES LLC</a></li>
                            </ul>
                            {{--<br />
                             <h3>Careers</h3>
                            <ul>
                                <li><a href="join-us.html">Join Our Team</a></li>
                                <li><a href="#">We are hiring</a></li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 p-2">
                            <div class="widget">
                                <h3 class="fw-bold">Contact</h3>
                                <ul>
                                    <li>Situated in Sheikh Mohammed bin Rashid Blvd, Downtown Dubai, UAE</li>
                                    <li>email: info@sdsincbd.com</li>
                                    <li>
                                        <h4>880-178-1179-679</h4>
                                    </li>
                                    <li>
                                        <h4>880-156-8305-666</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 p-2">
                            <div class="widget">
                                <h3>Map</h3>
                                <img src="{{ asset('frontend/images/map.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 p-2">
                            <div class="widget ">
                                <h3>Subscribe</h3>
                                <form action="{{ route('subscribe') }}" method="post">
                                    @csrf
                                    <div class="flex gap-1 flex-wrap md:flex-nowrap">
                                        <input class="rounded ring-1 ring-orange border-0" type="email"
                                            placeholder="enter your email" aria-label="subscribe to get notified"
                                            name="subscriberEmail">
                                        <span style="background: #f37a61" class="input-group-text py-2"><button
                                                type="submit" class="  fw-medium text-light">Subscribe</button></span>
                                    </div>
                                    <small class="text-secondary">
                                        @error('subscriberEmail')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-3-->

                </div>
            </div>

        </div>
    </div>
</section>
<!--/#bottom-->

<!--footer-->
<footer id="footer" class="midnight-blue ">
    <div class="container">
        <div class="row" style="display: flex;align-items:center">
            <div class="col-sm-3">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </div>
            <div class="col-sm-5">
                &copy; 2020 <a target="_blank" href="{{ url('/') }}"
                    title="SDSInc One IT Development and Service Provide Company">Siams Development & Solution Inc</a>.
                All Rights Reserved.
            </div>
            <div class="col-sm-4">
                <ul class="pull-right footer-socials">
                    <li><a href="https://www.facebook.com/SDSINC.OFFICIAL"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com/IncSiams"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/sdsincbd"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://dribbble.com/SDSInc"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<!-- go to top -->
<button class="scroll-top">
    <i class="fa fa-angle-double-up"></i>
</button>
