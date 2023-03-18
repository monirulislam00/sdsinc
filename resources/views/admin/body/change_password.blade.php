@extends('admin.admin_master')
@section('admin_content')
<div class="col-md-6">
    <div class="card">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        <div class="card-header text-dark">Change password</div>
        <div class="card-body text-dark">
            <form action="{{route('update.password')}}" method="POST" >
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password"  id="current_password" name="oldpassword" class="form-control">
                    @error('oldpassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Change Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>
    </div>
</div>

@endsection