@extends('admin.admin_master')
@section('admin_content')
    <div class="row">
        <div class="col-md-6 card">
            <div class="card-header text-dark">product Types</div>
            <div class=" my-2 text-end" style="float: right;">
                <a href="{{ route('product_types.create') }}" class="btn btn-primary">Add product types</a>
            </div>
            <table class="text-center ">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($product_types as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @can(['edit products', 'delete products'])
                                    @can('edit products')
                                        <a href="{{ route('product_types.edit', ['product_type' => $item->id]) }}"
                                            class="btn btn-success">Edit</a>
                                    @endcan
                                    @can('delete products')
                                        <form action="{{ route('product_types.destroy', ['product_type' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm(`Do you want to Delete with it's servies?`)">Delete</a>
                                        </form>
                                    @endcan
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
