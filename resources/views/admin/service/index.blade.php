@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="">
            <div class="card">
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
                                    <th scope="col">Service Description</th>
                                    <th scope="col">Standard Price/Gold Price</th>
                                    <th scope="col">Service Image</th>
                                    <th scope="col">Gold Description</th>
                                    <th scope="col">Platinum Price</th>
                                    <th scope="col">Platinum Description</th>
                                    <th scope="col">Sliver Price</th>
                                    <th scope="col">Sliver Description</th>
                                    @hasrole('affiliated')
                                        <th scope="col">Link</th>
                                    @endhasrole
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
                                        <td>{{ $service->title }}</td>
                                        <td style="text-align:justify;min-width:280px">{{ $service->description }}</td>
                                        <td>{{ $service->gold_price }} $</td>
                                        <td><img src="{{ asset($service->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td style="min-width:280px">{{ $service->gold_des }} $</td>
                                        <td>{{ $service->platinum_price }} $</td>
                                        <td style="min-width:280px">{{ $service->platinum_des }} $</td>
                                        <td>{{ $service->silver_price }} $</td>
                                        <td style="min-width:280px">{{ $service->silver_des }} $</td>
                                        @hasrole('affiliated')
                                            <td scope="col">
                                                {{-- <button class="btn btn-primary"><i
                                                        class="fas fa-link"></i>
                                                    </button>
                                                        --}}
                                                <a href="http://localhost:8001/service/5/{{ $userId }}"
                                                    class="text-primary text-underline">http://localhost:8001/service/5/{{ $userId }}</a>
                                            </td>
                                        @endhasrole
                                        @can(['edit service', 'delete service'])
                                            <td>
                                                @can('edit service')
                                                    <a href="{{ url('dashboard/service/edit/' . $service->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                @endcan
                                                @can('delete service')
                                                    <a href="{{ url('dashboard/service/delete/' . $service->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Do you want to Delete')">Delete</a>
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
    </div>
@endsection
