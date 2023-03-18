@extends('frontend.master')
@section('home_content')
    <div class="text-center page-title text-light  d-flex align-items-center justify-content-center flex-column"
        style="background-image: url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');background-size:cover;min-height:400px">
        <div class="page-title-texts ">
            <h2 class="py-1 mt-4 fw-bold text-lg">Search result from: {{ $query }}</h2>

        </div>
    </div>
    @include('frontend.blog.scroll-bottom')
    <section id="blog">
        @include('frontend.blog.searchForm')
        <div class="blog container-fluid ">
            <div class="row p-3 mt-5">
                <div class="col-md-9">

                    <div class="row">
                        @foreach ($searchedBlog as $blog)
                            <div class="col-md-4 blog-item p-3">
                                <a href="blog/{{ $blog->title }}">
                                    <div class="">
                                        <div class="blog-image">
                                            <img style="height:200px" class="img-thumbnail border-0 p-0 img-blog"
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
                            {{ $searchedBlog->links() }}
                        </div>
                    </div>
                </div>
                <!--/.col-md-8-->

                @include('frontend.blog.blog-rightbar')
            </div>
            <!--/.row-->

        </div>
    </section>
    <!--/#blog-->
@endsection
