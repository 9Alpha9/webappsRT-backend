<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/user', function () {
    return User::all();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['force.json', 'auth:api'])->prefix('api')->group(function() {
    Route::get('skk', function() {
        dd('test');
    });
});

require __DIR__.'/auth.php';
