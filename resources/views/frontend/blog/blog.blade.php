@extends('frontend.master')
@section('home_content')
    <div class="text-center page-title text-light" style='background-image: url({{ asset('frontend/images/bg.jpg') }})'>
        <div class="page-title-texts ">
            <h2 class="py-1 mt-4 fw-bold text-light">Blog</h2>
            <h3>Home > Blogs</h3>
        </div>
    </div>
    @include('frontend.blog.scroll-bottom')
    <section id="blog">
        <div class="blog container-fluid ">
            @include('frontend.blog.searchForm')
            <div class="row p-3 mt-2">

                <div class="col-md-9">
                    <h2 class="text-dark mt-3">Feature Blogs</h2>
                    <div class="row">
                        @foreach ($featureBlogs as $blog)
                            <div class="col-md-6 blog-item">
                                <a href="blog/{{ $blog->title }}">
                                    <div class="p-3" style="background-color: #ecf0f1">
                                        <div class="blog-image">
                                            <img style="width:100%" class="img-thumbnail border-0 p-0 img-blog"
                                                src="{{ $blog->image }}" width="100%" alt="tech blog" />
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="fw-bold text-dark mt-3">{{ $blog->title }}</h3>
                                            <a class="fw-bold hover:text-[#EC853D]" href="blog/{{ $blog->title }}">Read
                                                more >></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--/.blog-item-->
                    </div>
                    <div class="pagination">
                        {{ $featureBlogs->links() }}
                    </div>
                    <h2 class="text-dark mt-5">All Blogs</h2>
                    <div class="row">
                        @foreach ($allBlogs as $blog)
                            <div class="col-md-4 blog-item p-3">
                                <a href="blog/{{ $blog->title }}">
                                    <div class="">
                                        <div class="blog-image">
                                            <img style="width:100%;" class="img-thumbnail border-0 p-0 img-blog"
                                                src="{{ $blog->image }}" width="100%" alt="tech blog" />
                                        </div>
                                        <div class="blog-content py-4">
                                            <h3 class="fw-bold text-dark">{{ $blog->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--/.blog-item-->
                        <div class="pagination">
                            {{ $allBlogs->links() }}
                        </div>
                    </div>
                    <a style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border:2px solid #ED5A37" href="#bottom"
                        class="text-[#ED5A37] z-10 hover:bg-[#ED5A37] hover:text-white focus:ring-4 focus:outline-none focus:ring-[#ED5A37] font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-[#ED5A37] dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 rotate-90 fixed bottom-7 right-7">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </a>
                </div>
                <!--/.col-md-8-->

                @include('frontend.blog.blog-rightbar')

            </div>
            <!--/.row-->

        </div>
    </section>
    <!--/#blog-->
@endsection
