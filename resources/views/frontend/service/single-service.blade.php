@extends('frontend.master')
@section('home_content')
    <div class="page-title"
        style="background-image: url({{ asset('frontend/images/page-title.png') }});background-size:cover">
        <h2 class="py-1 mt-4 fw-bold text-light">Services</h2>
        <h3>Home > Services > Products</h3>
    </div>
    <section id="services" class="service-item">
        <div class="container-fluid px-4 my-3">
            <div class="center fadeInDown">
                <h2 class="py-2 mt-1">{{ $service->service_name }}</h2>

            </div>
            <!--/#services-->
            <div class="center fadeInDown ">
                <div class="flex flex-wrap justify-center">
                    @foreach ($products as $product)
                        <div
                            class="max-w-sm m-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="/products/{{ $product->id }}">
                                <img class="rounded-t-lg" src="{{ asset($product->image) }}" alt="" />
                            </a>
                            <div class="p-3 text-left">
                                <div class="flex flex-wrap">
                                    <div class="basis-[75%]"> <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $product->title }}</h5>
                                        </a>
                                        <p class="mb-3  text-slate-700 text-base">
                                            {{ substr($product->description, 0, 92) }} ...
                                        </p>
                                    </div>
                                    <div class="basis-[25%] text-center ">
                                        <p
                                            class="text-sm bg-[#f0a596] p-1 px-2 inline-block rounded-full text-[#932c18] font-bold">
                                            ${{ $product->gold_price }}</p>
                                    </div>
                                </div>

                                <a href="/products/{{ $product->id }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primaryColor rounded-lg hover:bg-primaryLight focus:ring-4 focus:outline-none focus:ring-amber-50">
                                    Read more
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection



{{-- old one  --}}


{{-- <a href="/products/{{ $product->id }}">
                        <div class="card rounded">
                            <img class="img-style" src="{{ $product->image }}" alt="Biometric">

                            <div class="card-body">
                                <div class="card-title" style="padding-top: 10px;">
                                    {{ $product->title }}
                                </div>
                                <br />
                                <h3 class="mb-2" style="color: #fff;font-size:30px"> $ {{ $product->gold_price }}</h3>
                                <br>
                                <div class="text-center " style="padding-bottom: 10px;">
                                    <a href="/products/{{ $product->id }}"
                                        class="bg-blue-800 text-light p-2 rounded fw-medium">Read more</a>
                                </div>
                            </div>
                        </div>
                    </a> --}}
