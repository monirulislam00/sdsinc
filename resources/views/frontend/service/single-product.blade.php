@extends('frontend.master')
@section('home_content')
    <div class="page-title"
        style="background-image: url({{ asset($product->image) }});background-size:cover; background-attachment: fixed;">
        <h2 class="py-1 mt-4 fw-bold text-light">{{ $product->title }}</h2>
    </div>
    <section id="single-service" style="background: #fff">
        <div class=" container-fluid">
            <br />
            <br />
            <div class="row service-section p-3">
                <div class="col-md-6">
                    <h1 class="fw-bold primary-light">{{ $product->title }}</h1>

                    <p class="" style="text-align: justify">{!! $product->description !!}</p>
                    <br />
                    <br />
                    <a href="#plans"
                        class="py-3 px-4 text-white bg-slate-700 m-1 mb-2 rounded-md inline-block hover:bg-slate-600 text-center">Request
                        a
                        demo</a>
                    <a class="py-3 px-4 text-white bg-primaryColor mb-1 rounded-md  hover:bg-primaryLight text-center inline-block"
                        href="#plans">See Our
                        Plans</a>
                </div>
                <div class="col-md-6 common-div">
                    <img lazyload="true" class="common-image float-end w-full h-auto"
                        src="{{ asset('/') . $product->image }}" alt="">
                </div>
            </div>

            <div class="container " style="display: flex;align-items:center;flex-direction:column">
                <div class="col-md-10  text-center">
                    <h1 class="p-3 fw-bold">Here's Our <b class="primary-light">Packages</b></h1>
                    <p>
                        You can Either any of them here. Also, you can order a custom package by clicking on the <a
                            href="#customize" class="text-primaryColor" style="text-decoration: underline">customize
                            button</a>
                    </p>
                    <p>
                        We are always ready to serve you
                    </p>
                    {{-- <a class="link-primary" href="#">Take The Platform Tour ></a> --}}
                </div>
            </div>
            <div class="row py-5" id="plans">
                <div class="col-md-4 text-center">
                    <div class="shadow mt-3 pt-3 pb-1 rounded border-gray-100 border-[1px]">
                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3  m-auto"
                                src="{{ asset('frontend/images/plan-image.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="font-bold text-primaryColor my-3">PLATINUM</h2>
                        </div>
                        <div class="card-description">
                            <ul class="p-0" style="text-align: justify;">
                                <ul class="p-0 flex flex-col" style="text-align: justify;">
                                    @foreach (json_decode($product->platinum_des) as $item)
                                        @if ($item != '')
                                            <li class="text-center py-2 border-y-[1px]">
                                                {{ $item }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
                        <h2> $ {{ $product->platinum_price }}</h2>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="type" value="demo">
                            <input type="hidden" name="quality" value="1">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-primaryColor mt-5 mb-1 rounded-md  hover:bg-primaryLight w-full text-center block m-auto"
                                type="submit">Request a demo</button>
                        </form>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="quality" value="1">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-slate-700 my-1 mb-3 rounded-md inline-block hover:bg-slate-600 w-full text-center m-auto"
                                type="submit">Buy Now</button>
                        </form>




                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="shadow mt-3 pt-3 pb-1 rounded border-gray-100 border-[1px]">
                        <div class="thumbnail plan-image ">
                            <img lazyload="true" style="height:100px" class="mt-3 m-auto"
                                src="{{ asset('frontend/images/plan-image.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="font-bold text-primaryColor my-3">Gold</h2>
                        </div>
                        <div class="card-description p-0">
                            <ul class="p-0 flex flex-col" style="text-align: justify;">
                                @foreach (json_decode($product->gold_des) as $item)
                                    @if ($item != '')
                                        <li class="text-center py-2 border-y-[1px]">
                                            {{ $item }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <h2> $ {{ $product->gold_price }}</h2>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="type" value="demo">
                            <input type="hidden" name="quality" value="2">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-primaryColor mt-5 mb-1 rounded-md  hover:bg-primaryLight w-full text-center block m-auto"
                                type="submit">Request a demo</button>
                        </form>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="quality" value="2">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-slate-700 my-1 mb-3 rounded-md inline-block hover:bg-slate-600 w-full text-center m-auto"
                                type="submit">Buy Now</button>
                        </form>

                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="shadow mt-3  pt-3 pb-1 rounded border-gray-100 border-[1px]">

                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3  m-auto"
                                src="{{ asset('frontend/images/plan-image.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title">
                            <h2 class="font-bold text-primaryColor my-3">SILVER</h2>
                        </div>
                        <div class="card-description">
                            <ul class="p-0" style="text-align: justify;">
                                <ul class="p-0 flex flex-col" style="text-align: justify;">
                                    @foreach (json_decode($product->silver_des) as $item)
                                        @if ($item != '')
                                            <li class="text-center py-2 border-y-[1px]">
                                                {{ $item }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </ul>

                        </div>
                        <h2> $ {{ $product->silver_price }}</h2>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="type" value="demo">
                            <input type="hidden" name="quality" value="1">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-primaryColor mt-5 mb-1 rounded-md  hover:bg-primaryLight w-full text-center block m-auto"
                                type="submit">Request a demo</button>
                        </form>
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="quality" value="2">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-slate-700 my-1 mb-3 rounded-md inline-block hover:bg-slate-600 w-full text-center m-auto"
                                type="submit">Buy Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4" id="customize">
                    <div class="shadow mt-3 px-5 pt-3 pb-1 rounded border-gray-100 border-[1px]">
                        <div class="thumbnail plan-image">
                            <img lazyload="true" style="height:100px" class="mt-3 m-auto "
                                src="{{ asset('frontend/images/plan-image.png') }}" alt="platinum quality image">
                        </div>
                        <div class="card-title text-center">
                            <h2 class="font-bold text-primaryColor my-3">CUSTOMIZE</h2>
                        </div>
                        <div class="card-description">
                            <p class="" style="text-align: justify;">
                                If you're looking for a package that you can customize to your specific needs, look no
                                further than our customizable package options. Our packages are designed to be flexible and
                                versatile, allowing you to personalize them to suit your preferences.
                                <br>
                                <br>
                                With our user-friendly customization tools and expert customer service, you can easily
                                tell us the options you want and make any necessary adjustments to create a package that
                                perfectly meets your needs. Our goal is to make the customization process as easy and
                                straightforward as possible, so you can focus on creating a package that truly stands out.
                            </p>
                        </div>
                        <h3 class="font-bold text-xl">Price: Based on your features</h3>
                        {{-- <a class="py-3 px-4 text-white max-w-[272px] bg-slate-700  mb-2 rounded-md inline-block hover:bg-slate-600 w-full text-center " href="">Request a demo</a> --}}
                        <form action="{{ route('order.info') }}" method="post" class="flex m-auto">
                            @csrf
                            <input type="hidden" name="quality" value="4">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="promoCode" value="{{ $uniqueId ?? '' }}">
                            <button
                                class="py-3 px-4 text-white max-w-[272px] bg-slate-700 my-1 mb-3 rounded-md inline-block hover:bg-slate-600 w-full text-center m-auto"
                                type="submit">Customize</button>
                        </form>
                    </div>
                </div>

                <div class="container" style="display: flex;align-items:center;flex-direction:column">
                    <div class="col-md-10  text-center">
                        <h1 class="p-5 fw-bold">No Matter How Complex Of Business.Ours Goal Is to<b class="primary-light">
                                Serve Good Products </b> To Our Customers</h1>
                        {{-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est voluptatibus quo</p> --}}
                    </div>
                </div>
            </div>
            <img lazyload="true" src="{{ asset('frontend/images/team.png') }}" alt="" class="w-full">
            <br />
            <br />
    </section>
    <!--/#blog-->
@endsection
