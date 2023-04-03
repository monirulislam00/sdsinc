{{-- @php
    $sliders = DB::table('sliders')->get();
@endphp
<!-- ======= Hero Section ======= -->
<section>
    <div class="owl-carousel owl-theme carousel">
        @foreach ($sliders as $key => $slider)
            <div class="item {{ $key == 0 ? 'active' : '' }}" id="slider-image"
                style="background-image: url({{ $slider->image }})">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="carousel-content slider-content">
                                <h1>{{ $slider->title }}</h1>
                                <p class="pt-2 pb-2">{{ $slider->description }} </p>
                                <a class="btn hover:border-3 hover:border-[#ec5538]" href="#">Learn More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- End Hero -->
<!--/#main-slider--> --}}


<!-- ======= Hero Section ======= -->
<section>
    <div class="owl-carousel owl-theme carousel">
        @foreach ($popularBlogs as $key => $blog)
            <div class="item {{ $key == 0 ? 'active' : '' }}" id="slider-image"
                style="background-image: url({{ $blog->image }});background-size:cover;background-repeat:no-repeat">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class=" container slider-content p-4">
                                <h1 class="text-[#ec5538]">{{ $blog->title }}</h1>
                                <p class="pt-2 pb-2 inline-block text-lg">{!! substr($blog->description, 0, 150) !!} ... </p>
                                <a class="fw-bold py-2 mt-4 px-3 border-2  rounded border-[#ec5538]  inline-flex hover:text-[#ec5538] hover:bg-transparent  hover:border-[#ec5538]"
                                    href="blog/{{ $blog->title }}">Learn
                                    More</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section><!-- End Hero -->
<!--/#main-slider-->
