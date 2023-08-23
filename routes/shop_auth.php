<?php

use App\Http\Controllers\Shop_Auth\
{
    RegisteredShopController,
    AuthenticatedSessionShopController
};
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('shop-register', [RegisteredShopController::class, 'create'])
                ->name('shop-register');

    Route::post('shop-register', [RegisteredShopController::class, 'store']);

    Route::get('shop-login', [AuthenticatedSessionShopController::class, 'create'])
        ->name('shop-login');

    Route::post('shop-login', [AuthenticatedSessionShopController::class, 'store']);

});