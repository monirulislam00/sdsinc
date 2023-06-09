@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="pb-3 d-flex justify-content-end">
                <a href="{{ route('addteam') }}" class="btn btn-success">Add Member</a>
            </div>
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header text-dark"><b>All Member</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">SL</th>
                                    <th scope="col" width="10%"> Name</th>
                                    <th scope="col" width="10%"> Department</th>
                                    <th scope="col" width="20%"> Company</th>
                                    <th scope="col" width="10%"> Designation</th>
                                    <th scope="col" width="15%"> Phone</th>
                                    <th scope="col" width="15%"> Email</th>
                                    <th scope="col" width="15%"> Description</th>
                                    <th scope="col" width="10%"> Image</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($teams as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->getDepartment->department_name}}</td>
                                        <td>{{$team->company}}</td>
                                        <td>{{$team->designation}}</td>
                                        <td>{{$team->phone}}</td>
                                        <td>{{$team->email}}</td>
                                        <td>{{$team->description}}</td>
                                        <td><img src="{{asset($team->image)}}" class="m-auto" alt=""
                                                width="120px"></td>
                                        <td>
                                            <a href="{{url('dashboard/team/edit/'.$team->id)}}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{url('dashboard/team/delete/'.$team->id)}}" class="btn btn-danger"
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
