<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('users', UserController::class);
    Route::get('/users/bloquear/{user}', [UserController::class, 'banForm'])->name('users.banForm');
    Route::post('/users/bloquear/{user}', [UserController::class, 'ban'])->name('users.ban');
    Route::get('/users/message', function () {
        return view('users.notification');
    })->name('users.notificacao');


    Route::resource('categories', CategoryController::class);

    Route::get('/games', function () {
        return view('games.index');
    })->name('games');

});
Auth::routes();


