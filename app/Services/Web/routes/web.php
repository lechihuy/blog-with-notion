<?php

use Illuminate\Support\Facades\Route;
use App\Services\Web\Http\Controllers\HomeController;
use App\Services\Web\Http\Controllers\ImageController;
use App\Services\Web\Http\Controllers\DetailController;

Route::get('/', HomeController::class)->name('home');

Route::get('/{slug}', DetailController::class)->name('detail');

Route::get('/storage/images/{image}', [ImageController::class, 'show'])
    ->name('images.show');
