@extends('admin.admin_master')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header text-dark"><b>All subscriber Message</b> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Subcriber's Email</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        <a href="{{ url('dashboard/subscribers/delete/' . $subscriber->id) }}"
                                            class="btn btn-danger"
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
@endsection
