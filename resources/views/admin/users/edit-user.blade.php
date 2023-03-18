@extends('admin.admin_master')
@section('admin_content')
    <div class="card o-hidden border-0  my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-7 shadow-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update an Account!</h1>
                        </div>
                        <form method="POST" class="user" action="{{ route('users.update', ['user' => $user->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="Enter your Name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                    placeholder="Email Address" value="{{ $user->email }}">
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Password require minimum 8 charecter">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div> --}}
                            <div class="mt-4 form-group">
                                <label for="">status</label>
                                <select name="status" id="" class="form-control">
                                    <option @if ($user->status == 1) selected @endif value="1">active
                                    </option>
                                    <option @if ($user->status == 0) selected @endif value="1" value="0">
                                        deactive</option>
                                </select>
                            </div>
                            <div class="mt-4 form-group">
                                <label for="">Select role</label>
                                <select class="select select-success form-control" name="role[]"
                                    id="js-example-basic-multiple" multiple="multiple">
                                    @foreach ($roles as $role)
                                        @if ($user->hasRole($role))
                                            <option selected value="{{ $role->name }}">{{ $role->name }}</option>
                                        @else
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"> Update User</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('select2')
    <script>
        $('#js-example-basic-multiple').select2({
            placeholder: 'Select role'
        });
    </script>
@endpush
