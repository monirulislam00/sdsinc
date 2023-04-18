@extends('admin.admin_master')
@section('admin_content')
<div class="col-md-4">
    <div class="card">
        <div class="card-header">Edit Department</div>
        <div class="card-body">
            <form action="{{url('dashboard/department/update/' . $department->id)}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label> Department Name</label>
                    <input type="text" name="department_name" class="form-control" value="{{$department->department_name}}">
                    @error('department_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection