<?php

use App\Services\ProductCatalog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = ProductCatalog::all();

    return view('welcome', compact('products'));
})->name('home');

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/data', [CartController::class, 'data'])->name('cart.data');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/toggle-all', [CartController::class, 'toggleAll'])->name('cart.toggle-all');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

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

Route::get('/products/{id}/quick-view', function (int $id) {
    $product = Product::findOrFail($id);

    return response()->json([
        'id' => $product->id,
        'name' => $product->name,
        'slug' => $product->slug,
        'price' => $product->price,
        'formatted_price' => $product->formatted_price,
        'original_price' => $product->original_price,
        'formatted_original_price' => $product->formatted_original_price,
        'stock' => $product->stock,
        'image' => $product->image,
        'wood_type' => $product->wood_type,
        'finish' => $product->finish,
        'dimensions' => $product->dimensions,
    ]);
})->name('products.quick-view');

use App\Http\Controllers\Auth\AuthController;
use App\Models\Product;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/index', function () {
        return view('superadmin.index');
    })->name('superadmin.index');

    Route::get('/', function () {
        return redirect()->route('superadmin.index');
    });
});
