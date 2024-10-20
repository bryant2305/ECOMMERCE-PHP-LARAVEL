<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron text-center mt-5">
        <h4 class="display-4">Welcome to my backend dev test with php laravel!</h4>
        @if (Route::has('login'))
            <div class="mt-4">
                @auth
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success btn-lg ml-3">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
@endsection
