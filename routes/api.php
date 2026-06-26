<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LaporanController;

Route::post('/login-mobile', [AuthController::class, 'login']);
// laporan
Route::get('/laporan', [LaporanController::class, 'kirim']);
Route::post('/laporan', [LaporanController::class, 'menampilkan']);
