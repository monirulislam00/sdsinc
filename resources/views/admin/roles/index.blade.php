@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header "><b>All Roles</b> </div>
                <div class="card-body">
                    @can('create roles')
                        <div class="col-3 mb-2 text-end" style="float: right;">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
                        </div>
                    @endcan
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">Role Name</th>
                                    <th scope="col" width="15%">Permissions</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($roles->count())
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($roles as $role)
                                        <tr class="bg-white border-b   hover:bg-gray-50 ">
                                            <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $index++ }}
                                            </th>
                                            <td class="py-3">
                                                {{ $role->name }}
                                            </td>
                                            <td class="py-3 text-center">
                                                @include('admin.roles.modal')
                                                <button data-bs-toggle="modal" data-bs-target="#permissionModal"
                                                    class="show-permissions btn btn-primary" data-id="{{ $role->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                            </td>
                                            <td class=" text-lg text-right ">
                                                @can('edit roles')
                                                    <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                                        class="btn btn-success" role="edit role">
                                                        Edit Role
                                                    </a>
                                                @endcan
                                                @can('delete roles')
                                                    <form class="ml-3 d-inline-block"
                                                        action="{{ route('roles.destroy', ['role' => $role->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button onclick="return confirm('Do you want to delete this role?')"
                                                            class="btn btn-danger" role="delete role">
                                                            Delete role
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class=" text-center" colspan="4">
                                            Not found
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
{{-- /* --------------------- pushing into admin/admin_master -------------------- */ --}}
@push('getPermissions')
    <script>
        $(document).on("click", ".show-permissions", function() {
            let id = $(this).data("id");
            // $("#edit-id").val(id);
            $.ajax({
                url: "roles/" + id,
                method: "get",
                success: function(response, index) {
                    console.log(response);
                    let permissions = "";
                    $.each(response.data, function(index, permission) {
                        permissions +=
                            `<div class="bg-success m-1 rounded px-2 py-1 text-white">${permission}</div>`;
                    });
                    $("#permissions").html(permissions);
                },
                error: function(error, request) {
                    console.log(error);
                    console.log(request);
                },
            });
        });
    </script>
@endpush
