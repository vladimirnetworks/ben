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

if (!isset($_COOKIE['vstx'])) {
   setcookie("vstx","v",time() + 10,"/",".benham.ir");
}

if (hname() == 'www.benham.ir' || hname() == 'benham.ir' || hname() == 'benham2.ir' || hname() == 'www.benham2.ir' || hname() == '192.168.1.216') {

Route::get('/', "App\Http\Controllers\MainPageController@index");
Route::get('/{cat}', "App\Http\Controllers\MainPageController@index");
Route::post('/search', "App\Http\Controllers\MainPageController@searchall");

} else {

    Route::get('/',"App\Http\Controllers\PostController@index"); 
    Route::get('/index/{page}',"App\Http\Controllers\PostController@index");  
    Route::get('/cat/{cat}',"App\Http\Controllers\PostController@cat");
    Route::get('/cat/{cat}/{page}',"App\Http\Controllers\PostController@cat");  
    Route::get('/post/{url}-{post}.html', "App\Http\Controllers\PostController@show")->where('url','[a-zA-z0-9-\s]+');

}

