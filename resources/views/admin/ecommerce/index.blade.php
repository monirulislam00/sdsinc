@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="pb-3 d-flex justify-content-end">
                <a href="{{ route('addecommerce') }}" class="btn btn-success">Add E-Commerce</a>
            </div>
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header text-dark"><b>All E-Commerce Membar</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">SL</th>
                                    <th scope="col" width="10%"> Name</th>
                                    <th scope="col" width="20%"> Company</th>
                                    <th scope="col" width="10%"> Title</th>
                                    <th scope="col" width="15%"> Phone</th>
                                    <th scope="col" width="15%"> Mail</th>
                                    <th scope="col" width="10%"> Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($ecommerce as $ecom)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $ecom->name }}</td>
                                        <td>{{ $ecom->company }}</td>
                                        <td>{{ $ecom->title }}</td>
                                        <td>{{ $ecom->phone }}</td>
                                        <td>{{ $ecom->mail }}</td>
                                        <td><img src="{{ asset($ecom->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td>
                                            <a href="{{ url('dashboard/ecom/edit/' . $ecom->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/ecom/delete/' . $ecom->id) }}" class="btn btn-danger"
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

    </div>
@endsection
