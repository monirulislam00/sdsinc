@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Blog</div>
            <div class="card-body">
                <form action="{{ url('dashboard/blog/update/' . $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $blog->image }}">
                    <div class="form-group mb-3">
                        <label class="form-label">blog Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="blog-type">Blog Type</label>
                        <select name="type" id="blog-type" class="form-control">
                            <option @php echo $blog->type === "Normal" ?  "selected" : "" @endphp value="Normal">Normal
                            </option>
                            <option @php echo $blog->type === "Feature" ?  "selected" : "" @endphp value="Feature">
                                Feature</option>
                        </select>
                    </div>
                    <div class="from-group mb-3">
                        <label for="blog-cat">Blog Category </label>
                        <select name="blog_cat" id="blog-cat" class="form-control">
                            @foreach ($blog_categories as $category)
                                <option @php echo $blog->getCategory->id === $category->id ?  "selected" : "note" @endphp
                                    value="{{ $category->id }}">{{ $category->category_names }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">blog description</label>
                        <input type="text" name="description" class="form-control" value="{{ $blog->description }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">blog Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($blog->image) }}" width="170px" height="130px"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
