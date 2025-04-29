<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/csrf-token', function () {
    return csrf_token();
});

Route::get('/user', function () {
    return User::all();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware(['force.json', 'auth:api'])->prefix('api')->group(function() {
    Route::get('skk', function() {
        dd('test');
    });
});

require __DIR__.'/auth.php';
