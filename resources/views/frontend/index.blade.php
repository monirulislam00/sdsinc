@extends('frontend.master')
@section('home_content')
@include('frontend.body.slider')
<section class="product py-5">
    <div class="container">
        <h1> <span>Exclusive</span> Product</h1>
        <div class="row">

            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="content mt-4 p-4 pb-0 relative" style="min-height: 250px">
                    <div class="row ">
                        <div class="col-3 pt-4">
                            <img  src="{{asset($product->image)}}" alt="" srcset="">
                        </div>
                        <div class="col-9 my-4">
                            <div class="title"><p class="text-xl  font-bold">{{ $product->title }}</p></div>
                            <div class="description text-zinc-500">
                                <p class="  font-semibold">{!! $product->description!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="type p-2 bg-orange-600 absolute top-0 right-0">
                        <p class="mb-0 text-white font-semibold">{{ $product->type }}</p>
                    </div>
                </div>
            </div>
             @endforeach
        </div>

    </div>
</section>
<section class="quality-service py-5">
    <div class="container">
        <h1> <span>Quality</span> Services</h1>
        <div class="row">
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/001-coding.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>Web Application Development</h3>
                    </div>
                    <div class="description">
                        <p>Say goodbye to disjointed business operations and hello to streamlined efficiency with our cutting-edge web app development services. We specialize in creating custom solutions that integrate all aspects of your business, from workflow automation to corporate system integration.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/002-development.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>Mobile Apps Development</h3>
                    </div>
                    <div class="description">
                        <p>Let us help you maximize the potential of mobile technology on your behalf by developing an advanced app for it. To cater to the specific requirements of your company, we are the name to rely on for developing your custom mobile applications.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/003-ecommerce.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>E-commerce Solution</h3>
                    </div>
                    <div class="description">
                        <p>Feeling like left out without the right e-commerce solution that can help your products or services reach the maximum customers? Guess what? Our expert team can get you that with a shopping cart, payment gateway, inventory management, or any other feature you’ll ask for.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/004-script.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>DevOps & Cloud Services</h3>
                    </div>
                    <div class="description">
                        <p>Unlock the full potential of your software development and IT operations with iBOS's DevOps Services. Our solutions are designed to automate away inefficiencies, improve the quality and reliability of your software, and optimize your IT operations lifecycle and workflows.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/005-artificial-intelligence.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>Business Intelligence</h3>
                    </div>
                    <div class="description">
                        <p>Utilize our state-of-the-art Business Intelligence services to bring your company to its maximum potential. We’re offering the know-how and resources to help you make sense of your data using a variety of methods, from visual analysis to predictive modeling.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/006-vr.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>AR/VR Services</h3>
                    </div>
                    <div class="description">
                        <p>Experience the future of technology with our innovative Augmented Reality and Virtual Reality solutions. Our team of experts utilizes the latest AR and VR technology to bring your products, services, and ideas to life.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/007-technical-support.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>IT Consulting Services</h3>
                    </div>
                    <div class="description">
                        <p>Unlock the full potential of your software development and IT operations with iBOS's DevOps Services. Our solutions are designed to automate away inefficiencies, improve the quality and reliability of your software, and optimize your IT operations lifecycle and workflows.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="content mt-4 p-3 shadow-md">
                    <div class="svg w-20 py-2.5">
                        <img src="{{asset('frontend/images/008-search.png')}}" alt="">
                    </div>
                    <div class="title">
                        <h3>Resource Augmentation</h3>
                    </div>
                    <div class="description">
                        <p>Making the right solutions isn’t the toughest job anymore. It’s finding the right resource to pull that off. We believe we can help you with that with our finest professionals, and our resource augmentation service is open for you.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section class="serve">
    <div class="container">
        <div class="title"><h2 class="font-bold"><span>INDUSTRIES WE</span> SERVE</h2></div>
        <div class="row">
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/005-sme.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">SME BUSINESS</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/015-thrift-shop.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">RMG SECTOR</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/013-factory.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">STEEL & ISPAT</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/004-enterprise.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">ENTERPRISES</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/011-agriculture.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">AGRO</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/001-startup.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">STARTUP</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/012-increase.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">Trading</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/009-automotive.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">automotive</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/002-cargo-ship.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">SHIPPING</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/003-gym.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">fitness</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/014-hosting-services.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">ISP & CABLE</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content mt-4 shadow-md">
                    <img src="{{asset('frontend/images/008-consult.png')}}" alt="" srcset="">
                    <p class="text-center font-bold">Service</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog my-5">
   <div class="container">
    <div class="title flex justify-between"><h2 class="font-bold"><span>OUR</span> BLOGS</h2>
        <a href="{{route("frontend.blogs")}}">View More</a>
    </div>
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 blog-item p-3">
                <a href="blog/{{ $blog->title }}" class="m-4"> 
                    <img style="width:100%" class=" border-0 p-0"
                        src="{{ $blog->image}}" width="100%" alt="tech blog" />
                    <h3 class="font-semibold text-dark py-2">{{ $blog->title }}</h3>
                </a>
            </div>
        @endforeach
    </div>
   </div>
</section>
{{-- <section id="feature">
    <div class="container">
        <div class="center fadeInDown">
            <h2>Features</h2>
            <p class="lead">Expert Team, Professional Service, Fast Work, Security Fast, Great Support 24/7, </p>
        </div>

        <div class="row">
            <div class="features d-flex justify-content-between">
                @foreach ($features as $feature)
                    <div class="col-md-4 fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <div class="icon">
                            <img src="{{$feature->image}}" alt="">
                        </div>
                        <h2>{{$feature->title}}</h2>
                        <p>{{$feature->description}}</p>
                    </div>
                </div>
                @endforeach

            </div>
            <!--/.services-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
<!--/#feature-->

<section id="recent-works">
    <div class="container">
        <div class="center fadeInDown">
            <h2>Recent Works</h2>
            <p class="lead">Our Recent Project For International Company.</p>
        </div>

        <div class="row">
            @foreach ($portfolio as $port)
                <div class="col-xs-12 col-sm-6 col-md-4 single-work">
                <div class="recent-work-wrap">
                    <img class="img-responsive" src="{{$port->image}}" alt="">
                    <div class="overlay">
                        <div class="recent-work-inner">
                            <a class="preview" href="" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!--/.row-->
        <div class="clearfix text-center">
            <br>
            <br>
            <a href="{{route('frontend.portfolio')}}" class="btn btn-primary">Show More</a>
        </div>
    </div>
    <!--/.container-->
</section>
<!--/#recent-works-->

<section id="testimonial">
    <div class="container">
        <div class="center fadeInDown">
            <h2>Testimonials</h2>
            <p class="lead">Many Company CEO, CTO and Chairman and International Client's feedback <br> and comments
            our work and support and development & solution service.</p>
        </div>
        <div class="testimonial-slider owl-carousel">
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client1.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('public/frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4> C.E.O-(MetLife) -  Michel A. Khalaf</h4>
                </div>
            </div>
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client2.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('public/frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4> C.E.O-(Almarai) - Sultan bin Mohammed Al Kabeer</h4>
                </div>
            </div>
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client3.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4> C.E.O-(Omantel) - Talal Bin Saeed Bin Marhoon Al Mamari</h4>
                </div>
            </div>
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client2.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('public/frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4> C.E.O-(Nestlé) - Ulf Mark Schneider</h4>
                </div>
            </div>
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client1.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('public/frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4> C.T.O-(Emirates) Alex Alexander</h4>
                </div>
            </div>
            <div class="single-slide">
                <div class="slide-img">
                    <img src="{{asset('public/frontend/images/client3.jpg')}}" alt="">
                </div>
                <div class="content">
                    <img src="{{asset('public/frontend/images/review.png')}}" alt="">
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price.</p>
                    <h4>C.E.O-(AT&T) John Stankey</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="partner">
    <div class="container">
        <div class="center fadeInDown">
            <h2>Our Partners</h2>
            <p class="lead">Our International & National, Corporate, Public LLC, Incorporate Company <br> Various Foreign International & Global Company with partnership with ourself.</p>
        </div>

        <div class="partners">
            <ul>
                @foreach ($partner as $part)
                <li>
                    <a href="#"><img class="img-responsive fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="{{$part->image}}" width="100px"></a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
    <!--/.container-->
</section> --}}
<!-- Preloader -->
{{-- <div id="preloader"></div> --}}
<!--/#partner-->
@endsection
