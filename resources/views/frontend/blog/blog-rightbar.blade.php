<div class="col-md-3">

    <!--/.search-->


    <div class="widget archieve">
        <h3 class="font-bold">Categories</h3>
        <div class="row">
            <div class="col-sm-12">
                <ul class="blog_archieve">
                    @foreach ($categories as $category)
                        <li class="py-3 px-1 font-medium"><a href="#">{{ $category->category_names }} <span
                                    class="pull-right">({{ $category->getBlogs->count() }})</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--/.archieve-->

    <div class="widget popular_post">
        <h3>Popular Post</h3>
        <ul class="p-0">
            @foreach ($popularBlogs as $blog)
                <li class="popularBlog">
                    <a href="blog/{{ $blog->title }}">
                        <div class="blog-image">
                            <img class="rounded " src="{{ url($blog->image) }} " alt="">
                        </div>
                        <p class="hover:text-primary py-2">{{ $blog->title }}</p>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <!--/.archieve-->


    {{-- <div class="widget blog_gallery">
                        <h3>Our Gallery</h3>
                        <ul class="sidebar-gallery clearfix">
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-1.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-2.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-3.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-4.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-6.png') }}"
                                        alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/images/sidebar-g-7.png') }}"
                                        alt="" /></a>
                            </li>
                        </ul>
                    </div> --}}
    <!--/.blog_gallery-->
    <br>
    <br>
    <div class="widget social_icon my-2">
        <a href="https://www.facebook.com/SDSINC.OFFICIAL"
            class="px-3 py-2 border-2 m-1 hover:bg-primary hover:text-white hover:border-primary transition">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="https://twitter.com/IncSiams"
            class="px-3 py-2 border-2 m-1 hover:bg-primary hover:text-white hover:border-primary transition">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/company/sdsincbd"
            class="px-3 py-2 border-2 m-1 hover:bg-primary hover:text-white hover:border-primary transition">
            <i class="fa fa-linkedin"></i>
        </a>
        <a href="#" onclick="alert('comming soon')"
            class="px-3 py-2 border-2 m-1 hover:bg-primary hover:text-white hover:border-primary transition">
            <i class="fa fa-pinterest"></i>
        </a>
        <a href="#" onclick="alert('comming soon')"
            class="px-3 py-2 border-2 m-1 hover:bg-primary hover:text-white hover:border-primary transition">
            <i class="fa fa-github"></i>
        </a>
    </div>

</div>
