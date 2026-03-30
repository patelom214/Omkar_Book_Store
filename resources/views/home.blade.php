@extends('layouts.app')

@section('title', 'Omkar Book Store | Find Your Next Great Read')

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        border-radius: 16px;
        color: white;
        padding: 80px 40px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 60%);
        pointer-events: none;
    }

    .hero-title {
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Category Cards */
    .category-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        text-decoration: none;
        color: #2c5364;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 2px solid transparent;
        transition: all 0.4s ease-in-out;
        height: 100%;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border-color: #6ff1ff;
        color: #0f2027;
    }

    .category-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    /* Section Headers */
    .section-header {
        position: relative;
        text-align: center;
        margin: 60px 0 40px;
    }
    
    .section-header h2 {
        font-weight: 800;
        color: #2c5364;
        display: inline-block;
        background: white;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }

    .section-header::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #6ff1ff, transparent);
        z-index: 0;
    }

    /* Book Cards */
    .premium-book-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        height: 100%;
    }

    .premium-book-card:hover {
        transform: scale(1.03) translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .premium-book-card .img-wrapper {
        height: 220px;
        overflow: hidden;
        position: relative;
    }

    .premium-book-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .premium-book-card:hover img {
        transform: scale(1.1);
    }
    
    .card-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(0,0,0,0.7);
        color: #fff;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .card-content {
        padding: 20px;
        text-align: center;
    }

    .card-content h5 {
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-size: 1.25rem;
    }

    .card-content p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #094969, #2c5364);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 10px 25px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(90deg, #2c5364, #094969);
        box-shadow: 0 5px 15px rgba(9, 73, 105, 0.4);
        color: #6ff1ff;
    }
</style>
@endpush

@section('content')
<div class="container py-2">

    <!-- Hero Section -->
    <div class="hero-section">
        @auth
            <h1 class="hero-title">Welcome back, {{ explode(' ', Auth::user()->fullname)[0] }}!</h1>
        @else
            <h1 class="hero-title">Welcome to Omkar Book Store</h1>
        @endauth
        <p class="hero-subtitle">Discover thousands of books, from spine-chilling horror and epic adventures to laugh-out-loud comedy and magical kids' tales.</p>
        <a href="#explore" class="btn btn-gradient btn-lg px-5 py-3 fs-5" style="border-radius: 50px;">Start Exploring ↓</a>
    </div>

    <!-- Category Navigation -->
    <div id="explore" class="row g-4 mb-5">
        <div class="col-6 col-md-3">
            <a href="{{ url('/adventure') }}" class="category-card">
                <span class="category-icon">🗺️</span>
                <span class="fs-5">Adventure</span>
                <small class="text-muted mt-2 fw-normal">Journeys & Quests</small>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ url('/horror') }}" class="category-card">
                <span class="category-icon">👻</span>
                <span class="fs-5">Horror</span>
                <small class="text-muted mt-2 fw-normal">Thrills & Chills</small>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ url('/comedy') }}" class="category-card">
                <span class="category-icon">😂</span>
                <span class="fs-5">Comedy</span>
                <small class="text-muted mt-2 fw-normal">Laughs & Jokes</small>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ url('/kids') }}" class="category-card">
                <span class="category-icon">🧸</span>
                <span class="fs-5">Kids</span>
                <small class="text-muted mt-2 fw-normal">Magic & Wonder</small>
            </a>
        </div>
    </div>

    <!-- New Arrivals -->
    <div class="section-header">
        <h2>🔥 New Arrivals</h2>
    </div>
    
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge">NEW</span>
                    <img src="{{ asset('image/adv-1.jfif') }}" alt="Heart of Darkness">
                </div>
                <div class="card-content">
                    <h5>Heart of Darkness</h5>
                    <p>Explore the African Congo’s depths in this classic adventure by Joseph Conrad.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Heart of Darkness" data-price="350">
                        Add to Cart - ₹350
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge bg-danger">HOT</span>
                    <img src="{{ asset('image/horror-1.png') }}" alt="Zombie / Dracula">
                </div>
                <div class="card-content">
                    <h5>Dracula</h5>
                    <p>Dive into dystopia, the undead, and terrifying metaphorical horror tales.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Dracula" data-price="300">
                        Add to Cart - ₹300
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge">NEW</span>
                    <img src="{{ asset('image/adv-1.jpg') }}" alt="The Hobbit">
                </div>
                <div class="card-content">
                    <h5>The Hobbit</h5>
                    <p>J.R.R. Tolkien’s timeless fantasy about Bilbo’s unexpected journey.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Hobbit" data-price="450">
                        Add to Cart - ₹450
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->
    <div class="section-header">
        <h2>👑 Best Sellers</h2>
    </div>
    
    <div class="row g-4 mb-5 pb-5">
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge bg-warning text-dark">#1 SELLER</span>
                    <img src="{{ asset('image/kide-1.png') }}" onerror="this.src='{{ asset('image/kide-2.png') }}'" alt="Harry Potter">
                </div>
                <div class="card-content">
                    <h5>Harry Potter</h5>
                    <p>Explore magical adventures and rich character arcs that shaped generations.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Harry Potter" data-price="500">
                        Add to Cart - ₹500
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge bg-warning text-dark">TOP RATED</span>
                    <img src="{{ asset('image/comedy-1.jfif') }}" onerror="this.src='{{ asset('image/comedy-2.jpg') }}'" alt="Trust Me">
                </div>
                <div class="card-content">
                    <h5>Trust Me</h5>
                    <p>Set in Bollywood, this hit chick-lit novel brings drama and romance to life.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Trust Me" data-price="320">
                        Add to Cart - ₹320
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <span class="card-badge bg-warning text-dark">POPULAR</span>
                    <img src="{{ asset('image/adv-2.webp') }}" alt="The Midnight Library">
                </div>
                <div class="card-content">
                    <h5>The Midnight Library</h5>
                    <p>Journey through lives not lived in this reflective and imaginative novel.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Midnight Library" data-price="400">
                        Add to Cart - ₹400
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


