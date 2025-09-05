<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Home::class)
    ->name('home');

Route::get('product', App\Livewire\Product::class)
    ->name('product');

Route::get('product/{slug}', App\Livewire\ProductDetail::class)
    ->name('product.detail');

Route::get('cart', App\Livewire\Cart::class)
    ->name('cart');

Route::get('checkout', App\Livewire\Checkout::class)
    ->name('checkout');

Route::get('about', App\Livewire\About::class)
    ->name('about');

Route::get('contact', App\Livewire\Contact::class)
    ->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('my-orders', App\Livewire\MyOrders::class)
        ->name('my.orders');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', App\Livewire\Admin\Dashboard::class)
        ->name('dashboard');

    Route::get('product', App\Livewire\Admin\Product\Index::class)
        ->name('product.index');

    Route::get('product/{id}/edit', App\Livewire\Admin\Product\Edit::class)
        ->name('product.edit');

    Route::get('order', App\Livewire\Admin\Order\Index::class)
        ->name('order.index');

    Route::get('order/{order}', App\Livewire\Admin\Order\Show::class)
        ->name('order.show');

    Route::get('customer', App\Livewire\Admin\Customer\Index::class)
        ->name('customer.index');

    Route::get('customer/{customer}', App\Livewire\Admin\Customer\Show::class)
        ->name('customer.show');
});

require __DIR__ . '/auth.php';
