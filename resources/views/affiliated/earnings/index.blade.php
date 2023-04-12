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
            <div class="card-header text-dark"><b>All earning</b> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bearninged table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quality</th>
                                <th scope="col">Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($earnings as $earning)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $earning->getService }}</td>
                                    <td>
                                        @if ($earning->getOrder->quality == 1)
                                            Platinum
                                        @elseif ($earning->getOrder->quality == 2)
                                            Gold
                                        @elseif ($earning->getOrder->quality == 3)
                                            Silver
                                        @elseif ($earning->getOrder->quality == 4)
                                            Custom
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->earnings == 0)
                                            custom
                                        @else
                                            ${{ $earning->amount }}
                                        @endif
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
