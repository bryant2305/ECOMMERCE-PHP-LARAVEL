@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Stock</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Current Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <form action="{{ route('admin.stock.addStock', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="number" name="quantity" min="1" required placeholder="Add quantity">
                        <button type="submit" class="btn btn-primary btn-sm">Add Stock</button>
                    </form>

                    <a href="{{ route('admin.stock.editStockForm', $product->id) }}" class="btn btn-info btn-sm">Edit Stock</a>
                    <form action="{{ route('admin.stock.deleteStock', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete Stock</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
