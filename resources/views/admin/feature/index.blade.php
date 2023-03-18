@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header">All Slider </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Feature title</th>
                                <th scope="col" width="25%">Feature description</th>
                                <th scope="col" width="15%">Feature png/svg</th>
                                <th scope="col" width="15%">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($features as $feature)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $feature->title }}</td>
                                    <td>{{ $feature->description }}</td>
                                    <td><img src="{{ $feature->image }}" class="m-auto" alt="" width="120px"
                                            height="80px"></td>
                                    <td>
                                        <a href="{{ url('dashboard/feature/edit/' . $feature->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('dashboard/feature/delete/' . $feature->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Do you want to Delete')">Delete</a>
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
                <div class="card-header">Add Feature</div>
                <div class="card-body">
                    <form action="{{ route('store.feature') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Feature Title</label>
                            <input type="text" name="title" class="form-control">
                            @error('feature_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Feature Description</label>
                            <input type="text" name="description" class="form-control">
                            @error('feature_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Feature Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                            @error('feature_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Feature</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
