<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* ログアウトルーティング */
Route::prefix('rank')->group(function () {
    // データ照会
    Route::get('/', [
        'as' => 'rank.get',
        'uses' => 'APIController@getDatas'
    ]);
    // データ登録
    Route::any('register', [
        'as' => 'rank.create',
        'uses' => 'APIController@putData'
    ]);
});
