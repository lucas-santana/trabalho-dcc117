<?php

use App\Http\Controllers\LibrayController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
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
    })->name('home');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/store', [StoreController::class,'index'])->name('store.index');
    Route::get('/store/show/{game}', [StoreController::class,'showCartProduct'])->name('store.showCartProduct');
    Route::get('/store/cart/show', [StoreController::class,'showCart'])->name('store.showCart');
    Route::delete('/store/cart/delete/{orderItem}', [StoreController::class,'deleteCartProduct'])->name('store.deleteOrderItem');
    Route::post('/store/cart/checkout', [StoreController::class,'checkout'])->name('store.checkout');
    Route::post('/store/cart/{game}', [StoreController::class,'addCart'])->name('store.addCart');
    Route::post('/store/wish-list/{game}', [StoreController::class,'addWishList'])->name('store.addWishList');

    Route::resource('categories', CategoryController::class)->middleware('can:manage-category');

    Route::resource('promotions', PromotionController::class);

    /*------------------- USUARIO -------------------------------------------------*/
    Route::resource('users', UserController::class);
    Route::get('/users/bloquear/{user}', [UserController::class, 'banForm'])->name('users.banForm');
    Route::post('/users/bloquear/{user}', [UserController::class, 'ban'])->name('users.ban');
    Route::get('/users/cadastro-dev/{user}', [UserController::class, 'registerDevForm'])->name('users.registerDevForm');
    Route::post('/users/cadastro-dev/{user}', [UserController::class, 'registerDev'])->name('users.registerDev');

    Route::get('/users/dados-desenvolvedor/{user}', function () {
        return view('users.viewDevData');
    })->name('users.viewDevData');

    /*------------------- JOGOS -------------------------------------------------*/

    Route::get('/games', [GameController::class,'index'])->name('games.index');

    Route::get('/games/create-step-1', [GameController::class,'createStep1'])->name('games.createStep1');
    Route::post('/games/create-step-1', [GameController::class,'storeStep1'])->name('games.storeStep1');

    Route::get('/games/create-step-2', [GameController::class,'createStep2'])->name('games.createStep2');
    Route::post('/games/create-step-2', [GameController::class,'storeStep2'])->name('games.storeStep2');

    Route::get('/games/edit/{game}', [GameController::class,'edit'])->name('games.edit');
    Route::put('/games/edit/{game}', [GameController::class,'update'])->name('games.update');

    Route::delete('/games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy');

    Route::get('/users/notificar/{user}', [UserController::class, 'notifyForm'])->name('users.notifyForm');
    Route::post('/users/notificar/{user}', [UserController::class, 'notify'])->name('users.notify');
    Route::get('/notificacoes', [UserController::class, 'listNotifications'])->name('users.listNotifications');


    Route::get('/library', [LibrayController::class,'index'])->name('library.index');
    Route::get('/library/game/review/{game}', [LibrayController::class,'reviewForm'])->name('library.reviewForm');
    Route::post('/library/game/review/{game}', [LibrayController::class,'saveReview'])->name('library.saveReview');

    Route::get('/wish-list', [WishListController::class,'index'])->name('wishlist.index');
    Route::delete('/wish-list/{game}', [WishListController::class,'destroy'])->name('wishlist.destroy');

});
Auth::routes();


