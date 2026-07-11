<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return response()->json([
        'app' => 'Shohel Rana Portfolio API Backend',
        'status' => 'Running',
        'version' => '1.0.0',
    ]);
});

// Guest routes (can access these if not logged in)
Route::middleware('guest')->group(function () {
    // Registration routes
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', Register::class)->name('register.post');

    // Login routes
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', Login::class)->name('login.post');
});

// Protected routes (only accessible if logged in)
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', Logout::class)->name('logout');

    // Dashboard route
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'name' => 'Shohel',
        ]);
    })->name('dashboard');
});
