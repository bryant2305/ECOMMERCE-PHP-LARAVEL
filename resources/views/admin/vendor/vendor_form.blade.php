@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($vendor) ? 'Edit Vendor' : 'Add Vendor' }}</h1>

    <!-- Si el vendor existe, es un formulario de edición, si no, es uno de agregar -->
    <form action="{{ isset($vendor) ? route('admin.vendor.updateVendor', $vendor->id) : route('admin.vendor.addVendor') }}" method="POST">
        @csrf
        @if(isset($vendor))
            @method('PUT')  <!-- Usar el método PUT para editar -->
        @endif

        <div class="form-group">
            <label for="name">Vendor Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $vendor->name ?? old('name') }}" required>
            <!-- Mostrar el error de validación para el campo 'name' -->
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Vendor Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $vendor->email ?? old('email') }}" required>
            <!-- Mostrar el error de validación para el campo 'email' -->
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($vendor) ? 'Update Vendor' : 'Add Vendor' }}</button>
    </form>
</div>
@endsection
