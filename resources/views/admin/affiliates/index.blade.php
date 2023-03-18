@extends('admin.admin_master')
@section('admin_content')
    {{-- {{ dd($affiliates) }} --}}
    <div class="row">
        <div class="col-md-12">
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
                                    <th scope="col" width="15%">Watsapp Number</th>
                                    <th scope="col" width="15%">User Image</th>
                                    <th scope="col" width="15%">Address</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody class="">
                                @php($i = 1)
                                @foreach ($affiliates as $affiliate)
                                    {{-- ------------- filterning affilited to get only affilited ------------- --}}
                                    @if ($affiliate->roles->pluck('name')->contains('affiliated'))
                                        <tr>
                                            <th scope="row">{{ $i++ }}

                                            </th>
                                            <td>{{ $affiliate->name }}</td>
                                            <td>{{ $affiliate->email }}</td>
                                            <td class="d-flex justify-content-center">
                                                @foreach ($affiliate->roles as $role)
                                                    <p
                                                        class="bg-primary text-light text-center rounded p-1 d-inline-block mr-1">
                                                        {{ $role->name }}
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td>{{ $affiliate->phone }}</td>
                                            <td>{{ $affiliate->whatsapp }}</td>
                                            <td><img src="{{ asset($affiliate->profile_photo_url) }}" class="m-auto rounded"
                                                    alt="" width="120px" height="80px"></td>
                                            <td>{{ $affiliate->address }}</td>
                                            <td>

                                                <form class="d-inline" method="post"
                                                    action="{{ route('users.destroy', [
                                                        'user' => $affiliate->id,
                                                    ]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Do you want to Delete')">Delete</button>
                                            </td>
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
