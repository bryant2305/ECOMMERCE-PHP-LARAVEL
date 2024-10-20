@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="auth-form">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div>
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            @endif
        </form>
    </div>
@endsection
