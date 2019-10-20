<?php


// user一覧
Route::get('/users', 'UsersController@index')->name('users.index');

// mypageのuser
Route::get('/auth_user', 'UsersController@auth_user')->name('auth_user');
