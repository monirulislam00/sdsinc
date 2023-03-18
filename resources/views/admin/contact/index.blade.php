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
            <div class="card-header text-dark"><b>All Contact Message</b> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Client Email</th>
                                <th scope="col">Client Phone</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Message</th>
                                <th scope="col">Enquiry Type</th>
                                <th scope="col">From Where Heard</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $contact->fullName }}
                                    </td>
                                    <td>{{ $contact->email }}</td>
                                    <td>+{!! $contact->phone !!}</td>
                                    <td>{{ $contact->companyname }}</td>
                                    <td>{{ $contact->countryName }}</td>
                                    <td style="min-width:250px">{!! $contact->message !!}</td>
                                    <td>{{ $contact->enquiryType }}</td>
                                    <td>{{ $contact->fromWhereHeard }}</td>
                                    <td>
                                        <a href="{{ url('dashboard/contact/delete/' . $contact->id) }}"
                                            class="btn btn-danger"
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
@endsection
