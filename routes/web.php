<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages_controller;
use App\Http\Controllers\Votes_controller;
use App\Http\Controllers\auth_controller;

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
Route::get('/post/{id}', [Pages_controller::class, 'post_page'])->middleware('auth');
Route::get('/user/{id}', [Pages_controller::class, 'user_page']);

Route::get('/login', [Pages_controller::class, 'login_page'])->name('confirm_login');
Route::get('/register', [Pages_controller::class, 'register_page']);

Route::post('/registeration', [auth_controller::class, 'register'])->name('register');
Route::post('/logging', [auth_controller::class, 'login'])->name('login');
Route::post('/loggingout', [auth_controller::class, 'logout'])->name('logout');

Route::post('/vote', [Votes_controller::class, 'index']);
