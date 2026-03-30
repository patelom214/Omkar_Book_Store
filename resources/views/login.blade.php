@extends('layouts.app')

@section('title', 'Login | Omkar Book Store')

@php
    $hideNavbar = true; // Use this variable in layout to hide main navbar
@endphp

@push('styles')
<style>
    body {
        margin: 0;
        background-color: #f0f4fa;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .form-container {
        max-width: 450px;
        margin: auto;
        background: #ffffff;
    }
    .btn-dark-custom {
        background-color: #092635;
        border: none;
        color: white;
    }
    .btn-dark-custom:hover {
        background-color: #1b4f6e;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center h-100 mt-5">
    <div class="form-container shadow-lg rounded w-100 overflow-hidden">
        <div class="text-center py-4 bg-info text-white">
            <h2 class="mb-0 fw-bold">Omkar Book Store</h2>
        </div>
        <div class="p-4 p-md-5">
            <h3 class="text-center mb-4 fw-bold" style="color: #092635;">User Login</h3>
            <form action="{{ url('/login_post') }}" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-3 p-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('success'))
                    <div class="alert alert-success mb-3 p-2 small">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg bg-light" id="email" placeholder="Enter your email" required value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg bg-light" id="password" placeholder="Enter your password" required>
                </div>
               
                <button type="submit" class="btn btn-dark-custom btn-lg w-100 fw-bold">Login</button>
            </form>
            
            <div class="text-center mt-4">
                <p class="mb-0">Don't have an account? <a href="{{ url('/registation') }}" class="text-info text-decoration-none fw-bold">Sign up</a></p>
                <div class="mt-2">
                    <a href="{{ url('/') }}" class="text-muted text-decoration-none small">← Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
