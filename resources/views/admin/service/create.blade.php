@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="float-right m-1">
            <a href="{{ route('service.index') }}" class="btn btn-primary">All services</a>
        </div>
    </div>
    <div class="">

        <div class="card-header">Add Service</div>
        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">

            <div class="row p-2">
                <div class="card-body col-md-6 card">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Service Name</label>
                        <input type="text" name="service_name" class="form-control">
                        <small class="text-danger">
                            @error('service_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="form-group mb-3">
                        <label>Service Description</label>
                        <textarea type="text" name="description" class="form-control" rows="7"></textarea>
                        <small class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Service Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                        <small class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-2 ">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
