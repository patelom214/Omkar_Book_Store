@extends('layouts.app')

@section('title', 'My Profile - Omkar Book Store')

@push('styles')
<style>
    /* Profile Header Styling */
    .profile-header-wrapper {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        border-radius: 16px 16px 0 0;
        padding: 50px 20px 80px;
        text-align: center;
        color: white;
        position: relative;
    }

    .profile-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        border: none;
        margin-top: -60px; /* Pulls the body up into the header */
        position: relative;
        z-index: 2;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid #ffffff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        margin-top: -60px; /* Pulls avatar up out of the card */
        margin-bottom: 15px;
        background-color: #fff;
        object-fit: cover;
    }

    /* Form UI Enhancements */
    .form-control-custom {
        border-radius: 10px;
        border: 2px solid #eef2f5;
        padding: 12px 15px;
        transition: all 0.3s ease;
        background-color: #fcfcfc;
    }

    .form-control-custom:focus {
        border-color: #6ff1ff;
        box-shadow: 0 0 10px rgba(111, 241, 255, 0.3);
        background-color: #fff;
    }
    
    .form-control-custom:disabled {
        background-color: #f0f4fa;
        opacity: 0.8;
        cursor: not-allowed;
    }

    .form-label-custom {
        font-weight: 700;
        color: #2c5364;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    /* Gradient Button */
    .btn-save-gradient {
        background: linear-gradient(90deg, #094969, #2c5364);
        color: white;
        border: none;
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.95rem;
        transition: all 0.4s ease;
    }

    .btn-save-gradient:hover {
        background: linear-gradient(90deg, #2c5364, #0f2027);
        box-shadow: 0 8px 20px rgba(9, 73, 105, 0.4);
        transform: translateY(-2px);
        color: #6ff1ff;
    }

    .input-icon-wrapper {
        position: relative;
    }
    
    .input-icon-wrapper i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #a0aab2;
    }
    
    .input-icon-wrapper input {
        padding-left: 45px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
<div class="container my-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            
            <!-- Colorful Header Section -->
            <div class="profile-header-wrapper shadow-sm">
                <h2 class="fw-bold mb-0">My Account Settings</h2>
                <p class="opacity-75">Update your personal information and details.</p>
            </div>

            <!-- Overlapping White Card Body -->
            <div class="card profile-card p-4 p-md-5">
                <div class="text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->fullname) }}&background=094969&color=fff&size=150" 
                         alt="Profile Photo" class="profile-avatar">
                    <h3 class="fw-bold text-dark">{{ Auth::user()->fullname }}</h3>
                    <p class="text-muted mb-4">{{ Auth::user()->email }}</p>
                </div>
                
                <h5 class="fw-bold mb-4 text-secondary border-bottom pb-3">
                    <i class="fa-solid fa-user-pen me-2"></i> Edit Profile details
                </h5>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 border-0 shadow-sm p-3 mb-4">
                        <ul class="mb-0 text-danger fw-bold list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li><i class="fa-solid fa-triangle-exclamation me-2"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.edit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Full Name Field -->
                        <div class="col-md-12 mb-4">
                            <label for="fullname" class="form-label-custom">Full Name</label>
                            <div class="input-icon-wrapper">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="fullname" class="form-control form-control-custom" id="fullname" value="{{ Auth::user()->fullname }}" required>
                            </div>
                        </div>

                        <!-- Email Field (Read Only) -->
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label-custom text-muted">Email Address <small>(Read-only)</small></label>
                            <div class="input-icon-wrapper">
                                <i class="fa-solid fa-envelope border-end pe-2"></i>
                                <input type="email" class="form-control form-control-custom" id="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="col-md-6 mb-4">
                            <label for="phone" class="form-label-custom">Mobile Number</label>
                            <div class="input-icon-wrapper">
                                <i class="fa-solid fa-phone"></i>
                                <input type="text" name="phone" class="form-control form-control-custom" id="phone" value="{{ Auth::user()->phone }}" placeholder="Your phone number">
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-2 pt-3 border-top">
                        <button type="submit" class="btn btn-save-gradient shadow-sm">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
