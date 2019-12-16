<?php

// APIのURL以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
Route::get('/{any?}', function () {
  return view('index');
})->where('any', '.+');


// twitterログインURL
Route::get('auth/twitter', 'Auth\LoginController@redirectToProvider');
// twitterコールバックURL
Route::get('auth/twitter/callback', 'Auth\LoginController@handleProviderCallback');