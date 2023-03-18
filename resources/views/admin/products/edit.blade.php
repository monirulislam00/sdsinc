@extends('admin.admin_master')
@section('admin_content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header text-dark text-center"><strong>Slider Edit</strong></div>
            <div class="card-body">
                <form action="{{ url('dashboard/products/' . $product->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                    <div class="form-group">
                        <label class="form-label">Slider tilte</label>
                        <input type="text" class="form-control" name="title" placeholder="Slider title"
                            value="{{ $product->title }}">

                    </div>
                    <div class="form-group">
                        <label class="form-label">Slider Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>

                    </div>
                    <div class="form-group mb-3">

                        <label>Product Type
                        </label>
                        <select name="type" id="" class="form-control">
                            <option value="">-- select type --</option>
                            <option @php echo $product->type === "For Enterpirse" ?  "selected" : "" @endphp
                                value="For Enterpirse">For
                                Enterpirse</option>
                            <option @php echo $product->type === "For Every Business" ?  "selected" : "not" @endphp
                                value="For Every Business">For Every Business</option>
                            <option @php echo $product->type === "For Tax Management" ?  "selected" : "" @endphp
                                value="For Tax Management">For Tax Management</option>
                            <option @php echo $product->type === "For Managing Saleforce" ?  "selected" : "" @endphp
                                value="For Managing Saleforce">For Managing Saleforce</option>
                            <option @php echo $product->type === "Lets Start Now" ?  "selected" : "" @endphp
                                value="Lets Start Now">Lets Start Now</option>
                        </select>
                        <span class="text-danger">
                            @error('type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Slider Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($product->image) }}" width="170px" height="130px"></div>
                    </div>
                    <div class="form-footer pt-4">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
