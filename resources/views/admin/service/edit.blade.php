@extends('admin.admin_master')
@section('admin_content')
    <div class="">
        <div class="card">
            <div class="card-header">Edit Service</div>
            <form action="{{ url('dashboard/service/update/' . $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{ $service->image }}">
                <div class="card-body">
                    <div class="row p-2">
                        <div class="card-body col-md-6">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Service Name</label>
                                <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                                <small class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Service Description</label>
                                <textarea type="text" name="description" class="form-control" rows="7">{{ $service->description }}</textarea>
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
                                    <input type="text" name="gold_price" class="form-control"
                                        value="{{ $service->gold_price }}">
                                    <small class="text-danger">
                                        @error('gold_price')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Gold description</label>
                                <textarea type="text" name="gold_des" class="form-control" rows="7">{{ $service->gold_des }}</textarea>
                                <small class="text-danger">
                                    @error('gold_des')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                        <div class="card-body col-md-6">

                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label>Platinum Price</label>

                                    <input type="text" name="platinum_price" class="form-control"
                                        value="{{ $service->platinum_price }}">
                                    <small class="text-danger">
                                        @error('platinum_price')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Platinum description</label>
                                <textarea type="text" name="platinum_des" class="form-control" rows="7">{{ $service->platinum_des }}</textarea>
                                <small class="text-danger">
                                    @error('platinum_des')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label>Silver Price</label>

                                    <input type="text" name="silver_price" class="form-control"
                                        value="{{ $service->silver_price }}">
                                    <small class="text-danger">
                                        @error('silver_price')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Silver description</label>
                                <textarea type="text" name="silver_des" class="form-control" rows="7">{{ $service->silver_des }}</textarea>
                                <small class="text-danger">
                                    @error('silver_des')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
