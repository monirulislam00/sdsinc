@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Director</div>
            <div class="card-body">
                <form action="{{ url('dashboard/hr/update/' . $hr->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $hr->image }}">
                    <div class="form-group mb-3">
                        <label class="form-label"> Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $hr->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Company</label>
                        <input type="text" name="company" class="form-control" value="{{ $hr->company }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $hr->title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $hr->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Mail</label>
                        <input type="text" name="mail" class="form-control" value="{{ $hr->mail }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($hr->image) }}" width="170px" height="130px"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
