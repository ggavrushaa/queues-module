<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FailController;
use App\Http\Controllers\FastController;
use App\Http\Controllers\UniqueController;
use App\Http\Controllers\HorizonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListenerController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\HorizonBalanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fail', FailController::class);
Route::get('/unique', UniqueController::class);
Route::get('/fast', FastController::class);
Route::get('/listeners', ListenerController::class)->name('listener.index');

Route::get('user/profile', [ProfileController::class, 'index'])->name('user.profile.index');
Route::post('user/profile', [ProfileController::class, 'save'])->name('user.profile.save');
Route::get('/horizon-test', HorizonController::class)->name('horizon.test');
Route::get('/horizon-balance', HorizonBalanceController::class)->name('horizon.balance');

Route::get('/products/{product}', ProductController::class)->name('products.show');