@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Member</div>
            <div class="card-body">
                <form action="{{ url('dashboard/team/update/' . $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $team->image }}">
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
                        <label class="form-label"> Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $team->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Company</label>
                        <input type="text" name="company" class="form-control" value="{{ $team->company }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Designation</label>
                        <input type="text" name="designation" class="form-control" value="{{ $team->designation }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $team->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $team->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $team->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label> Description</label>
                        <textarea type="text" name="description" class="form-control" rows="5">{{$team->description}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"> Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Existing image </label>
                        <div><img src="{{ asset($team->image) }}" width="170px" height="130px"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
