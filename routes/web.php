<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::controller(ProductController::class)->name('product.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/show/{slug}', 'show')->name('show');
    Route::get('/edit/{slug}', 'edit')->name('edit');
    Route::post('/create', 'store')->name('store');
    Route::patch('/update/{slug}', 'update')->name('update');
    Route::delete('/destroy/{slug}', 'destroy')->name('destroy');
});
