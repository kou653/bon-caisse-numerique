<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ── Routes publiques (sans token) ──
Route::post('/login',  [AuthController::class, 'login']);

// ── Routes protégées (token Sanctum requis) ──
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',     [AuthController::class, 'me']);

    Route::apiResource('cash-vouchers', \App\Http\Controllers\CashVoucherController::class)
        ->only(['index', 'store', 'show']);
});
