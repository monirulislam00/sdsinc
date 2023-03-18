@extends('frontend.master')
@section('home_content')
    <div class="text-center page-title text-light  d-flex align-items-center justify-content-center flex-column"
        style="background-image: url('{{ asset('') }}./{{ $blog->image }}');background-repeat:no-repeat;background-size:cover;min-height:400px">
        <div class="page-title-texts ">
            <h2 class="py-1 mt-4 fw-bold text-lg">{{ $blog->title }}</h2>

        </div>
    </div>
    @include('frontend.blog.scroll-bottom')
    <section id="blog">
        <div class="blog container ">
            @include('frontend.blog.searchForm')
            <div class="row p-3 mt-2">
                <div class="col-md-9">
                    <img src="{{ asset('') }}./{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid">
                    <div class="blog-description py-5">
                        {!! $blog->description !!}
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
