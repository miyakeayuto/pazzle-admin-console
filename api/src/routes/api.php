<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//ユーザー指定表示
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('users/{user_id}', [\App\Http\Controllers\UserController::class, 'show'])
    ->name('users.show');
//ユーザー一覧
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');
//アイテム一覧
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('items', [\App\Http\Controllers\ItemController::class, 'index'])
    ->name('items.index');
//メール一覧
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('mails', [\App\Http\Controllers\MailController::class, 'index'])
    ->name('mails.index');
//ユーザー所持アイテム一覧
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('usersItem/{user_id}', [\App\Http\Controllers\UserController::class, 'userItem'])
    ->name('users.userItem');
//ユーザー受信メール一覧
Route::middleware(\App\Http\Middleware\NoCacheMiddleware::class)
    ->get('mails/{user_id}', [\App\Http\Controllers\UserController::class, 'userMail'])
    ->name('mail.userMail');
//ユーザー登録
Route::post('users/store', [\App\Http\Controllers\UserController::class, 'store'])
    ->name('users.store');
//ユーザー更新
Route::post('users/update', [\App\Http\Controllers\UserController::class, 'update'])
    ->name('users.update');
