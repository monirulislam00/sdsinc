@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Portfolio</div>
            <div class="card-body">
                <form action="{{ url('dashboard/portfolio/update/' . $portfolio->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $portfolio->image }}">
                    <div class="form-group mb-3">
                        <label class="form-label">Portfolio Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Portfolio Type</label>
                        <input type="text" name="type" class="form-control" value="{{ $portfolio->type }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Portfolio description</label>
                        <input type="text" name="description" class="form-control" value="{{ $portfolio->description }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">portfolio Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($portfolio->image) }}" width="170px" height="130px"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
