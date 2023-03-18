@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="pb-3 d-flex justify-content-end">
                <a href="{{ route('addaccount') }}" class="btn btn-success">Add Account</a>
            </div>
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header text-dark"><b>All Account Membar</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">SL</th>
                                    <th scope="col" width="10%"> Name</th>
                                    <th scope="col" width="20%"> Company</th>
                                    <th scope="col" width="10%"> Title</th>
                                    <th scope="col" width="15%"> Phone</th>
                                    <th scope="col" width="15%"> Mail</th>
                                    <th scope="col" width="10%"> Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($accounts as $acc)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $acc->name }}</td>
                                        <td>{{ $acc->company }}</td>
                                        <td>{{ $acc->title }}</td>
                                        <td>{{ $acc->phone }}</td>
                                        <td>{{ $acc->mail }}</td>
                                        <td><img src="{{ asset($acc->image) }}" class="m-auto" alt="" width="120px"
                                                height="80px"></td>
                                        <td>
                                            <a href="{{ route('account.edit', ['id' => $acc->id]) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/acc/delete/' . $acc->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Do you want to Delete')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
