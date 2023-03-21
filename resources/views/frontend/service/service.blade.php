@extends('frontend.master')
@section('home_content')
    <div class="page-title"
        style="background-image: url({{ asset('frontend/images/page-title.png') }});background-size:cover">
        <h1>Services</h1>
    </div>
    <section id="services" class="service-item">
        <div class="container-fluid px-4 my-3">
            <div class="center fadeInDown">
                <h2 class="py-2 mt-1">Our Service</h2>
                <p class="lead">We provide Development and Solution services with expart team.</p>
            </div>
            <!--/#services-->
            <div class="center fadeInDown ">
                <div class="-mx-4 flex flex-wrap justify-center">
                    @foreach ($services as $service)
                        <div class="basis-1 md:basis-[30%]">
                            <div
                                class="bg-white border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border-2  m-auto w-[95%]">
                                <div class=" rounded-t-lg overflow-hidden">
                                    <img class="" src="{{ $service->image }}" alt="{{ $service->image }} image" />
                                </div>
                                <div class="px-4 pb-4">
                                    <a href="service/{{ $service->id }}">
                                        <h5
                                            class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-start mb-4 mt-3">
                                            {{ $service->title }}</h5>
                                    </a>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$
                                            {{ $service->gold_price }}</span>
                                        <a href="service/{{ $service->id }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection



{{-- old one  --}}


{{-- <a href="service/{{ $service->id }}">
                        <div class="card rounded">
                            <img class="img-style" src="{{ $service->image }}" alt="Biometric">

                            <div class="card-body">
                                <div class="card-title" style="padding-top: 10px;">
                                    {{ $service->title }}
                                </div>
                                <br />
                                <h3 class="mb-2" style="color: #fff;font-size:30px"> $ {{ $service->gold_price }}</h3>
                                <br>
                                <div class="text-center " style="padding-bottom: 10px;">
                                    <a href="service/{{ $service->id }}"
                                        class="bg-blue-800 text-light p-2 rounded fw-medium">Read more</a>
                                </div>
                            </div>
                        </div>
                    </a> --}}
