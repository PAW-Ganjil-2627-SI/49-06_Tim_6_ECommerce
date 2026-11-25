<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\AuthController;

// API Login
Route::post('/login', [AuthController::class, 'login']);

// API User (Memerlukan Token)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API khusus Staff
Route::middleware(['auth:sanctum', 'role:staff'])->group(function () {
    Route::get('/staff-area', function (Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'Akses berhasil. Selamat datang di halaman Staff.',
            'user' => $request->user(),
        ]);
    });
});

// API khusus Admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin-area', function (Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'Akses berhasil. Selamat datang di halaman Admin.',
            'user' => $request->user(),
        ]);
    });
});

// API Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
