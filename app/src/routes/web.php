<?php

use App\Http\Controllers\AccountController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

//ルートのグループ化
Route::prefix('accounts')->name('accounts.')->controller(AccountController::class)
    ->middleware(AuthMiddleware::class)
    ->group(function () {
        Route::get('user', 'userList')->name('user-list');                      //userのルート
        Route::get('add', 'addAccount')->name('create');                        //アカウント登録のルーティング追加
        Route::post('doAdd', 'doAdd')->name('store');                           //アカウント登録処理のルーティング追加
        Route::get('complete', 'addComplete')->name('complete');                //アカウント追加完了画面のルーティング追加
        Route::post('delete', 'delete')->name('delete');                        //アカウント削除画面のルート
        Route::post('doDelete', 'doDelete')->name('doDelete');                  //アカウント削除処理のルート
        Route::get('completeDel', 'completeDel')->name('completeDel');         //アカウント削除完了のルート
    });

Route::get('/', [AccountController::class, 'login'])->name('login');

//doLoginのルーティング追加
Route::post('accounts/doLogin', [AccountController::class, 'doLogin'])->name('doLogin');

//doLogoutのルーティング追加
Route::post('accounts/doLogout', [AccountController::class, 'doLogout'])->name('doLogout');

//itemのルーティング追加
Route::get('accounts/item', [AccountController::class, 'itemList'])->name('accounts.item');

//have_itemのルーティング追加
Route::get('accounts/have_item', [AccountController::class, 'have_ItemList'])->name('accounts.have-item');

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index'])->name('accounts.index');

Route::post('accounts/index', [AccountController::class, 'index']);
