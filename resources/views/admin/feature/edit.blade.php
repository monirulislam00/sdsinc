@extends('admin.admin_master')
@section('admin_content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-dark text-center"><strong>Feature Edit</strong></div>
            <div class="card-body">
                <form action="{{ url('dashboard/feature/update/' . $features->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $features->image }}">
                    <div class="form-group">
                        <label class="form-label">Feature tilte</label>
                        <input type="text" class="form-control" name="title" value="{{ $features->title }}">

                    </div>

                    <div class="form-group">
                        <label class="form-label">Feature Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $features->description }}</textarea>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Feature Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($features->image) }}" width="170px" height="130px"></div>
                    </div>
                    <div class="form-footer pt-4">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
