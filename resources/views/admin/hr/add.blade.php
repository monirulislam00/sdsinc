@extends('admin.admin_master')
@section('admin_content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">Add HR</div>
        <div class="card-body">
            <form action="{{route('store.hr')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label> Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label> Company</label>
                    <input type="text" name="company" class="form-control" value="Siam's Development & Solution Inc.">
                </div>
                <div class="form-group mb-3">
                    <label> Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label> Phone</label>
                    <input type="text" name="phone" class="form-control">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label> Mail</label>
                    <input type="email" name="mail" class="form-control">
                    @error('mail')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label> Image</label>
                    <input  name="image" class="form-control" type="file" id="formFile">
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection