@extends('layouts.app')

@section('title', 'Cambo Events')

@section('content')
<div class="container">
    <!-- Banner -->
    <div class="front_banner">
        <img src="{{ asset('images/angkor.jpeg') }}" class="img-fluid" alt="Banner Image">
        <div class="front_banner_text">
            <p class="banner_text_welcome" style="font-size: 0.8rem;">WELCOME TO CAMBOEVENTS</p>
            <h1 class="banner_text_title" style="font-size: 1.8rem;">Experience the Vibrance of Cambodia with Cambo Events</h1>
            <a class="btn about_us mt-3" href="{{ url('about') }}" style="font-size: 0.9rem;">About Us</a>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Trending Events -->
    <section class="trending mt-5">
        <h2 class="text-center" style="font-family: 'Montserrat', sans-serif;" font-size: 1.5rem;">Trending Events</h2>
        <div class="row">
            @foreach ($trendingProducts as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('products.show', $product->id) }}">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="card-img-top">
                            @endif
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 1rem;">{{ $product->name }}</h5>
                            <p class="card-text" style="font-size: 0.8rem;">{{ Str::limit($product->description, 100, '...') }}</p>
                            <p class="card-text" style="font-size: 0.8rem;">{{ $product->price }} USD</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Trending Events -->

    <!-- Why Choose Us -->
    <section class="why-choose-us mt-5">
        <h2 class="text-center" style="font-family: 'Montserrat', sans-serif;" font-size: 1.5rem;">Why Choose Cambo Events?</h2>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <img src="{{ asset('images/customer.png') }}" alt="Customer Service Icon" class="feature-icon">
                    <h3 style="font-size: 1.2rem;">Customer Service</h3>
                    <p style="font-size: 0.9rem;">Our support team is here to assist you 24/7 with any inquiries or issues you may have.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <img src="{{ asset('images/protect.jpeg') }}" alt="Privacy Icon" class="feature-icon">
                    <h3 style="font-size: 1.2rem;">Privacy and Security</h3>
                    <p style="font-size: 0.9rem;">We prioritize your privacy and security, ensuring your data is safe with us.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <img src="{{ asset('images/trade.png') }}" alt="Business Icon" class="feature-icon">
                    <h3 style="font-size: 1.2rem;">Your Business Online</h3>
                    <p style="font-size: 0.9rem;">Our hosting services and products will enhance your business's online presence.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose Us -->

    <!-- Be a Host Section -->
    @if (!Auth::check() || Auth::user()->role !== 'host')
        <div class="text-center mt-5">
            <h2 class="mb-4" style="font-family: 'Montserrat', sans-serif;" font-size: 1.5rem;">Become a Host</h2>
            <p class="mb-4" style="font-size: 0.9rem;">Choose a package to start your journey as a host and share your events with the world!</p>

            <div class="row justify-content-center">
                <!-- Package Options -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="my-0 font-weight-normal" style="font-size: 1rem;">Basic Package</h4>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="card-title pricing-card-title" style="font-size: 1.2rem;">$10 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4" style="font-size: 0.8rem;">
                                <li>5 event listings</li>
                                <li>Help center access</li>
                            </ul>
                            <a href="{{ route('host.info', ['package' => 'basic']) }}" class="btn btn-lg btn-block btn-outline-primary" style="font-size: 0.9rem;">Select</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-success text-white text-center">
                            <h4 class="my-0 font-weight-normal" style="font-size: 1rem;">Premium Package</h4>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="card-title pricing-card-title" style="font-size: 1.2rem;">$20 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4" style="font-size: 0.8rem;">
                                <li>+10 event listings</li>
                                <li>Help center access</li>
                            </ul>
                            <a href="{{ route('host.info', ['package' => 'premium']) }}" class="btn btn-lg btn-block btn-success" style="font-size: 0.9rem;">Select</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
