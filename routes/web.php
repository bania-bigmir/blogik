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

Route::resource('/','IndexController',[
    'except' => ['create','show','edit','update'],
    'names'=>[
        'index'=>'home'
    ]
    ]);

Route::resource('articles','ArticlesController',[

    'parameters' => [
        'articles' => 'alias'
    ]

]);
Route::get('cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat']);



Route::get('/home', 'IndexController@index');

Route::resource('comment','CommentController',['only'=>['store']]);
Route::resource('galereja','GalleryController',[

    'parameters' => [
        'galereja' => 'alias'
    ]
]);

Route::get('404','ErrorController@index');

Route::get('login','Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');






