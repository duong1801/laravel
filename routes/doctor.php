<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Doctors\Auth\LoginController;
use App\Http\Controllers\Doctors\IndexController;
use App\Http\Controllers\Doctors\Auth\LogoutController;


Route::get('/', [IndexController::class, 'index'])->middleware('auth:doctor');
Route::get('/login', [LoginController::class, 'login'])->middleware('guest:doctor')->name('doctors.login');
Route::post('/login', [LoginController::class, 'postLogin'])->middleware('auth:doctor')->name('doctors.login');

Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth:doctor')->name('doctors.logout');

