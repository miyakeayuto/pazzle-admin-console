<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('users/{user_id}', [\App\Http\Controllers\UserController::class, 'show'])
    ->name('users.show');
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('items', [\App\Http\Controllers\ItemController::class, 'index'])
    ->name('items.index');
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('mails', [\App\Http\Controllers\MailController::class, 'index'])
    ->name('mails.index');
