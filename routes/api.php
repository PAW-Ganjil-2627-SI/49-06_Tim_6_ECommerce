<?php

use App\Http\Controllers\Api\VoucherController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('vouchers', VoucherController::class);
});