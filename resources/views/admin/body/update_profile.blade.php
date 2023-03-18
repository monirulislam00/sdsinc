@extends('admin.admin_master')
@section('admin_content')
<div class="col-md-6">
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        <div class="card-header text-dark">User Profile Update</div>
        <div class="card-body text-dark">
            <form action="{{route('update.user.profile')}}" method="POST" >
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">User name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">User Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>
    </div>
</div>

@endsection