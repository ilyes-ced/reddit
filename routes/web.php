<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages_controller;
use App\Http\Controllers\Posts_data_controller;
use App\Http\Controllers\auth_controller;
use App\Http\Controllers\Posts_controller;
use App\Http\Controllers\Posts_images_controller;
use App\Http\Controllers\Users_controller;
use App\Http\Controllers\Subs_controller;
use App\Http\Controllers\Comments_controller;



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
Route::get('/add_post', [Pages_controller::class, 'add_post'])->middleware('auth');
Route::get('/profile_page', [Pages_controller::class, 'profile_page'])->middleware('auth');

//Route::post('/load_more', [Pages_controller::class, 'load_more']);



Route::get('/login', [Pages_controller::class, 'login_page'])->name('confirm_login');
Route::get('/register', [Pages_controller::class, 'register_page']);

Route::post('/registeration', [auth_controller::class, 'register'])->name('register');
Route::post('/logging', [auth_controller::class, 'login'])->name('login');
Route::post('/loggingout', [auth_controller::class, 'logout'])->name('logout');


Route::post('/vote', [Posts_data_controller::class, 'index']);
Route::post('/bookmarks', [Posts_data_controller::class, 'bookmarks']);


Route::post('/join_leave_sub', [Users_controller::class, 'join_leave']);
Route::post('/join_leave_sub_auth', [Users_controller::class, 'join_leave_auth'])->middleware('auth');

Route::post('/create_comment', [Comments_controller::class, 'create_comment'])->middleware('auth')->name('create_comment');
Route::post('/vote_comment', [Comments_controller::class, 'vote_comment'])->middleware('auth')->name('vote_comment');


Route::post('/create_post', [Posts_controller::class, 'create'])->middleware('auth')->name('create_post');
Route::post('/create_post_image', [Posts_images_controller::class, 'create'])->middleware('auth')->name('create_post_image');




