<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkspedisiController;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('ekspedisi.index');
});

Route::get('/login-admin', function () {
    auth()->logout();
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        auth()->login($admin);
    }
    return redirect()->route('ekspedisi.index');
})->name('login');

Route::get('/login-staff', function () {
    auth()->logout();
    $staff = User::where('role', 'staff')->first();
    if ($staff) {
        auth()->login($staff);
    }
    return redirect()->route('ekspedisi.index');
});

Route::get('/ekspedisi', [EkspedisiController::class, 'index'])->name('ekspedisi.index');
Route::post('/ekspedisi', [EkspedisiController::class, 'store'])->name('ekspedisi.store');
Route::get('/ekspedisi/{id}', [EkspedisiController::class, 'show'])->name('ekspedisi.show');
Route::get('/ekspedisi/{id}/edit', [EkspedisiController::class, 'edit'])->name('ekspedisi.edit');
Route::put('/ekspedisi/{id}', [EkspedisiController::class, 'update'])->name('ekspedisi.update');

Route::delete('/ekspedisi/{id}', [EkspedisiController::class, 'destroy'])->middleware('role:admin')->name('ekspedisi.destroy');