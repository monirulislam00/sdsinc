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
                <div class="card-header text-dark">All Portfolio</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">Portfolio Name</th>
                                    <th scope="col" width="15%">Portfolio Type</th>
                                    <th scope="col" width="25%">Portfolio Description</th>
                                    <th scope="col" width="15%">Portfolio Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($portfolios as $port)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $port->name }}</td>
                                        <td>{{ $port->type }}</td>
                                        <td>{{ $port->description }}</td>
                                        <td><img src="{{ asset($port->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td>
                                            <a href="{{ url('dashboard/portfolio/edit/' . $port->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/portfolio/delete/' . $port->id) }}"
                                                class="btn btn-danger"
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
                <div class="card-header">Add brand</div>
                <div class="card-body">
                    <form action="{{ route('store.portfolio') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Portfolio Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Portfolio Type</label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Portfolio Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>portfolio Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Portfolio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
