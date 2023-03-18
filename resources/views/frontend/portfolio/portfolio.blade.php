@extends('frontend.master')
@section('home_content')
<div class="page-title" style="background-image: url({{asset('frontend/images/page-title.png')}})">
    <h1>Portfolio</h1>
</div>
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
        {{-- <div class="clearfix text-center">
            <br>
            <br>
            <a href="#" class="btn btn-primary">Show More</a>
        </div> --}}
    </div>
    <!--/.container-->
</section>
<!--/#recent-works-->
@endsection