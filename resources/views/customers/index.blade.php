@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Shopping Cart Items -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Shopping cart</h4>
                <a href="{{ route('products.index') }}" class="btn btn-link">Continue shopping</a>
            </div>
            <div class="border p-3 mb-3">
                <h5>You have {{ count($cartItems) }} items in your cart</h5>
                @foreach ($cartItems as $name => $item)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2 cart-item" data-name="{{ $name }}">
                        <div class="d-flex align-items-center" style="width: 75%;">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="img-thumbnail me-4" alt="{{ $item['name'] }}" style="width: 80px; height: 80px;">
                            <div>
                                <h6 class="mb-0">{{ $item['name'] }}</h6>
                                <small class="text-muted">{{ substr($item['description'], 0, 50) }}...</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('cart.update') }}" method="POST" class="d-inline-flex align-items-center">
                                @csrf
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="number" class="form-control quantity-input me-2" name="quantity" style="width: 60px;" value="{{ $item['quantity'] }}" min="1" data-price="{{ $item['price'] }}">
                                <button type="submit" class="btn btn-link text-primary p-0 m-0"><i class="bi bi-check"></i></button>
                            </form>
                            <span class="fw-bold me-3 item-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="name" value="{{ $name }}">
                                <button type="submit" class="btn btn-link text-danger delete-btn"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between align-items-center border-top py-2 mt-3">
                    <span class="fw-bold">Subtotal:</span>
                    <span class="fw-bold" id="subtotal">${{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Card Details -->
        <div class="col-md-4">
            <div class="border p-3">
                <h5>Card details</h5>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cardType" class="form-label">Card type</label>
                        <div class="d-flex">
                            <img src="https://img.icons8.com/color/24/000000/mastercard-logo.png" class="me-2">
                            <img src="https://img.icons8.com/color/24/000000/visa.png" class="me-2">
                            <img src="https://img.icons8.com/color/24/000000/amex.png" class="me-2">
                            <img src="https://img.icons8.com/color/24/000000/paypal.png" class="me-2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cardName" class="form-label">Cardholder's Name</label>
                        <input type="text" class="form-control" id="cardName" name="cardName" required>
                    </div>
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="me-2 w-50">
                            <label for="cardExpiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="cardExpiration" name="cardExpiration" required>
                        </div>
                        <div class="w-50">
                            <label for="cardCvv" class="form-label">Cvv</label>
                            <input type="text" class="form-control" id="cardCvv" name="cardCvv" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Total</label>
                        <input type="text" class="form-control" id="subtotal-input" readonly value="${{ number_format($total, 2) }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
