@extends('frontend.master')
@section('home_content')
    <div class="page-title" style="background-image: url({{ asset($service->image) }})">
        <h1>{{ $service->title }}</h1>
    </div>
    <section id="single-service" style="background: #fff">
        <div class=" container-fluid">
            <br />
            <br />
            <div class="row service-section  p-3">
                <div class="col-md-6">
                    <h1 class="fw-bold primary-light">{{ $service->title }}</h1>
                    <br />
                    <p class="" style="text-align: justify">{!! $service->description !!}</p>
                    <br />
                    {{-- <h2>Price: ${{ $service->price }}</h2> --}}
                    <br />
                    <a class="btn btn-info plan-button my-2 two">RQUEST A DEMO</a>
                    <a class="btn btn-info plan-button my-2 one" href="#plans">See Our Plans</a>
                </div>
                <div class="col-md-6 common-div">
                    <img lazyload="true" class="common-image float-end" src="{{ asset('/') . $service->image }}"
                        alt="">
                </div>
            </div>

            <div class="container " style="display: flex;align-items:center;flex-direction:column">
                <div class="col-md-10  text-center">
                    <h1 class="p-3 fw-bold">Here's Our <b class="primary-light">Packages</b></h1>
                    <p>
                        You can Either any of them here. Also, you can order a custom package by clicking on the <a
                            href="#customize" class="text-blue-500" style="text-decoration: underline">customize
                            button</a>
                    </p>
                    <p>
                        We are always ready to serve you
                    </p>
                    {{-- <a class="link-primary" href="#">Take The Platform Tour ></a> --}}
                </div>
            </div>
            <div class="row py-5" id="plans">
                <div class="col-md-4">
                    <div class="plan-card p-1">

                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3"
                                src="{{ asset('image/service/quality.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="text-center primary-light fw-bold">PLATINUM</h2>
                        </div>
                        <div class="card-description">
                            <p class="" style="text-align: justify;">
                                {!! $service->platinum_des !!}
                            </p>
                        </div>
                        <h2> $ {{ $service->platinum_price }}</h2>
                        <a class="btn btn-info plan-button my-2 one" href="">RQUEST A DEMO</a>
                        <a class="btn btn-info plan-button my-2 two" href="">Buy Now</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="plan-card p-1">

                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3"
                                src="{{ asset('image/service/quality.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="text-center fw-bold primary-light">GOLD</h2>
                        </div>
                        <div class="card-description">
                            <p class="" style="text-align: justify;">
                                {!! $service->gold_des !!}
                            </p>
                        </div>
                        <h2> $ {{ $service->gold_price }}</h2>
                        <a class="btn btn-info plan-button my-2 one" href="">RQUEST A DEMO</a>
                        <a class="btn btn-info plan-button my-2 two" href="">Buy Now</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="plan-card p-1">

                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3"
                                src="{{ asset('image/service/quality.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="text-center primary-light fw-bold">SILVER</h2>
                        </div>
                        <div class="card-description">
                            <p class="" style="text-align: justify;">
                                {!! $service->silver_des !!}
                            </p>

                        </div>
                        <h2> $ {{ $service->silver_price }}</h2>
                        <a class="btn btn-info plan-button my-2 one" href="">RQUEST A DEMO</a>
                        <a class="btn btn-info plan-button my-2 two" href="">Buy Now</a>

                    </div>
                </div>
                <div class="col-md-4" id="customize">
                    <div class="plan-card p-1">

                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3"
                                src="{{ asset('image/service/quality.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="text-center primary-light fw-bold">CUSTOMIZE</h2>
                        </div>
                        <div class="card-description">
                            <p class="" style="text-align: justify;">
                                If you're looking for a package that you can customize to your specific needs, look no
                                further than our customizable package options. Our packages are designed to be flexible and
                                versatile, allowing you to personalize them to suit your preferences.
                                <br>
                                With our user-friendly customization tools and expert customer service, you can easily
                                tell us the options you want and make any necessary adjustments to create a package that
                                perfectly meets your needs. Our goal is to make the customization process as easy and
                                straightforward as possible, so you can focus on creating a package that truly stands out.
                            </p>
                        </div>
                        <h3 class="font-bold text-xl">Price: Based on your features</h3>
                        {{-- <a class="btn btn-info plan-button my-2 one" href="">RQUEST A DEMO</a> --}}
                        <a class="btn btn-info plan-button my-2 one" href="">Customize</a>
                    </div>
                </div>

                <div class="container" style="display: flex;align-items:center;flex-direction:column">
                    <div class="col-md-10  text-center">
                        <h1 class="p-5 fw-bold">No Matter How Complex Of Business. We Provide The<b class="primary-light">
                                Unlimited HR Software</b> Experince</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est voluptatibus quo</p>
                    </div>
                </div>
            </div>
            <img lazyload="true" src="{{ asset('frontend/images/team.png') }}" alt="" class="img-fluid">
            <br />
            <br />
            <div class=" p-5">
                <div class="row blue-cards ">
                    <div class="col-md-4 blue-card   p-5 ">
                        <img lazyload="true" src="{{ asset('frontend/images/card-1.png') }}" alt="">
                        <h2 class="fw-bold">ONBOARD YOUR TALENTS</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero error adipisci, consectetur
                            dolores
                            consequuntur explicabo?</p>
                    </div>
                    <div class="col-md-4 blue-card p-5 ">
                        <img lazyload="true" src="{{ asset('frontend/images/card-2.png') }}" alt="">
                        <h2 class="fw-bold">ONBOARD YOUR TALENTS</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero error adipisci, consectetur
                            dolores
                            consequuntur explicabo?</p>
                    </div>
                    <div class="col-md-4 blue-card   p-5 ">
                        <img lazyload="true" src="{{ asset('frontend/images/card-3.png') }}" alt="">
                        <h2 class="fw-bold">ONBOARD YOUR TALENTS</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero error adipisci, consectetur
                            dolores
                            consequuntur explicabo?</p>
                    </div>
                </div>
            </div>
            <div class=" p-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="fw-bold">PeopleDesk: The Most Affordable <span class="primary-light">Saas Based
                                HR</span>
                            Mangement Sotware
                        </h1>
                        <br />
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, eaque labore molestiae consequatur
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                            <br />
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, eaque labore molestiae consequatur
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                        </p>
                    </div>
                    <div class="col-md-6 common-div">
                        <img lazyload="true" src="{{ asset('frontend/images/sassed.png') }}" alt=""
                            class="common-image">
                    </div>
                </div>
            </div>
            <div class="container" style="display: flex;align-items:center;flex-direction:column">
                <div class="col-md-12  text-center">
                    <div class="mb-5">
                        <h1 class="py-3 fw-bold">It's Not the <b class="primary-light">
                                Typical</b> Cloud Based Software</h1>

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est voluptatibus quo</p>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-3 ">
                            <div class="bg-light p-2 service-support-card rounded p-3 ">
                                <img class="m-auto" lazyload="true" style="height: 138px;width:auto"
                                    src="{{ asset('frontend/images/service-suport-card-1.png') }}" alt="">
                                <h2>Advanced Technology</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="bg-light p-2 service-support-card rounded p-3 ">
                                <img class="m-auto" lazyload="true" style="height: 138px;width:auto"
                                    src="{{ asset('frontend/images/service-suport-card-2.png') }}" alt="">
                                <h2>Ballance Budget Control</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="bg-light p-2 service-support-card rounded p-3 ">
                                <img class="m-auto" lazyload="true" style="height: 138px;width:auto"
                                    src="{{ asset('frontend/images/service-suport-card-3.png') }}" alt="">
                                <h2>Top natch support</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="bg-light p-2 service-support-card rounded p-3 ">
                                <img class="m-auto" lazyload="true" style="height: 138px;width:auto"
                                    src="{{ asset('frontend/images/service-suport-card-4.png') }}" alt="">
                                <h2>Efficient Communication</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid py-5" id="fantastic">
                <div class="mb-5">
                    <h1 class="py-2 fw-bold text-center">Let's Be <span class="primary-light">Fantastic</span>
                        Together
                    </h1>
                    <p class="text-center py-2 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                </div>
                <div class="row " style="display: flex;align-items:center">
                    <div class="col-md-6">
                        <br />
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, eaque labore molestiae consequatur
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                            <br />
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, eaque labore molestiae consequatur
                            perspiciatis autem quos quo quia! Dignissimos inventore veniam aliquam magnam architecto?
                            Debitis!
                        </p>
                        <br />
                        <div class=" mt-3 plan-button my-2 one btn btn-success">LET'S TALK</div>
                    </div>
                    <div class="col-md-6 common-div">
                        <img lazyload="true" class="img-fluid float-end"
                            src="{{ asset('frontend/images/service-contact.png') }}" alt=""
                            class="common-image">
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="mb-5  text-center">
                    <h1 class="py-3 fw-bold">Why you need <b class="primary-light">HR Software </b></h1>
                </div>
                <div class="row marked-list">
                    <div class="col-md-6 ">
                        <ul class="float-end">
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i> Imporove Working Efficency</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                            <li><i class="icofont-checked"></i>Imporove Working Efficency</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <h1 class="pb-5 mb-5 fw-bold text-center">Why We're The <span class="primary-light">Best</span>
                </h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="bg-light p-4 ">
                            <img lazyload="true" src="{{ asset('frontend/images/wearebest-1.png') }}" alt="">
                            <h2 class="fw-bold">Customization</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab asperiores dolorem nesciunt
                                quidem,
                                at eius, accusantium velit deleniti atque, excepturi ut. Explicabo odio libero vitae?</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light p-4 ">
                            <img lazyload="true" src="{{ asset('frontend/images/wearebest-2.png') }}" alt="">
                            <h2 class="fw-bold">Training & Execution</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab asperiores dolorem nesciunt
                                quidem,
                                at eius, accusantium velit deleniti atque, excepturi ut. Explicabo odio libero vitae?</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light p-4 ">
                            <img lazyload="true" src="{{ asset('frontend/images/wearebest-3.png') }}" alt="">
                            <h2 class="fw-bold">Technical Assistance</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab asperiores dolorem nesciunt
                                quidem,
                                at eius, accusantium velit deleniti atque, excepturi ut. Explicabo odio libero vitae?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5 ">
                <h1 class="pb-5 mb-5 fw-bold text-center">Here are all the functions, your'll get from our<br> finest HR
                    Management Software solution:<br> PeopleDesk </h1>
                <div class="services-list row rounded-list container-fluid">
                    <div class="col-md-4">
                        <ul class="">
                            <li class="fw-bold"> HRM</li>
                            <li class="fw-bold"> HR</li>
                            <li class="fw-bold"> CRM</li>
                            <li class="fw-bold"> Accounting</li>
                            <li class="fw-bold"> ERP software</li>
                            <li class="fw-bold"> Food Delivery applicatio</li>
                            <li class="fw-bold"> E-Commerce web application</li>
                            <li class="fw-bold"> Student & Tutor web portal</li>
                            <li class="fw-bold"> Banking web & mobile App</li>
                            <li class="fw-bold"> Health & Fitness web & mobile Apps</li>
                            <li class="fw-bold"> Media web & mobile Apps</li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li class="fw-bold"> HRM</li>
                            <li class="fw-bold"> HR</li>
                            <li class="fw-bold"> CRM</li>
                            <li class="fw-bold"> Accounting</li>
                            <li class="fw-bold"> ERP software</li>
                            <li class="fw-bold"> Food Delivery applicatio</li>
                            <li class="fw-bold"> E-Commerce web application</li>
                            <li class="fw-bold"> Student & Tutor web portal</li>
                            <li class="fw-bold"> Banking web & mobile App</li>
                            <li class="fw-bold"> Health & Fitness web & mobile Apps</li>
                            <li class="fw-bold"> Media web & mobile Apps</li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li class="fw-bold"> HRM</li>
                            <li class="fw-bold"> HR</li>
                            <li class="fw-bold"> CRM</li>
                            <li class="fw-bold"> Accounting</li>
                            <li class="fw-bold"> ERP software</li>
                            <li class="fw-bold"> Food Delivery applicatio</li>
                            <li class="fw-bold"> E-Commerce web application</li>
                            <li class="fw-bold"> Student & Tutor web portal</li>
                            <li class="fw-bold"> Banking web & mobile App</li>
                            <li class="fw-bold"> Health & Fitness web & mobile Apps</li>
                            <li class="fw-bold"> Media web & mobile Apps</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <h1 class="pb-5 mb-5 fw-bold text-center">Frquently Asked <span class="primary-light">Question</span>
                </h1>
                <div class="row mb-5 d-flex align-items-centers text-dark">
                    <div class="col-md-6">
                        <div class="bg-light p-2 my-2 rounded custom-collapse" data-bs-toggle="collapse"
                            href="#collapseExample1" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <a class="bg-light text-dark fw-bold">
                                Are you gong to help us out with the installation <i class="icofont-rounded-down"></i>
                            </a>
                            <div class="collapse" id="collapseExample1">
                                <div class="bg-light p-1">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-2 my-2 rounded custom-collapse" data-bs-toggle="collapse"
                            href="#collapseExample2" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <a class="bg-light text-dark fw-bold">
                                What about the support? <i class="icofont-rounded-down"></i>
                            </a>
                            <div class="collapse" id="collapseExample2">
                                <div class="bg-light p-1">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-2 my-2 rounded custom-collapse" data-bs-toggle="collapse"
                            href="#collapseExample3" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <a class="bg-light text-dark fw-bold">
                                Are you gong to help us out with the installation <i class="icofont-rounded-down"></i>
                            </a>
                            <div class="collapse" id="collapseExample3">
                                <div class="bg-light p-1">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-2 my-2 rounded custom-collapse" data-bs-toggle="collapse"
                            href="#collapseExample4" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <a class="bg-light text-dark fw-bold">
                                What about the support? <i class="icofont-rounded-down"></i>
                            </a>
                            <div class="collapse" id="collapseExample4">
                                <div class="bg-light p-1">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-2 my-2 rounded custom-collapse" data-bs-toggle="collapse"
                            href="#collapseExample5" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <a class="bg-light text-dark fw-bold">
                                Are you gong to help us out with the installation <i class="icofont-rounded-down"></i>
                            </a>
                            <div class="collapse" id="collapseExample5">
                                <div class="bg-light p-1">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="min-height: 400px">
                        <img lazyload="true" class="float-end" src="{{ asset('frontend/images/frequent-asked.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
    </section>
    <!--/#blog-->
@endsection
