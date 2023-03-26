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
            <div class="card-header text-dark"><b>All order</b> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Status</th>
                                <th scope="col">Customer's Email</th>
                                <th scope="col">Customer's Email</th>
                                <th scope="col">Customer's Phone</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Quality</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Country</th>
                                <th scope="col">Customer's Reason of needing</th>
                                <th scope="col">Description</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Size</th>
                                <th scope="col">Promo Code</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->getService->title }}</td>
                                    <td>
                                        <a href="{{ url('dashboard/orders/delete/' . $order->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Do you want to Delete')">Delete</a>
                                    </td>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
