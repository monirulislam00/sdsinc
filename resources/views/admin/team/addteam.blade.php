@extends('admin.admin_master')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Add Member</div>
            <div class="card-body">
                <form action="{{route('store.team')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label> Department</label>
                        <select name="department_id" class="form-control">
                            <option value="">select</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
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
                        <label> Designation</label>
                        <input type="text" name="designation" class="form-control">
                        @error('designation')
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
                        <label> Email</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label> Description</label>
                        <textarea type="text" name="description" class="form-control" rows="5"></textarea>
                        @error('decription')
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
                    
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection