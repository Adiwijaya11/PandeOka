<?php

use App\Services\ProductCatalog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = ProductCatalog::all();

    return view('welcome', compact('products'));
})->name('home');

Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');

Route::get('/new-arrivals', function () {
    $products = ProductCatalog::all();

    return view('new-arrivals', compact('products'));
})->name('new-arrivals');

Route::get('/products/{slug}', function (string $slug) {
    $product = ProductCatalog::findBySlug($slug);
    if (! $product) {
        abort(404);
    }
    $relatedProducts = ProductCatalog::getRelated($product['category_slug'], $product['slug'], 4);

    return view('products.show', compact('product', 'relatedProducts'));
})->name('products.show');
