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
    setcookie("vstx", "v", time() + 60*30, "/", ".benham.ir");

    $flnm = date("Y-m-d-h:i");

    if (!file_exists("onlinex.json")) {
        file_put_contents("onlinex.json", json_encode([date("y-m-dXh:i")=>0]));
    } else {
        $xvis = json_decode(file_get_contents("onlinex.json"),true);
       if (count(array_keys($xvis))>1) {
           $latest = array_keys($xvis)[count(array_keys($xvis))-1];
    
           $xvis = [$latest=>$xvis[$latest]];
       }
        if (isset($xvis[date("y-m-dXh:i")])) {
        $xvis[date("y-m-dXh:i")]++;
        } else {
            $xvis[date("y-m-dXh:i")] = rand(30,50);
        }
        file_put_contents("onlinex.json", json_encode($xvis));
    }

  


   
}

if (hname() == 'www.benham.ir' || hname() == 'benham.ir' || hname() == 'benham2.ir' || hname() == 'www.benham2.ir' || hname() == '192.168.1.216') {

    Route::get('/', "App\Http\Controllers\MainPageController@index");
    Route::get('/{cat}', "App\Http\Controllers\MainPageController@index");
    Route::post('/search', "App\Http\Controllers\MainPageController@searchall");
} else {

    Route::get('/', "App\Http\Controllers\PostController@index");
    Route::get('/index/{page}', "App\Http\Controllers\PostController@index");
    Route::get('/cat/{cat}', "App\Http\Controllers\PostController@cat");
    Route::get('/cat/{cat}/{page}', "App\Http\Controllers\PostController@cat");
    Route::get('/post/{url}-{post}.html', "App\Http\Controllers\PostController@show")->where('url', '[a-zA-z0-9-\s]+');
}
