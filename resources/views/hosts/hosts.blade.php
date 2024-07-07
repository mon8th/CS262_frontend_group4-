@extends('layouts.app')

@section('title', 'Add Event')

@section('content')
<div class="container mt-5 pt-4" style="font-family: 'Roboto', sans-serif;">
    <h2 class="text-center mb-4" style="color: #2c3e50;">Add New Event</h2>
    <!-- Event Submission Form -->
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <h5 class="mb-4 text-center" style="color: #34495e;">Submit Your Event</h5>
            <form method="POST" action="{{ route('host.event.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="category-input" name="category">
                <div class="form-group mb-3">
                    <label for="name" class="form-label" style="color: #34495e;">Event Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-bus"></i></span>
                        <input type="text" class="form-control bg-light rounded-pill-right" id="name" name="name" placeholder="Enter event name" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="category" class="form-label" style="color: #34495e;">Category</label>
                    <div class="d-flex flex-wrap justify-content-around" id="category-options">
                        <div class="category-option text-center m-2 p-3" data-category="Music">
                            <i class="fas fa-music fa-2x"></i>
                            <p class="mt-2">Music</p>
                        </div>
                        <div class="category-option text-center m-2 p-3" data-category="Art">
                            <i class="fas fa-paint-brush fa-2x"></i>
                            <p class="mt-2">Art</p>
                        </div>
                        <div class="category-option text-center m-2 p-3" data-category="Outdoors">
                            <i class="fas fa-tree fa-2x"></i>
                            <p class="mt-2">Outdoors</p>
                        </div>
                        <div class="category-option text-center m-2 p-3" data-category="Technology">
                            <i class="fas fa-laptop fa-2x"></i>
                            <p class="mt-2">Technology</p>
                        </div>
                        <div class="category-option text-center m-2 p-3" data-category="Sports">
                            <i class="fas fa-football-ball fa-2x"></i>
                            <p class="mt-2">Sports</p>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="date" class="form-label" style="color: #34495e;">Date</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-calendar-alt"></i></span>
                        <input type="date" class="form-control bg-light rounded-pill-right" id="date" name="event_date" placeholder="Enter event date" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label" style="color: #34495e;">Price</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" class="form-control bg-light rounded-pill-right" id="price" name="price" step="0.01" min="0" placeholder="Enter event price" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label" style="color: #34495e;">Quantity</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-sort-numeric-up"></i></span>
                        <input type="number" class="form-control bg-light rounded-pill-right" id="quantity" name="quantity" min="0" placeholder="Enter event quantity" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="location" class="form-label" style="color: #34495e;">Location</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" class="form-control bg-light rounded-pill-right" id="location" name="location" placeholder="Enter event location" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label" style="color: #34495e;">Description</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-black rounded-pill-left"><i class="fas fa-align-left"></i></span>
                        <textarea class="form-control bg-light rounded-pill-right" id="description" name="description" rows="4" placeholder="Enter event description" required></textarea>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="image" class="form-label" style="color: #34495e;">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label bg-light rounded-pill" for="image" style="color: #34495e;">Choose file</label>
                    </div>
                </div>
                <div class="text-center mt-4 mb-4">
                    <button type="submit" class="btn btn-primary rounded-pill shadow">Add Event</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Submitted Events List -->
    <h3 class="text-center mb-4" style="color: #2c3e50;">My Events</h3>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow border-0 flex-fill">
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top rounded-top">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default Image" class="card-img-top rounded-top">
                        @endif
                    </a>
                    <div class="card-body text-center">
                        <p class="card-text" style="color: #34495e;">{{ Str::limit($product->description, 100, '...') }}</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-secondary" style="color: #34495e;">{{ $product->name }}</h5>
                        <p class="card-text text-muted" style="color: #34495e;">
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($product->event_date)->format('Y-m-d') }}<br>
                            <strong>Venue:</strong> {{ $product->location }}<br>
                            <strong>Price:</strong> ${{ $product->price }}
                        </p>
                        <a href="{{ route('host.view_customers', $product->id) }}" class="btn btn-secondary rounded-pill shadow">View Customers</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
</script>

<style>
    .input-group-text {
        border: none;
        border-radius: 50px 0 0 50px;
    }

    .form-control,
    .form-select {
        border-radius: 0 50px 50px 0;
    }

    .custom-file-label {
        border-radius: 50px;
    }

    .category-option {
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100px;
        height: 100px;
        background-color: #f0f0f0;
        border-radius: 50%;
    }

    .category-option p {
        margin: 0;
        padding: 0;
        font-size: 0.9em;
    }

    .category-option:hover {
        transform: scale(1.1);
        background-color: #e0e0e0;
    }

    .category-option.active {
        background-color: #d0d0d0;
    }

    .btn-primary,
    .btn-secondary {
        transition: transform 0.3s ease;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        transform: scale(1.05);
    }

    .card:hover {
        transform: scale(1.02);
        transition: transform 0.3s ease;
    }

    input[type="file"] {
        color: #34495e;
    }
</style>

@endsection
