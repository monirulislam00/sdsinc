@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="card col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header text-dark">All Service</div>
            <div class="card-body">
                @can('create service')
                    <div class="col-3 mb-2 text-end" style="float: right;">
                        <a href="{{ route('service.create') }}" class="btn btn-primary">Add service</a>
                    </div>
                @endcan
                <div class="">
                    <table class="table table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Image</th>
                                <th scope="col">Service Description</th>

                                @can(['edit service', 'delete service'])
                                    <th scope="col">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($services as $service)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $service->service_name }}</td>
                                    <td><img src="{{ asset($service->image) }}" class="m-auto" alt="" width="120px"
                                            height="80px"></td>
                                    <td style="text-align:justify;min-width:280px">{{ $service->description }}</td>

                                    @can(['edit service', 'delete service'])
                                        <td>
                                            @can('edit service')
                                                <a href="{{ route('service.edit', ['service' => $service->id]) }}"
                                                    class="btn btn-success">Edit</a>
                                            @endcan
                                            @can('delete service')
                                                <form action="{{ route('service.destroy', ['service' => $service->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to Delete with its products?')">Delete</a>
                                                </form>
                                            @endcan
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $services->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
