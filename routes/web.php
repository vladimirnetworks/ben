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

if (hname() == 'benham2.ir') {

Route::get('/', function () {
    return "main";
});

} else {

    Route::get('/',"App\Http\Controllers\PostController@index");  

}

