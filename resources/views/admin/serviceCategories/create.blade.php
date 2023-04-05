@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-4">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <a href="{{ route('service.index') }}" class="btn btn-primary">All Categories</a>
            <div class="card">
                <div class="card-header">Add Service Catogory</div>
                <div class="card-body">
                    <form action="{{ route('service_categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label> Title</label>
                            <input type="text" name="catagory_name" class="form-control">
                            @error('catagory_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
