<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RedisSessionDemo;
use App\Http\Controllers\jsonDemo;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getjson', [jsonDemo::class,'index']);

Route::get('/get_userorders/{id?}', [jsonDemo::class,'userOrders']);
