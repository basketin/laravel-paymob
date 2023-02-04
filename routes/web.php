<?php

use Illuminate\Support\Facades\Route;
use OutMart\Paymob\Http\Controllers\CallbackController;

Route::prefix(config('paymob.callback.prefix', 'outmart/paymob'))->group(function () {
    Route::post('/transaction/processed', [CallbackController::class, 'processed']);
    Route::post('/transaction/response', [CallbackController::class, 'response']);
});
