@extends('layouts.app')

@section('title', 'Registration | Omkar Book Store')

@php
    $hideNavbar = true; // Use this variable in layout to hide main navbar
@endphp

@push('styles')
<style>
    body {
        margin: 0;
        background-color: #f0f4fa;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .form-container {
        max-width: 550px;
        margin: 40px auto;
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
<div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
    <div class="form-container shadow-lg rounded w-100 overflow-hidden">
        <div class="text-center py-4 bg-info text-white">
            <h2 class="mb-0 fw-bold">Omkar Book Store</h2>
        </div>
        <div class="p-4 p-md-5">
            <h3 class="text-center mb-4 fw-bold" style="color: #092635;">User Registration</h3>
            <form action="{{ url('/register_post') }}" method="POST">
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
                
                <div class="mb-3">
                    <label for="fullname" class="form-label fw-bold">Full Name</label>
                    <input type="text" name="fullname" class="form-control bg-light" id="fullname" placeholder="Enter your full name" required value="{{ old('fullname') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control bg-light" id="email" placeholder="Enter your email" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Mobile Number</label>
                    <input type="tel" name="phone" class="form-control bg-light" id="phone" placeholder="Enter mobile number" required value="{{ old('phone') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control bg-light" id="password" placeholder="Create password" required>
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control bg-light" id="confirm-password" placeholder="Confirm password" required>
                </div>
                <button type="submit" class="btn btn-dark-custom btn-lg w-100 fw-bold">Register</button>
            </form>
            
            <div class="text-center mt-4">
                <p class="mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-info text-decoration-none fw-bold">Login</a></p>
                <div class="mt-2">
                    <a href="{{ url('/') }}" class="text-muted text-decoration-none small">← Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
