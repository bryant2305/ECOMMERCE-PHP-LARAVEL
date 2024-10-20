@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <strong>Total: ${{ array_sum(array_column(session('cart'), 'price')) }}</strong>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
