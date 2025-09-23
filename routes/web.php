<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'index'])->name('site.home.index');
Route::get('/produto/{url}', [ProductController::class, 'show'])->name('site.product.show');

Route::middleware('auth')->group(
    function () {
        Route::get('/carrinho', [OrderController::class, 'index'])->name('site.checkout.order.index');
        Route::post('/carrinho/adcionar', [OrderController::class, 'store'])->name('site.checkout.order.store');
        Route::post('/carrinho/remover', [OrderController::class, 'destroy'])->name('site.checkout.order.destroy');

        Route::get('/checkout/endereco', [CheckoutController::class, 'addressIndex'])->name('site.checkout.address.index');
        Route::post('/checkout/endereco', [CheckoutController::class, 'addressStore'])->name('site.checkout.address.store');
        Route::get('/checkout/frete', [CheckoutController::class, 'freightIndex'])->name('site.checkout.freight.index');
        Route::post('/checkout/frete', [CheckoutController::class, 'freightStore'])->name('site.checkout.freight.store');
        Route::get('/checkout/pagamento', [CheckoutController::class, 'paymentIndex'])->name('site.checkout.payment.index');
        Route::post('/checkout/pagamento', [CheckoutController::class, 'paymentStore'])->name('site.checkout.payment.store');
    }
);
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
