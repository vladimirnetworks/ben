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


Route::post('admin/post/{domain}/new',"App\Http\Controllers\adminController@addnewpost");
Route::get('admin/post/{domain}/{post_id}',"App\Http\Controllers\adminController@showpost");
Route::put('admin/post/{domain}/{post_id}',"App\Http\Controllers\adminController@updatepost");
Route::delete('admin/post/{domain}/{post_id}',"App\Http\Controllers\adminController@deletepost");



Route::get('/post',"App\Http\Controllers\PostController@create");