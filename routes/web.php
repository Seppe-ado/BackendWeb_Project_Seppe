<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsLikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NewsCommentsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\RequestsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class,'index'])->name('index');

Route::resource('posts', PostController::class);
Route::resource('news', NewsController::class);
Route::resource('users', UserController::class);
Route::resource('comments', CommentsController::class);
Route::resource('Newscomments', NewsCommentsController::class);
Route::resource('FAQ', FAQController::class);
Route::resource('Requests', RequestsController::class);




Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');
Route::get('Newslike/{postid}', [NewsLikesController::class, 'Newslike'])->name('Newslike');



Route::get('user/{name}', [UserController::class,'user'])->name('user');
Route::get('admins', [UserController::class,'admins'])->name('admins');
Route::put('addadmins', [UserController::class,'addadmins'])->name('addadmins');
Route::get('profile', [UserController::class,'profile'])->name('profile');
Route::get('adminview', [FAQController::class,'adminview'])->name('FAQ.adminview');

Route::get('create/{postid}', [CommentsController::class,'createid'])->name('createid');
Route::get('createN/{postid}', [NewsCommentsController::class,'createidnews'])->name('createidnews');




Route::get('/news', [NewsController::class,'Newsindex'])->name('Newsindex');
Route::get('/adminnews', [NewsController::class,'adminnews'])->name('adminnews');
Route::get('/adminindex', [PostController::class,'Adminindex'])->name('Adminindex');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
