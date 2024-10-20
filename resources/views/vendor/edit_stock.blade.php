@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Stock for {{ $product->name }}</h1>
    <form action="{{ route('vendor.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
</div>
@endsection
