<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages_controller;
use App\Http\Controllers\Votes_controller;

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

Route::get('/', [Pages_controller::class, 'home_page']);
Route::get('/sub/{id}', [Pages_controller::class, 'sub_page']);
Route::get('/post/{id}', [Pages_controller::class, 'post_page']);
Route::get('/user/{id}', [Pages_controller::class, 'user_page']);


Route::post('/vote', [Votes_controller::class, 'index']);
