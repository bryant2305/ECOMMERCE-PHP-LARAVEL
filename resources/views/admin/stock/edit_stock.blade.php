@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Stock for {{ $product->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.stock.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="stock">Current Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
</div>
@endsection
