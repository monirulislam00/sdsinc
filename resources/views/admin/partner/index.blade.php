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
                <div class="card-header text-dark"><b>All Partner</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">Partner Name</th>
                                    <th scope="col" width="25%">Partner Description</th>
                                    <th scope="col" width="15%">Partner Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-dark">
                                @php($i = 1)
                                @foreach ($partners as $part)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $part->title }}</td>
                                        <td>{{ $part->description }}</td>
                                        <td><img src="{{ asset($part->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td>
                                            <a href="{{ url('dashboard/partner/edit/' . $part->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/partner/delete/' . $part->id) }}"
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
                <div class="card-header">Add Partner</div>
                <div class="card-body">
                    <form action="{{ route('store.partner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>partner Name</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>partner Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>partner Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Partner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
