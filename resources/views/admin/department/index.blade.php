@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header text-dark"><b>All Department</b> </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">SL</th>
                                    <th scope="col" width="10%"> Department</th>
                                    <th scope="col" width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($departments as $department)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{$department->department_name}}</td>
                                        <td>
                                            <a href="{{url('dashboard/department/edit/'.$department->id)}}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{url('dashboard/department/delete/'.$department->id)}}" class="btn btn-danger"
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold">Add Department</div>
                <div class="card-body">
                    <form action="{{route('addDepartment')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label> Department Name</label>
                            <input type="text" name="department_name" class="form-control">
                            @error('department_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
