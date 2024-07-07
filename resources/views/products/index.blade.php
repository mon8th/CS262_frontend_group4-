@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container mt-5" style="font-family: 'Lato', sans-serif;">
    <h1 class="mb-4" style="font-family: 'Montserrat', sans-serif;">
        @if (isset($trending))
            Trending Events
        @elseif(isset($category))
            {{ $category }} Events
        @else
            Events
        @endif
    </h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="{{ route('products.show', $product->id) }}">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Default Image" class="card-img-top">
                    @endif
                </a>
                <div class="card-body text-center">
                    <p class="card-text">{{ Str::limit($product->description, 100, '...') }}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-secondary" style="font-family: sans-serif;">{{ $product->name }}</h5>
                    <p class="card-text text-muted" style="font-family: sans-serif;">
                        <strong>Date:</strong> {{ $product->event_date }}<br>
                        <strong>Venue:</strong> {{ $product->location }}<br>
                        <strong>Price:</strong> ${{ $product->price }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
