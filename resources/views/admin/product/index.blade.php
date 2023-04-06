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
                <div class="card-header text-dark">All product</div>
                <div class="card-body">
                    @can('create products')
                        <div class="col-3 mb-2 text-end" style="float: right;">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add product</a>
                        </div>
                    @endcan
                    <div class="">
                        <table class=" table-responsive text-center">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">product Name</th>
                                    <th scope="col">product Description</th>
                                    <th scope="col">Standard Price/Gold Price</th>
                                    <th scope="col">product Image</th>
                                    <th scope="col">Gold Description</th>
                                    <th scope="col">Platinum Price</th>
                                    <th scope="col">Platinum Description</th>
                                    <th scope="col">Sliver Price</th>
                                    <th scope="col">Sliver Description</th>
                                    @hasrole('affiliated')
                                        <th scope="col">Link</th>
                                    @endhasrole
                                    @can(['edit products', 'delete products'])
                                        <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $product->title }}</td>
                                        <td style="text-align:justify;min-width:280px">{!! $product->description !!}</td>
                                        <td>{{ $product->gold_price }} $</td>
                                        <td><img src="{{ asset($product->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td style="min-width:280px">{{ $product->gold_des }} $</td>
                                        <td>{{ $product->platinum_price }} $</td>
                                        <td style="min-width:280px">{{ $product->platinum_des }} $</td>
                                        <td>{{ $product->silver_price }} $</td>
                                        <td style="min-width:280px">{{ $product->silver_des }} $</td>
                                        @hasrole('affiliated')
                                            <td scope="col">
                                                {{-- <button class="btn btn-primary"><i
                                                        class="fas fa-link"></i>
                                                    </button>
                                                        --}}
                                                <a href="http://localhost:8001/product/5/{{ $userId }}"
                                                    class="text-primary text-underline">http://localhost:8001/product/5/{{ $userId }}</a>
                                            </td>
                                        @endhasrole
                                        @can(['edit products', 'delete products'])
                                            <td>
                                                @can('edit products')
                                                    <a href="{{ url('dashboard/product/edit/' . $product->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                @endcan
                                                @can('delete products')
                                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Do you want to Delete')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
