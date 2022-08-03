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



// 雛形は以下
// Route::リクエスト方式('URI', メソッド)
// /postsにGETリクエストが来たらPostControllerのindexメソッドを実行する
Route::get('/posts', 'PostController@index');
Route::get('posts/create', 'PostController@create');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
