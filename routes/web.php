<?php

use Illuminate\Support\Facades\Route;
use Basketin\Paymob\Http\Controllers\CallbackController;

Route::prefix(config('basketin.paymob.callback.prefix', 'basketin/paymob'))->group(function () {
    Route::post('/transaction/processed', [CallbackController::class, 'processed']);
    Route::post('/transaction/response', [CallbackController::class, 'response']);
});
