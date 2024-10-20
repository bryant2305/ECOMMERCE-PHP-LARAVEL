@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Your Products</h1>
        <a href="{{ route('vendor.addProduct') }}" class="btn btn-primary mb-3">Add New Product</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('vendor.editProduct', $product->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('vendor.deleteProduct', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
