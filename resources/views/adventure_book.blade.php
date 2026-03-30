@extends('layouts.app')

@section('title', 'Adventure Books | Omkar Book Store')

@push('styles')
<style>
    /* Category Header */
    .category-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        border-radius: 16px;
        color: white;
        padding: 50px 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    
    .category-header::after {
        content: '🗺️';
        position: absolute;
        top: -20px;
        right: -10px;
        font-size: 15rem;
        opacity: 0.05;
        z-index: 0;
        pointer-events: none;
        transform: rotate(-15deg);
    }

    .category-header h1 {
        font-weight: 800;
        position: relative;
        z-index: 1;
        letter-spacing: 1px;
    }

    /* Premium Book Cards */
    .premium-book-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .premium-book-card:hover {
        transform: scale(1.03) translateY(-5px);
        box-shadow: 0 20px 40px rgba(30,60,114,0.15);
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
    }

    .premium-book-card:hover img {
        transform: scale(1.1);
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
        color: #1e3c72;
        margin-bottom: 10px;
        font-size: 1.25rem;
    }

    .card-content p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 20px;
        line-height: 1.5;
        flex-grow: 1;
    }

    /* Gradient Button */
    .btn-gradient {
        background: linear-gradient(90deg, #1e3c72, #2a5298);
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
        background: linear-gradient(90deg, #2a5298, #1e3c72);
        box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        color: #6ff1ff;
    }
</style>
@endpush

@section('content')
<div class="container py-2 mb-5">

    <!-- Category Header -->
    <div class="category-header mt-3">
        <h1>ADVENTURE BOOKS</h1>
        <p class="fs-5 opacity-75 mb-0">Explore thrilling adventures, daring heroes, and epic journeys.</p>
    </div>

    <!-- Books Grid -->
    <div class="row g-4">
        <!-- Book 1 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-1.jfif') }}" alt="Heart of Darkness">
                </div>
                <div class="card-content">
                    <h5>Heart of Darkness</h5>
                    <p>Explore the African Congo’s depths in this classic adventure by Joseph Conrad.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Heart of Darkness" data-price="350">Add to Cart - ₹350</button>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-1.jpg') }}" alt="The Hobbit">
                </div>
                <div class="card-content">
                    <h5>The Hobbit</h5>
                    <p>J.R.R. Tolkien’s timeless fantasy about Bilbo’s unexpected journey is a must-read.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Hobbit" data-price="450">Add to Cart - ₹450</button>
                </div>
            </div>
        </div>

        <!-- Book 3 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-2.webp') }}" alt="Treasure Island">
                </div>
                <div class="card-content">
                    <h5>Treasure Island</h5>
                    <p>A classic tale of pirates, treasure maps, and high-seas adventure by Robert Louis Stevenson.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Treasure Island" data-price="300">Add to Cart - ₹300</button>
                </div>
            </div>
        </div>

        <!-- Book 4 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-3.jpg') }}" alt="The Call of the Wild">
                </div>
                <div class="card-content">
                    <h5>The Call of the Wild</h5>
                    <p>Jack London’s story of survival and adventure in the Yukon wilderness.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Call of the Wild" data-price="280">Add to Cart - ₹280</button>
                </div>
            </div>
        </div>

        <!-- Book 5 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-4.jpg') }}" alt="Into the Wild">
                </div>
                <div class="card-content">
                    <h5>Into the Wild</h5>
                    <p>The true story of Christopher McCandless’s journey into the Alaskan wilderness.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Into the Wild" data-price="320">Add to Cart - ₹320</button>
                </div>
            </div>
        </div>

        <!-- Book 6 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/adv-2.jfif') }}" alt="Life of Pi">
                </div>
                <div class="card-content">
                    <h5>Life of Pi</h5>
                    <p>An inspiring story of survival and adventure at sea by Yann Martel.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Life of Pi" data-price="400">Add to Cart - ₹400</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


