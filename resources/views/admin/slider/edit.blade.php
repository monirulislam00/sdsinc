@extends('admin.admin_master')
@section('admin_content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-dark text-center"><strong>Slider Edit</strong></div>
            <div class="card-body">
                <form action="{{ url('dashboard/slider/update/' . $sliders->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                    <div class="form-group">
                        <label class="form-label">Slider tilte</label>
                        <input type="text" class="form-control" name="title" placeholder="Slider title"
                            value="{{ $sliders->title }}">

                    </div>
                    <div class="form-group">
                        <label class="form-label">Slider Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $sliders->description }}</textarea>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Slider Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($sliders->image) }}" width="170px" height="130px"></div>
                    </div>
                    <div class="form-footer pt-4">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
