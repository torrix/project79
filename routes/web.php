<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class);

Route::get('/component/{component}', [ComponentController::class, 'show']);
Route::get('/component/{component}/preview', [ComponentController::class, 'preview']);
Route::get('/css/{component}', [ComponentController::class, 'css']);
