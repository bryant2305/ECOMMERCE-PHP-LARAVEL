@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Vendors</h1>
        <a href="{{ route('admin.vendor.addVendorForm') }}" class="btn btn-primary mb-3">Add New Vendor</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>
                        <a href="{{ route('admin.vendor.editVendorForm', $vendor->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.vendor.deleteVendor', $vendor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
