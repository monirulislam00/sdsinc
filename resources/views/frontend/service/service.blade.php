@extends('frontend.master')
@section('home_content')
    <div class="page-title" style="background-image: url({{ asset('frontend/images/page-title.png') }})">
        <h1>Services</h1>
    </div>
    <section id="services" class="service-item">
        <div class="container-fluid px-4 my-3">
            <div class="center fadeInDown">
                <h2 class="py-2 mt-1">Our Service</h2>
                <p class="lead">We provide Development and Solution services with expart team.</p>
            </div>
            <!--/#services-->
            <div class=" center fadeInDown">
                @foreach ($services as $service)
                    <a href="service/{{ $service->id }}">
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
                                        class="bg-blue-800 text-light p-2 rounded fw-medium">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
    </section>
@endsection
