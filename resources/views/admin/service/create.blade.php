@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="float-right m-1">
            <a href="{{ route('service') }}" class="btn btn-primary">All services</a>
        </div>
    </div>
    <div class="card">

        <div class="card-header">Add Service</div>
        <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">

            <div class="row p-2">
                <div class="card-body col-md-6">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Service Name</label>
                        <input type="text" name="title" class="form-control">
                        <small class="text-danger">
                            @error('title')
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
                    <div class="form-group mb-3">

                        <div class="form-group mb-3">
                            <label>Gold /Standard Price</label>
                            <input type="text" name="gold_price" class="form-control">
                            <small class="text-danger">
                                @error('gold_price')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Gold description</label>
                        <textarea type="text" name="gold_des" class="form-control" rows="7"></textarea>
                        <small class="text-danger">
                            @error('gold_des')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </div>
                <div class="card-body col-md-6">

                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label>Platinum Price</label>

                            <input type="text" name="platinum_price" class="form-control">
                            <small class="text-danger">
                                @error('platinum_price')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Platinum description</label>
                        <textarea type="text" name="platinum_des" class="form-control" rows="7"></textarea>
                        <small class="text-danger">
                            @error('platinum_des')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label>Silver Price</label>

                            <input type="text" name="silver_price" class="form-control">
                            <small class="text-danger">
                                @error('silver_price')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Silver description</label>
                        <textarea type="text" name="silver_des" class="form-control" rows="7"></textarea>
                        <small class="text-danger">
                            @error('silver_des')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
