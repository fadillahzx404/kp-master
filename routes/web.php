<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerksController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('merks', MerksController::class);
    Route::resource('transactions', TransactionsController::class);
    Route::resource('barangs', BarangsController::class);
    Route::resource('user-settings', UsersController::class);
});
