@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="float-right m-1">
            <a href="{{ route('products.index') }}" class="btn btn-primary">All products</a>
        </div>
    </div>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">Add product</div>
            <div class="row p-2">
                <div class="card-body col-md-6">
                    <div class="form-group mb-3">
                        <label>product Name</label>
                        <input type="text" name="title" class="form-control">
                        <small class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <label>product Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                        <small class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Service Type</label>
                        <select name="service" id="" class="form-control">
                            <option value="">select service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">
                            @error('service')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Type</label>
                        <select name="product_type" id="" class="form-control">
                            <option value="">select</option>
                            @foreach ($product_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">
                            @error('product_type')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="card-body col-md-6">
                    <div class="form-group mb-3">
                        <label>product Description</label>
                        <textarea type="text" name="description" class="form-control" rows="8"></textarea>
                        <small class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class=" col-md-4">
                <div class="card p-2">
                    <div class="card-header">Silver Card</div>
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
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <input type="text" class="form-control mt-1" name="silver_description[]">
                        <small class="text-danger">
                            @error('silver_description[]')
                                {{ $message }}
                            @enderror
                        </small>
                        <small class="text-danger">
                            @error('silver_des')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card p-2">
                    <div class="card-header">Gold Card</div>
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
                        <label class="form-label">Gold Description</label>
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <input type="text" class="form-control mt-1" name="gold_description[]">
                        <small class="text-danger">
                            @error('gold_description[]')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>

            <div class=" col-md-4">
                <div class="card p-2">
                    <div class="card-header">Platinum Card</div>
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
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <input type="text" class="form-control mt-1" name="platinum_description[]">
                        <small class="text-danger">
                            @error('platinum_description[]')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 float-end">
            <button type="submit" class="btn btn-primary ">Add product</button>
        </div>
    </form>
@endsection
