@extends('admin.admin_master')
@section('admin_content')
    <div class="">
        <div class="card">
            @if ($errors->any())
                <ul class="list-group" style="list-style: none">
                    @foreach ($errors->all() as $error)
                        <li class="my-1">
                            <div class="alert alert-warning" role="alert">
                                {{ $error }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header text-dark">Profile Update</div>
            <div class="card-body text-dark">
                <form action="{{ route('affiliate.profileUpdate') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $affiliateMarketer->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ $affiliateMarketer->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $affiliateMarketer->phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control"
                                    value="{{ $affiliateMarketer->whatsapp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <select name="" id="" disabled class="form-control">
                                    <option value="" selected>Bikash</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bikash Number</label>
                                <input type="text" class="form-control mb-3" name="cardNumber"
                                    value="{{ $affiliateMarketer->cardNumber }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Promo Code</label>
                                <input type="text" class="form-control mb-3" value="{{ $affiliateMarketer->uniqueId }}"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
