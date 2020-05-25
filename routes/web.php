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

Route::get('/','ContentsController@index'); //上書き

//ユーザ登録機能
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
//ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ユーザ機能
Route::group(['middleware' => 'auth'], function (){
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    Route::resource('contents', 'ContentsController',['only' => ['store', 'destroy','index','show', 'update','create','edit']]);
    
    Route::group(['prefix' => 'users/{id}'],function (){
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('recommends', 'UsersController@recommends')->name('users.recommends');
    });
    
    Route::group(['prefix' => 'contents/{id}'], function (){
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::post('recommend', 'RecommendedContentsController@store')->name('recommends.recommend');
        Route::delete('unrecomend', 'RecommendedContentsController@destroy')->name('recommends.unrecommend');
    });
    //検索ページ
   // Route::resource('serch', 'SerchController');
    Route::get('serch', 'SerchController@getSearch')->name('serch.getSearch');
});
/*
//投稿詳細ページ
Route::get('contents/{id}', 'ContentsController@content_show');
//投稿更新処理
Route::put('contents/{id}', 'ContentsController@update');
//create:新規作成用のページ
Route::get('contents/create', 'ContentsController@create')->name('contents.create');
//edit:更新用のフォームページ
Route::get('contents/{id}/edit', 'ContentsController@edit')->name('contents.edit');
*/