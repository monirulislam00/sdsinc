@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Partner</div>
            <div class="card-body">
                <form action="{{ url('dashboard/partner/update/' . $partner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $partner->image }}">
                    <div class="form-group mb-3">
                        <label class="form-label">partner Name</label>
                        <input type="text" name="title" class="form-control" value="{{ $partner->title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">partner description</label>
                        <input type="text" name="description" class="form-control" value="{{ $partner->description }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">partner Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div class="bg-info"><img src="{{ asset($partner->image) }}" width="170px" height="130px"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
