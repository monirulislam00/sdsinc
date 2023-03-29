@extends('frontend.master')
@section('home_content')
<div class="page-title" style="background-image: url({{asset('frontend/images/page-title.png')}})">
    <h2 class="py-1 mt-4 fw-bold text-light">Portfolio</h2>
    <h3>Home > Portfolio</h3>
</div>
<section id="recent-works">
    <div class="container-fluid">
        <div class="center fadeInDown">
            <h2 class="mt-4">Recent Works</h2>
            <p class="lead">Our Recent Project For International Company.</p>
        </div>

        <div class="row">
            <div class=" flex flex-wrap justify-center">
                @foreach ($portfolio as $port)
                <div class="max-w-sm m-3 border rounded-lg border-gray-200 shadow-md ">
                        <img class=" rounded-t-lg" src="{{ $port->image }}" alt="" />
                    <div class="p-3 rounded-b-lg portfolio-content">
                        <p class="portfolio-type">{{$port->type}}</p>
                        <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $port->name }}</h5> </a>
                        <p class="m-0">{{$port->description}}</p>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--/.container-->
</section>
<!--/#recent-works-->
@endsection