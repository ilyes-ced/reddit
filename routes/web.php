<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages_controller;
use App\Http\Controllers\votes_controller;

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

Route::get('/', [pages_controller::class, 'home_page']);
Route::get('/sub/{id}', [pages_controller::class, 'sub_page']);
Route::get('/post/{id}', [pages_controller::class, 'post_page']);
Route::get('/user/{id}', [pages_controller::class, 'user_page']);


Route::post('/vote', [votes_controller::class, 'index']);
