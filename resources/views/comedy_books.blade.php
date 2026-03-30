@extends('layouts.app')

@section('title', 'Comedy Books | Omkar Book Store')

@push('styles')
<style>
    /* Category Header */
    .category-header {
        background: linear-gradient(135deg, #f2994a, #f2c94c);
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
        content: '😂';
        position: absolute;
        top: -40px;
        right: -10px;
        font-size: 15rem;
        opacity: 0.15;
        z-index: 0;
        pointer-events: none;
        transform: rotate(15deg);
    }

    .category-header h1 {
        font-weight: 800;
        position: relative;
        z-index: 1;
        letter-spacing: 1px;
        color: #d35400;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.4);
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
        box-shadow: 0 20px 40px rgba(242, 153, 74, 0.2);
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
        color: #d35400;
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
        background: linear-gradient(90deg, #f2994a, #e67e22);
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
        background: linear-gradient(90deg, #e67e22, #d35400);
        box-shadow: 0 5px 15px rgba(230, 126, 34, 0.4);
        color: #fff;
    }
</style>
@endpush

@section('content')
<div class="container py-2 mb-5">

    <!-- Category Header -->
    <div class="category-header mt-3">
        <h1>COMEDY BOOKS</h1>
        <p class="fs-5 opacity-75 mb-0 text-dark fw-bold">Laugh out loud with these hilarious reads!</p>
    </div>

    <!-- Books Grid -->
    <div class="row g-4">
        <!-- Book 1 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/comedy-2.jpg') }}" alt="The Hitchhiker's Guide to the Galaxy">
                </div>
                <div class="card-content">
                    <h5>The Hitchhiker's Guide</h5>
                    <p>Douglas Adams’ absurd intergalactic comedy adventure.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Hitchhiker's Guide" data-price="390">Add to Cart - ₹390</button>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/comedy-3.jpg') }}" alt="Bossypants">
                </div>
                <div class="card-content">
                    <h5>Bossypants</h5>
                    <p>Tina Fey's witty memoir full of personal and professional laughs.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Bossypants" data-price="350">Add to Cart - ₹350</button>
                </div>
            </div>
        </div>

        <!-- Book 3 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="premium-book-card">
                <div class="img-wrapper">
                    <img src="{{ asset('image/comedy-4.jpg') }}" alt="Good Omens">
                </div>
                <div class="card-content">
                    <h5>Good Omens</h5>
                    <p>A hilarious tale of the apocalypse by Neil Gaiman and Terry Pratchett.</p>
                    <button class="btn btn-gradient w-100 add-to-cart-btn" data-book="Good Omens" data-price="420">Add to Cart - ₹420</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


