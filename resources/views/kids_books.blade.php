@extends('layouts.app')

@section('title', 'Kids Books | Omkar Book Store')

@push('styles')
<style>
    /* Category Header */
    .category-header {
        background: linear-gradient(135deg, #56ab2f, #a8e063);
        border-radius: 16px;
        color: white;
        padding: 50px 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    
    .category-header::after {
        content: '🧸';
        position: absolute;
        top: -10px;
        left: -10px;
        font-size: 15rem;
        opacity: 0.15;
        z-index: 0;
        pointer-events: none;
        transform: rotate(-10deg);
    }

    .category-header h1 {
        font-weight: 800;
        position: relative;
        z-index: 1;
        letter-spacing: 2px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    /* Premium Book Cards */
    .premium-book-card {
        background: #fff;
        border-radius: 20px; /* softer edges for kids */
        overflow: hidden;
        border: 4px solid transparent;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .premium-book-card:hover {
        transform: scale(1.04) translateY(-8px);
        box-shadow: 0 20px 40px rgba(86, 171, 47, 0.25);
        border-color: #a8e063;
    }

    .premium-book-card .img-wrapper {
        height: 250px;
        overflow: hidden;
        position: relative;
        background: #f9f9f9;
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
        color: #2e7d32;
        margin-bottom: 10px;
        font-size: 1.25rem;
    }

    .card-content p {
        color: #555;
        font-size: 0.95rem;
        margin-bottom: 20px;
        line-height: 1.5;
        flex-grow: 1;
    }

    /* Gradient Button */
    .btn-gradient {
        background: linear-gradient(90deg, #56ab2f, #7cb342);
        color: white;
        border: none;
        border-radius: 30px; /* really round buttons */
        padding: 12px 20px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .btn-gradient:hover {
        background: linear-gradient(90deg, #7cb342, #56ab2f);
        box-shadow: 0 5px 15px rgba(86, 171, 47, 0.5);
        color: #fff;
    }
</style>
@endpush

@section('content')
<div class="container py-2 mb-5">

    <!-- Category Header -->
    <div class="category-header mt-3">
        <h1>KIDS BOOKS</h1>
        <p class="fs-5 opacity-75 mb-0 fw-bold">Fun, colorful, and educational books for young readers.</p>
    </div>

    <!-- Books Grid -->
    <div class="row g-4">
        <!-- Book 1 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/kide-2.png') }}" alt="Charlotte's Web">
                </div>
                <div class="card-content">
                    <h5>Charlotte's Web</h5>
                    <p>A heartwarming tale of friendship between a pig and a spider.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Charlotte's Web" data-price="250">Add to Cart - ₹250</button>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/kide-3.png') }}" alt="Diary of a Wimpy Kid">
                </div>
                <div class="card-content">
                    <h5>Diary of a Wimpy Kid</h5>
                    <p>Laugh along with Greg Heffley in this best-selling illustrated series.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Diary of a Wimpy Kid" data-price="300">Add to Cart - ₹300</button>
                </div>
            </div>
        </div>

        <!-- Book 3 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/kide-4.png') }}" alt="The Cat in the Hat">
                </div>
                <div class="card-content">
                    <h5>The Cat in the Hat</h5>
                    <p>Dr. Seuss's classic book that makes reading fun for kids.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="The Cat in the Hat" data-price="220">Add to Cart - ₹220</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


