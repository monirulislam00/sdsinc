@extends('admin.admin_master')
@section('admin_content')
    {{-- {{ dd($users) }} --}}
    <div class="row">
        <div class="col-md-12">
            <div class="text-end my-2">
                <a href="{{ route('users.create') }}" class="btn btn-primary text-align-end">Create
                    User</a>
            </div>
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header "><b>All User</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">User Name</th>
                                    <th scope="col" width="15%"> Emails</th>
                                    <th scope="col" width="15%">Roles</th>
                                    <th scope="col" width="15%">Phone</th>
                                    <th scope="col" width="15%">User Image</th>
                                    <th scope="col" width="15%">Address</th>
                                    <th scope="col" width="15%">Status</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php($i = 1)
                                @foreach ($users as $user)
                                    {{-- ---------- getting all the users without affiliate ------------  --}}
                                    @if ($user->hasRole([$rolesWithoutAffiliates]))
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="d-flex justify-content-center">
                                                @foreach ($user->roles as $role)
                                                    <p
                                                        class="bg-primary text-light text-center rounded p-1 d-inline-block mr-1">
                                                        {{ $role->name }}
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td>{{ $user->phone }}</td>

                                            <td><img src="{{ asset($user->profile_photo_url) }}" class="m-auto rounded"
                                                    alt="" width="120px" height="80px"></td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <p
                                                        class="bg-success text-light text-center rounded p-1 d-inline-block mr-1">
                                                        active
                                                    </p>
                                                @else
                                                    <p
                                                        class="bg-warning text-light text-center rounded p-1 d-inline-block mr-1">
                                                        inactive
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                @if (Auth::user()->id != $user->id)
                                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                        class="btn btn-success m-1">Edit</a>

                                                    <form class="d-inline" method="post"
                                                        action="{{ route('users.destroy', [
                                                            'user' => $user->id,
                                                        ]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Do you want to Delete')">Delete</button>
                                                @endif
                                            </td>
                                            </form>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
