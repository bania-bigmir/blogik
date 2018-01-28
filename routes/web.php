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
    'only'=>['index'],
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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('comment','CommentController',['only'=>['store']]);
Route::resource('galereja','GalleryController',[

    'parameters' => [

        'galereja' => 'alias'

    ]
]);
