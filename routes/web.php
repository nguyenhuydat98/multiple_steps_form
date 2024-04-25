<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('order')->group(function () {
    Route::get('/step-1', [OrderController::class, 'createStepOne'])->name('order.create-step-one');
    Route::post('/step-1', [OrderController::class, 'storeStepOne'])->name('order.store-step-one');
    Route::get('/step-2', [OrderController::class, 'createStepTwo'])->name('order.create-step-two')
        ->middleware('step-two-order');
    Route::post('/step-2', [OrderController::class, 'storeStepTwo'])->name('order.store-step-two');
    Route::get('/step-3', [OrderController::class, 'createStepThree'])->name('order.create-step-three')
        ->middleware('step-three-order');
    Route::post('/step-3', [OrderController::class, 'storeStepThree'])->name('order.store-step-three');
    Route::get('/review', [OrderController::class, 'review'])->name('order.review')
        ->middleware('review-order');
    Route::get('/step-3/dish', [OrderController::class, 'createItemDish'])->name('order.create-item-dish');
    Route::get('/reset', [OrderController::class, 'reset'])->name('order.reset');
});
