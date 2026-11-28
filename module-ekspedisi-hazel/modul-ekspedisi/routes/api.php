<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EkspedisiApiController;

Route::get('/ekspedisi', [
EkspedisiApiController::class,
'index'
]);

Route::get('/ekspedisi/{id}', [
EkspedisiApiController::class,
'show'
]);

Route::post('/ekspedisi', [
EkspedisiApiController::class,
'store'
]);

Route::put('/ekspedisi/{id}', [
EkspedisiApiController::class,
'update'
]);

Route::delete('/ekspedisi/{id}', [
EkspedisiApiController::class,
'destroy'
]);