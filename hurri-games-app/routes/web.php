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

    Route::get('/store', function () {
        return view('games.store');
    })->name('store');

    Route::get('/library', function () {
        return view('games.library');
    })->name('library');

    Route::resource('users', UserController::class);
    Route::get('/users/bloquear/{user}', [UserController::class, 'banForm'])->name('users.banForm');
    Route::post('/users/bloquear/{user}', [UserController::class, 'ban'])->name('users.ban');
    Route::get('/users/cadastro-dev/{user}', [UserController::class, 'registerDevForm'])->name('users.registerDevForm');
    Route::post('/users/cadastro-dev/{user}', [UserController::class, 'registerDev'])->name('users.registerDev');

    Route::get('/users/dados-desenvolvedor/{user}', function () {
        return view('users.viewDevData');
    })->name('users.viewDevData');

    Route::resource('categories', CategoryController::class)->middleware('can:manage-category');

    Route::get('/games', function () {
        return view('games.index');
    })->name('games');

    Route::get('/receiveMessage', function () {
        return view('layouts.receiveMessage');
    })->name('receiveMessage');

    Route::get('/registerGame', function () {
        return view('games.registerGame');
    })->name('registerGame');

    Route::get('statsGames', function () {
        return view('games.statsGames');
    })->name('statsGames');

    Route::get('/users/notificar/{user}', [UserController::class, 'notifyForm'])->name('users.notifyForm');
    Route::post('/users/notificar/{user}', [UserController::class, 'notify'])->name('users.notify');

});
Auth::routes();


