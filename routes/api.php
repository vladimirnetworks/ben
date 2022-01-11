<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin/search/{query}',"App\Http\Controllers\adminController@bigsearch");
Route::get('admin/post/{domain_id}/{post_id}',"App\Http\Controllers\adminController@showpost");


Route::get('/post',"App\Http\Controllers\PostController@create");