<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Omkar Book Store')</title>
    <!-- Use asset helper for bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        body {
            background-color: #f0f4fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .nav-link.active {
            font-weight: bold;
            color: #0d6efd !important;
        }

        /* Premium Dropdown UI */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
            padding: 10px 0;
            min-width: 200px;
        }
        .dropdown-item {
            padding: 10px 20px;
            font-weight: 600;
            color: #2c5364;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }
        .dropdown-item:hover {
            background-color: #f0f4fa;
            color: #0d6efd;
            transform: translateX(4px);
        }
        .dropdown-item.text-danger:hover {
            background-color: #fff0f0;
            color: #dc3545 !important;
        }
        .dropdown-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }
    </style>
    <!-- Use FontAwesome globally for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body>

@if(!isset($hideNavbar) || !$hideNavbar)
    <!-- Global Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info px-3 shadow-sm" style="background-color: #094969 !important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ url('/') }}">Omkar Book Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->is('adventure') ? 'active' : '' }}" href="{{ url('/adventure') }}">Adventure</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->is('horror') ? 'active' : '' }}" href="{{ url('/horror') }}">Horror</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->is('comedy') ? 'active' : '' }}" href="{{ url('/comedy') }}">Comedy</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->is('kids') ? 'active' : '' }}" href="{{ url('/kids') }}">Kids</a></li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link text-white me-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart <span id="cart-count" class="badge bg-danger rounded-pill">0</span></a></li>
                    @guest
                        <li class="nav-item"><a class="btn btn-outline-light me-2 btn-sm" href="{{ url('/registation') }}">Sign Up</a></li>
                        <li class="nav-item"><a class="btn btn-light btn-sm fw-bold text-dark" href="{{ url('/login') }}">Login</a></li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold d-flex align-items-center bg-dark bg-opacity-25 rounded-pill px-3 py-2 ms-2" style="border: 1px solid rgba(255,255,255,0.2)" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->fullname) }}&background=6ff1ff&color=094969&bold=true" 
                                     alt="Profile" class="rounded-circle me-2 shadow-sm" width="26" height="26">
                                {{ explode(' ', Auth::user()->fullname)[0] }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                                <li>
                                    <h6 class="dropdown-header text-muted fw-bold">Account Settings</h6>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        <i class="fa-solid fa-user-circle fs-5 text-primary"></i> View Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger fw-bold" type="submit">
                                            <i class="fa-solid fa-right-from-bracket fs-5"></i> Secure Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif

<main>
    @if(session('success'))
        <div class="alert alert-success text-center mb-0 border-0 rounded-0">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
</main>

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> <!-- Required for Dropdown -->
<!-- SweetAlert2 UI Enhancement -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Global variable letting JS know if user is logged in
    window.isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

    // Global Cart logic
    document.addEventListener("DOMContentLoaded", () => {
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const countEl = document.getElementById('cart-count');
            if(countEl) countEl.innerText = cart.length;
        }
        updateCartCount();

        // Listen for custom event for updating
        document.addEventListener('cartUpdated', updateCartCount);

        // Global Add To Cart Listener
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('add-to-cart-btn')) {
                const button = e.target;
                const bookName = button.getAttribute('data-book');
                const price = button.getAttribute('data-price');
                
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart.push({ name: bookName, price: price });
                localStorage.setItem('cart', JSON.stringify(cart));
                
                // Update badge
                document.dispatchEvent(new Event('cartUpdated'));

                // Fire gorgeous UI pop-up instead of alert()
                Swal.fire({
                    title: 'Added Successfully! 🎉',
                    html: `<b>${bookName}</b> (₹${price}) is now in your cart.`,
                    icon: 'success',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#ffffff',
                    color: '#094969',
                    iconColor: '#28a745',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
