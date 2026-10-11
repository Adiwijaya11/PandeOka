<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');
