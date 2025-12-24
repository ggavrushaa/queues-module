<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FailController;
use App\Http\Controllers\FastController;
use App\Http\Controllers\ListenerController;
use App\Http\Controllers\UniqueController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fail', FailController::class);
Route::get('/unique', UniqueController::class);
Route::get('/fast', FastController::class);
Route::get('/listener', ListenerController::class)->name('listener.index');

Route::get('user/profile', [ProfileController::class, 'index'])->name('user.profile.index');
Route::post('user/profile', [ProfileController::class, 'save'])->name('user.profile.save');