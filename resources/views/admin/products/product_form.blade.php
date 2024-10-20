@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ isset($product) ? route('admin.updateProduct', $product->id) : route('admin.addProduct') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection
