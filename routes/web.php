<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'index'])->name('site.home.index');
Route::get('/produto/{url}', [ProductController::class, 'show'])->name('site.product.show');
Route::get('/carrinho', [CheckoutController::class, 'orderIndex'])->name('site.checkout.order.index');
Route::get('/carrinho/adcionar/{product}', [CheckoutController::class, 'orderCreate'])->name('site.checkout.order.create');
Route::get('/carrinho/remover/{product}', [CheckoutController::class, 'orderDelete'])->name('site.checkout.order.delete');
Route::get('/checkout/endereco', [CheckoutController::class, 'addressIndex'])->name('site.checkout.address.index');
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
