<?php

declare(strict_types=1);

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index']);
Route::post('/image/compress', [ImageController::class, 'compress'])->name('image.compress');
