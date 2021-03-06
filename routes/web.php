<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ForumasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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
    return view('start');
});

Route::get('users', function()
{
    return view('start');
});

Route::get('forums', function()
{
    return view('forums');
});

Route::resource('/forum',ForumasController::class);

//Route::get('/forum', [ForumasController::class, 'index']);
Route::get('/forum/create', [ForumasController::class, 'create']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('comment',CommentController::class,['only'=>['update','destroy']]);
Route::post('comment/create/{forum}',[CommentController::class,'addThreadComment'])->name('threadcomment.store');
Route::post('comment/like',[LikeController::class,'toggleLike'])->name('toggleLike');
Route::post('reply/create/{comment}',[CommentController::class,'addReplyComment'])->name('replycomment.store');