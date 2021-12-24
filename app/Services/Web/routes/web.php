<?php

use Illuminate\Support\Facades\Route;
use App\Services\Web\Http\Controllers\HomeController;
use App\Services\Web\Http\Controllers\ImageController;

Route::get('/', HomeController::class);

Route::get('/storage/images/{image}', [ImageController::class, 'show'])
    ->name('images.show');