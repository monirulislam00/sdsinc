@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header text-dark">All Blog</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered" id="blog-table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">Blog Title</th>
                                    <th scope="col" width="15%">Blog Type</th>
                                    <th scope="col" width="15%">Blog Category</th>
                                    <th scope="col" width="25%">Blog Description</th>
                                    <th scope="col" width="15%">Blog Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->type }}</td>
                                        <td>{{ $blog->getCategory->category_names }}</td>
                                        <td class="text-justify" style="min-width:300px">{{ $blog->description }}</td>
                                        <td><img src="{{ asset($blog->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td>
                                            <a href="{{ url('dashboard/blog/edit/' . $blog->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/blog/delete/' . $blog->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Do you want to Delete')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Blog</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning mx-1" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">

                    <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Blog title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="from-group mb-3">
                            <label for="blog-cat">Blog Category</label>
                            <select name="blog_cat" id="blog-cat" class="form-control">
                                <option value="" id="">please select</option>
                                @foreach ($blog_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_names }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Blog Description</label>
                            <textarea name="description" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="blog-type">Blog Type</label>
                            <select name="type" id="blog-type" class="form-control">
                                <option value="Normal">Normal</option>
                                <option value="Feature">Feature</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Blog Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Blog</button>
                    </form>
                    {{-- creating new category  --}}
                    <h6 class="mt-4">Create Blog Category</h6>
                    <form action="category" method="post">
                        @csrf
                        <div class="row pl-3 mt-2 ">
                            <input name="category_name" id="category_name" type="text" class="form-control col-9 mr-2"
                                placeholder="type to create category">
                            <button type="submit" class="btn btn-success col-2 fw-bolder">+</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
