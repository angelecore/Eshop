<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ForumasController;

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


Route::resource('/forum','ForumasController');
Route::get('/prices', [MainController::class, 'forum']);