@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-end my-2">
                <a href="{{ route('roles.index') }}" class="btn btn-primary text-align-end">All
                    Roles</a>
            </div>
            <div class="card">
                <div class="card-header "><b>Edit Role</b> </div>
                <div class="card-body p-4">
                    <form class="block" action="{{ route('roles.update', ['role' => $role->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="">Name</label><br>
                        <input type="text" placeholder="Type here" class="form-control col-md-6" name="name"
                            value="{{ $role->name }}" />
                        <h5 class="mt-4">Permissions</h5>
                        <div class="d-flex flex-wrap">
                            @foreach ($permissions as $permission)
                                <div class="form-check m-2">
                                    <input @if ($hasPermission->contains($permission->id)) {{ 'checked' }} @endif
                                        id="checked-checkbox{{ $permission->id }}" name="permissions[]" type="checkbox"
                                        value="{{ $permission->id }}" class="w-4 h-4 form-check-input">
                                    <label for="checked-checkbox{{ $permission->id }}"
                                        class="ml-2 form-check-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-end mt-3">
                            <button class="btn btn-primary mt-6">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
