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
                <div class="card-header">All Product </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Product Title</th>
                                <th scope="col" width="15%">Product Type</th>
                                <th scope="col" width="25%">Product Description</th>
                                <th scope="col" width="15%">Product Image</th>
                                <th scope="col" width="15%">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td><img src="{{ asset($product->image) }}" class="m-auto" alt="" width="120px"
                                            height="80px"></td>
                                    <td>
                                        <a href="{{ url('dashboard/products/' . $product->id) . '/edit' }}"
                                            class="btn btn-success">Edit</a>
                                        <form class="d-inline-block"
                                            action="{{ url('dashboard/products/' . $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Do you want to Delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Product</div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Product Title</label>
                            <input type="text" name="title" class="form-control">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Description</label>
                            <textarea type="text" name="description" class="form-control" rows="5"></textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Type</label>
                            <select name="type" id="" class="form-control">
                                <option>-- select type --</option>
                                <option value="For Enterpirse">For Enterpirse</option>
                                <option value="For Every Business">For Every Business</option>
                                <option value="For Tax Management">For Tax Management</option>
                                <option value="For Managing Saleforce">For Managing Saleforce</option>
                                <option value="Lets Start Now ">Lets Start Now</option>
                            </select>
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
