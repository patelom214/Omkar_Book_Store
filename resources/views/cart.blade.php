@extends('layouts.app')

@section('title', 'Your Cart - Omkar Book Store')

@push('styles')
<style>
    .cart-table th, .cart-table td {
        vertical-align: middle;
    }
    .empty-cart {
        text-align: center;
        padding: 50px;
        font-size: 1.3rem;
        color: #555;
    }
    .total-price {
        font-weight: bold;
        font-size: 1.5rem;
        color: #0d6efd;
    }
    .option-card {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }
    .option-card:hover {
        background-color: #f8f9fa;
        border-color: #0d6efd !important;
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white text-center py-4 border-bottom">
            <h2 class="fw-bold mb-0" style="color: #094969;">🛒 Your Shopping Cart</h2>
        </div>
        <div class="card-body p-4">
            <div id="cart-container">
                <div class="table-responsive">
                    <table class="table table-hover cart-table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col" class="text-end">Price (₹)</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <!-- Items will be injected here -->
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">← Continue Shopping</a>
                    <div class="text-end">
                        <span class="total-price me-4">Total: ₹<span id="total-price">0</span></span>
                        <button id="buy-button" class="btn btn-primary btn-lg px-4" onclick="buyItems()">Checkout / Buy Now</button>
                    </div>
                </div>
            </div>

            <div id="empty-message" class="empty-cart d-none py-5">
                <h4 class="text-muted mb-3">Your cart is empty.</h4>
                <p>Browse books and add some to your cart! 📚</p>
                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Start Shopping</a>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom-0">
        <h5 class="modal-title fw-bold" id="paymentModalLabel" style="color: #094969;">🛒 Select Payment Method</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <!-- Order Summary -->
        <div class="mb-4 p-3 bg-light rounded text-center border">
             <span class="text-muted d-block mb-1">Total Amount Due</span>
             <h3 class="mb-0 text-primary fw-bold">₹<span id="modal-total-price">0.00</span></h3>
        </div>

        <form id="paymentForm">
            <h6 class="fw-bold mb-3 text-secondary">Payment Options</h6>
            
            <div class="form-check mb-3 p-3 border rounded shadow-sm option-card" onclick="selectRadio('creditCard')">
                <input class="form-check-input ms-1 mt-2" type="radio" name="paymentMethod" id="creditCard" value="Credit/Debit Card" checked>
                <label class="form-check-label ms-2 d-flex align-items-center w-100" for="creditCard" style="cursor:pointer;">
                    <div class="ms-2">
                        <span class="d-block fw-bold text-dark">Credit/Debit Card</span>
                        <small class="text-muted">Pay securely with your Visa, Mastercard, etc.</small>
                    </div>
                </label>
            </div>

            <div class="form-check mb-3 p-3 border rounded shadow-sm option-card" onclick="selectRadio('upi')">
                <input class="form-check-input ms-1 mt-2" type="radio" name="paymentMethod" id="upi" value="UPI">
                <label class="form-check-label ms-2 d-flex align-items-center w-100" for="upi" style="cursor:pointer;">
                    <div class="ms-2">
                        <span class="d-block fw-bold text-dark">UPI / QR</span>
                        <small class="text-muted">Google Pay, PhonePe, Paytm</small>
                    </div>
                </label>
            </div>

            <div class="form-check mb-3 p-3 border rounded shadow-sm option-card" onclick="selectRadio('cod')">
                <input class="form-check-input ms-1 mt-2" type="radio" name="paymentMethod" id="cod" value="Cash on Delivery">
                <label class="form-check-label ms-2 d-flex align-items-center w-100" for="cod" style="cursor:pointer;">
                    <div class="ms-2">
                        <span class="d-block fw-bold text-dark">Cash on Delivery</span>
                        <small class="text-muted">Pay when you receive the order</small>
                    </div>
                </label>
            </div>
        </form>
      </div>
      <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
        <button type="button" class="btn btn-outline-secondary w-100 mb-2 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary w-100 fw-bold py-2" onclick="confirmPayment()">Confirm Payment</button>
      </div>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg text-center rounded-4">
      <div class="modal-body p-5">
        <div class="mb-4 d-flex justify-content-center">
            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);">
                <span class="text-white fw-bold" style="font-size: 40px;">&#10003;</span>
            </div>
        </div>
        <h3 class="fw-bold mb-3 text-success">Payment Successful!</h3>
        <div class="bg-light rounded p-3 mb-4 text-start border">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Amount Paid:</span>
                <span class="fw-bold text-dark" id="successAmount"></span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-muted">Payment Method:</span>
                <span class="fw-bold text-dark" id="successMethod"></span>
            </div>
        </div>
        
        <p class="mb-4 text-muted" style="font-size: 0.95rem;">Thank you for shopping at Omkar Book Store! <br>Your order has been placed successfully.</p>
        <button type="button" class="btn btn-success w-100 fw-bold py-2 rounded-pill shadow-sm" onclick="closeSuccess()">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>

<!-- Auth Required Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg text-center rounded-4">
      <div class="modal-body p-5">
        <div class="mb-4 d-flex justify-content-center">
            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);">
                <span class="text-white fw-bold" style="font-size: 35px;">🔒</span>
            </div>
        </div>
        <h4 class="fw-bold mb-3 text-dark">Login Required</h4>
        <p class="mb-4 text-muted" style="font-size: 0.95rem;">You must be logged in to proceed with the checkout securely.</p>
        <a href="{{ route('login') }}" class="btn btn-warning w-100 fw-bold py-2 rounded-pill shadow-sm text-dark mb-2">Go to Login</a>
        <button type="button" class="btn btn-light w-100 fw-bold py-2 rounded-pill text-muted" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Empty Cart Modal -->
<div class="modal fade" id="emptyCartModal" tabindex="-1" aria-labelledby="emptyCartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg text-center rounded-4">
      <div class="modal-body p-5">
        <div class="mb-4 d-flex justify-content-center">
            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; opacity: 0.8;">
                <span class="text-white fw-bold" style="font-size: 35px;">🛒</span>
            </div>
        </div>
        <h4 class="fw-bold mb-3 text-dark">Cart is Empty</h4>
        <p class="mb-4 text-muted" style="font-size: 0.95rem;">Add some books to your cart before proceeding to checkout!</p>
        <button type="button" class="btn btn-primary w-100 fw-bold py-2 rounded-pill shadow-sm" data-bs-dismiss="modal">Okay!</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
function loadCart() {
    const cartItemsContainer = document.getElementById("cart-items");
    const totalPriceEl = document.getElementById("total-price");
    const emptyMessage = document.getElementById("empty-message");
    const cartContainer = document.getElementById("cart-container");

    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    cartItemsContainer.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        emptyMessage.classList.remove("d-none");
        cartContainer.classList.add("d-none");
        return;
    }

    emptyMessage.classList.add("d-none");
    cartContainer.classList.remove("d-none");

    cart.forEach((item, index) => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td class="fw-bold">${item.name}</td>
            <td class="text-end">₹${parseFloat(item.price).toFixed(2)}</td>
            <td class="text-center">
                <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${index})">Remove</button>
            </td>
        `;

        cartItemsContainer.appendChild(row);
        total += parseFloat(item.price);
    });

    totalPriceEl.textContent = total.toFixed(2);
    
    // Dispatch custom event to update cart counter in navbar
    document.dispatchEvent(new Event('cartUpdated'));
}

function removeFromCart(index) {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

function buyItems() {
    const isAuth = {{ auth()->check() ? 'true' : 'false' }};
    if (!isAuth) {
        const authModal = new bootstrap.Modal(document.getElementById('authModal'));
        authModal.show();
        return;
    }

    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
        const emptyCartModal = new bootstrap.Modal(document.getElementById('emptyCartModal'));
        emptyCartModal.show();
        return;
    }

    const total = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);
    document.getElementById('modal-total-price').textContent = total.toFixed(2);
    
    // Show Modal
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    paymentModal.show();
}

function selectRadio(id) {
    document.getElementById(id).checked = true;
}

function confirmPayment() {
    const selectedMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const total = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);

    // Close modal
    const modalEl = document.getElementById('paymentModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();

    // Show success modal
    setTimeout(() => {
        document.getElementById('successAmount').textContent = '₹' + total.toFixed(2);
        document.getElementById('successMethod').textContent = selectedMethod;
        
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        
        // Clear the cart after purchase
        localStorage.removeItem("cart");
        loadCart();
    }, 300); // Slight delay for smoother modal close transition
}

function closeSuccess() {
    window.location.href = "{{ url('/') }}";
}

document.addEventListener("DOMContentLoaded", loadCart);
</script>
@endpush
