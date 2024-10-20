@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Stock</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Current Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('vendor.editStockForm', $product->id) }}" class="btn btn-primary">Edit Stock</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
