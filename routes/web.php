<?php

use Illuminate\Support\Facades\Route;

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

if (hname() == 'benham2.ir' || hname() == 'www.benham2.ir') {

Route::get('/', function () {
    return "main";
});



} else {

    Route::get('/',"App\Http\Controllers\PostController@index"); 
    Route::get('/index/{page}',"App\Http\Controllers\PostController@index");  
    Route::get('/cat/{cat}',"App\Http\Controllers\PostController@cat");
    Route::get('/cat/{cat}/index/{page}',"App\Http\Controllers\PostController@cat");  
    Route::get('/post/{url}-{post}.html', "App\Http\Controllers\PostController@show")->where('url','[a-zA-z0-9-\s]+');

}

