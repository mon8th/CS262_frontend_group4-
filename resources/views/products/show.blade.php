@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('products.index') }}" class="btn btn-link p-0 mb-3">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Default Image" class="img-fluid rounded shadow-sm"
                        style="max-height: 400px; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h1 class="font-weight-bold" style="font-family: 'Montserrat', sans-serif;">{{ $product->name }}</h1>
                <p class="text-muted" style="font-family: 'Lato', sans-serif;">Category: {{ $product->category }}</p>
                <p style="font-family: 'Lato', sans-serif;">{{ $product->description }}</p>
                <p class="text-muted" style="font-family: 'Lato', sans-serif;">Location: {{ $product->location }}</p>
                @if ($product->quantity > 0)
                    <p class="text-muted" style="font-family: 'Lato', sans-serif;">Quantity: {{ $product->quantity }}</p>
                    <p class="h3">${{ number_format($product->price, 2) }}</p>
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary mt-3">Add to Cart</a>
                    @else
                        @if (Auth::user()->role !== 'host')
                            <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary mt-3 btn-long">Add to Cart</button>
                            </form>
                        @endif
                    @endguest
                @else
                    <p class="text-danger mt-3 btn-long">Out of Stock</p>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2 class="font-weight-bold" style="font-family: 'Montserrat', sans-serif;">Reviews</h2>
                @foreach ($reviews as $review)
                    <div class="review mb-4 p-3 bg-light rounded shadow-sm">
                        <p class="text-dark" style="font-family: 'Lato', sans-serif;">{{ $review->review }}</p>
                        <small class="text-muted" style="font-family: 'Lato', sans-serif;">By {{ $review->user->name }} on
                            {{ $review->created_at->format('M d, Y') }}</small>
                    </div>
                @endforeach
                {{ $reviews->links('pagination::bootstrap-4') }}
                @guest
                    <p class="mt-4"><a href="{{ route('login') }}" class="btn btn-secondary">Log in</a> to write a review.
                    </p>
                @else
                    <form id="reviewForm" action="{{ route('review.store') }}" method="POST"
                        class="mt-4 p-4 bg-light rounded shadow-sm">
                        @csrf
                        <div class="form-group">
                            <label for="review" class="text-dark font-weight-bold"
                                style="font-family: 'Lato', sans-serif;">Your Review</label>
                            <textarea class="form-control bg-white text-dark border-dark" id="review" name="review" rows="5" required></textarea>
                            @error('review')
                                <div class="text-danger" style="font-family: 'Lato', sans-serif;">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="font-family: 'Lato', sans-serif;">Submit Review</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const colors = ['#FF5733', '#32FF57', '#3357FF', '#F333FF', '#FF33A8'];
        document.querySelectorAll('.review').forEach((review, index) => {
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            review.style.borderLeft = `4px solid ${randomColor}`;
        });
    });
</script>
