<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

// Public Routes

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events', [EventController::class, 'listEvents']);
Route::get('/tickets', [TransactionController::class, 'listTickets']);
Route::get('/contact', function () {
    return view('contact');
});

// Auth Routes

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// User (Authenticated)

Route::middleware('auth')->group(function () {
    // Transaksi & Review
    Route::post('/checkout', [TransactionController::class, 'checkout']);
    Route::get('/dashboard', [TransactionController::class, 'dashboard']);
    Route::post('/review', [ReviewController::class, 'store']);

    // Keranjang Belanja (Cart)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Order langsung
    Route::post('/order/buy/{id}', [OrderController::class, 'buy'])->name('order.buy');
});

// Admin (Role-based Access)

Route::middleware(['auth', 'role:admin'])->group(function () {
    // CRUD Event & Ticket
    Route::get('/admin/event/create', [EventController::class, 'create']);
    Route::post('/admin/event/store', [EventController::class, 'store']);

    // Manajemen User
    Route::get('/admin/users', [AdminController::class, 'listUsers']);
    Route::post('/admin/users/{id}/make-admin', [AdminController::class, 'makeAdmin']);
});
