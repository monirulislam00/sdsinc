@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-4">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <div class="card">
                <div class="card-header">Edit Service Catogory</div>
                <div class="card-body">
                    <form action="{{ route('product_types.update', ['product_type' => $category->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label> Title</label>
                            <input type="text" name="catagory_name" class="form-control" value="{{ $category->name }}">
                            @error('catagory_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
