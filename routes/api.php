<?php


// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// ログイン
Route::post('/login', 'Auth\LoginController@login')->name('login');

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ログインユーザー
Route::get('/user', function () {
    return Auth::user();
})->name('user');

// user一覧
Route::get('/users', 'UsersController@index')->name('users.index');

// mypageのuser
Route::get('/auth_user', 'UsersController@auth_user')->name('auth_user');

// user一覧
Route::post('/profile_update', 'UsersController@profile_update')->name('profile_update');

// 写真投稿
Route::post('/photos', 'UsersController@photo_create')->name('photo.create');