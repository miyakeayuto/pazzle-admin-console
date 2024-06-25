<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login'])->name('login');

//doLoginのルーティング追加
Route::post('accounts/doLogin', [AccountController::class, 'doLogin'])->name('doLogin');

//doLogoutのルーティング追加
Route::post('accounts/doLogout', [AccountController::class, 'doLogout'])->name('doLogout');

//userのルーティング追加
Route::get('accounts/user', [AccountController::class, 'userList'])->name('accounts.user-list');

//itemのルーティング追加
Route::get('accounts/item', [AccountController::class, 'itemList'])->name('accounts.item');

//have_itemのルーティング追加
Route::get('accounts/have_item', [AccountController::class, 'have_ItemList'])->name('accounts.have-item');

//アカウント登録のルーティング追加
Route::get('accounts/add', [AccountController::class, 'addAccount'])->name('accounts.create');

//アカウント登録処理のルーティング追加
Route::post('accounts/doAdd', [AccountController::class, 'doAdd'])->name('accounts.store');

//アカウント追加完了画面のルーティング追加
Route::get('accounts/complete', [AccountController::class, 'addComplete'])->name('accounts.complete');

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index'])->name('accounts.index');

Route::post('accounts/index', [AccountController::class, 'index']);
