@extends('admin.admin_master')
@section('admin_content')
    <div class="card o-hidden border-0  my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-md-7 shadow-lg">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" class="user" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="Enter your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Password require minimum 8 charecter">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="mt-4 form-group">
                                <label for="">Select role</label>
                                <select class="select select-success form-control" name="role[]"
                                    id="js-example-basic-multiple" multiple="multiple">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"> Create User</button>
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
