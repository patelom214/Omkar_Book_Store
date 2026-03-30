@extends('layouts.app')

@section('title', 'Horror Books | Omkar Book Store')

@push('styles')
<style>
    /* Category Header */
    .category-header {
        background: linear-gradient(135deg, #430000, #8b0000);
        border-radius: 16px;
        color: white;
        padding: 50px 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    
    .category-header::after {
        content: '👻';
        position: absolute;
        top: -10px;
        right: -20px;
        font-size: 15rem;
        opacity: 0.1;
        z-index: 0;
        pointer-events: none;
        transform: rotate(-5deg);
        filter: grayscale(1);
    }

    .category-header h1 {
        font-weight: 800;
        position: relative;
        z-index: 1;
        letter-spacing: 2px;
        color: #ffcccc;
        text-shadow: 0 5px 10px rgba(0, 0, 0, 0.8);
    }

    /* Premium Book Cards */
    .premium-book-card {
        background: #1a1a1a;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #330000;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .premium-book-card:hover {
        transform: scale(1.03) translateY(-5px);
        box-shadow: 0 20px 40px rgba(139, 0, 0, 0.4);
        border-color: #ff3333;
    }

    .premium-book-card .img-wrapper {
        height: 250px;
        overflow: hidden;
        position: relative;
    }

    .premium-book-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        opacity: 0.85;
    }

    .premium-book-card:hover img {
        transform: scale(1.1);
        opacity: 1;
    }

    .card-content {
        padding: 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card-content h5 {
        font-weight: 800;
        color: #ff4d4d;
        margin-bottom: 10px;
        font-size: 1.25rem;
    }

    .card-content p {
        color: #cccccc;
        font-size: 0.9rem;
        margin-bottom: 20px;
        line-height: 1.5;
        flex-grow: 1;
    }

    /* Gradient Button */
    .btn-gradient {
        background: linear-gradient(90deg, #8b0000, #ff1a1a);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 12px 20px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .btn-gradient:hover {
        background: linear-gradient(90deg, #ff1a1a, #8b0000);
        box-shadow: 0 5px 15px rgba(255, 26, 26, 0.4);
        color: #fff;
    }
</style>
@endpush

@section('content')
<div class="container py-2 mb-5">

    <!-- Category Header -->
    <div class="category-header mt-3">
        <h1>HORROR BOOKS</h1>
        <p class="fs-5 opacity-75 mb-0 text-white">Spine-chilling tales to keep you up at night.</p>
    </div>

    <!-- Books Grid -->
    <div class="row g-4">
        <!-- Book 1 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/horror-1.png') }}" alt="Dracula">
                </div>
                <div class="card-content">
                    <h5>Dracula</h5>
                    <p>The original vampire novel by Bram Stoker that started it all.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Dracula" data-price="300">Add to Cart - ₹300</button>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/horror-2.png') }}" alt="The Shining">
                </div>
                <div class="card-content">
                    <h5>The Shining</h5>
                    <p>Stephen King's terrifying tale of isolation and madness in a haunted hotel.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Shining" data-price="480">Add to Cart - ₹480</button>
                </div>
            </div>
        </div>

        <!-- Book 3 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/horror-3.png') }}" alt="Frankenstein">
                </div>
                <div class="card-content">
                    <h5>Frankenstein</h5>
                    <p>Mary Shelley's gothic novel about science gone too far.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Frankenstein" data-price="320">Add to Cart - ₹320</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


