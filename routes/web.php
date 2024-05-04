<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class,'loginForm'])->name('login');
    Route::get('/', [AuthController::class,'loginForm'])->name('login');

    Route::post('/login', [AuthController::class,'authenticate'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [MessageController::class,'index'])->name('index');
    Route::get('/message', [MessageController::class,'message'])->name('message');
});

// Route::post('/pusher/auth', function (Request $request) {
//     return Broadcast::auth($request);
// });
