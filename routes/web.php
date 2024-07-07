<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// About Us page route
Route::get('/about', function () {
    return view('about_us');
});

// ProfileController routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// User routes for becoming a host
Route::get('host-info/{package}', [UserController::class, 'hostInfo'])->name('host.info')->middleware('auth');
Route::post('become-host', [UserController::class, 'submitBecomeHost'])->name('become.host.submit')->middleware('auth');

// ContactController routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// ReviewController routes
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

// ProductController routes
Route::get('/', [ProductController::class, 'welcome'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/trending', [ProductController::class, 'trending'])->name('products.trending');
Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Event routes
Route::middleware('auth')->group(function () {
    Route::get('/host-event', [ProductController::class, 'hostEvent'])->name('host.event');
    Route::post('/host-event', [ProductController::class, 'storeEvent'])->name('host.event.store');
    Route::get('/view-customers/{id}', [ProductController::class, 'viewCustomers'])->name('host.view_customers');
});

// Help page route
Route::get('/help', function () {
    return view('help');
});

// Cart routes
Route::post('/cart/remove', [TicketController::class, 'remove'])->name('cart.remove');
Route::post('/cart/add', [TicketController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [TicketController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [TicketController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart', [TicketController::class, 'index'])->name('cart.index');
