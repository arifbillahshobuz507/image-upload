<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/single-image', [ImageController::class, 'singleImagePage']);
Route::post('/single-store', [ImageController::class, 'singleImageStore'])->name('single.image.store');

Route::get('/multiple-image', [ImageController::class, 'multipleImagePage']);

Route::post('/multiple-store', [ImageController::class, 'multipleImageStore'])->name('multiple.image.store');
