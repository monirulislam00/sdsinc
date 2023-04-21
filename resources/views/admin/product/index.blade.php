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
                        <table class="table-responsive  table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Service Type</th>
                                    <th scope="col">Product Type</th>
                                    <th scope="col">Standard Price/Gold Price</th>
                                    <th scope="col">product Image</th>
                                    <th scope="col">Gold Description</th>
                                    <th scope="col">Platinum Price</th>
                                    <th scope="col">Platinum Description</th>
                                    <th scope="col">Sliver Price</th>
                                    <th scope="col">Sliver Description</th>

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
                                        <td>{{ $product->getService->service_name }}</td>
                                        <td>{{ $product->getProductType->name }}</td>
                                        <td>{{ $product->gold_price }} $</td>
                                        <td><img src="{{ asset($product->image) }}" class="m-auto" alt=""
                                                width="120px" height="80px"></td>
                                        <td style="min-width:280px">
                                            @foreach (json_decode($product->gold_des) as $item)
                                                @if ($item != '')
                                                    <p class="bg-info d-inline-block text-white p-1 rounded">
                                                        {{ $item }}</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $product->platinum_price }} $</td>
                                        <td style="min-width:280px">
                                            @foreach (json_decode($product->platinum_des) as $item)
                                                @if ($item != '')
                                                    <p class="bg-info d-inline-block text-white p-1 rounded">
                                                        {{ $item }}</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $product->silver_price }} $</td>
                                        <td style="min-width:280px">
                                            @foreach (json_decode($product->silver_des) as $item)
                                                @if ($item != '')
                                                    <p class="bg-info d-inline-block text-white p-1 rounded">
                                                        {{ $item }}</p>
                                                @endif
                                            @endforeach
                                        </td>

                                        @can(['edit products', 'delete products'])
                                            <td>
                                                @can('edit products')
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
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
                        {{-- {{ $products->links() }} --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
