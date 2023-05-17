<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController as S;
use App\Http\Controllers\HashtagController as H;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\CartController as CART;

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

Route::name('front-')->group(function () {
    Route::get('/', [F::class, 'index'])->name('index');
    Route::get('/story/{story}', [F::class, 'showStory'])->name('show-story');
    Route::get('/histories', [F::class, 'histories'])->name('histories');
    Route::put('/vote/{story}', [F::class, 'vote'])->name('vote')->middleware('role:admin|client');
    Route::get('/tags-list', [F::class, 'getTagsList'])->name('tags-list')->middleware('role:admin|client');
    Route::put('/add-tag/{story}', [F::class, 'addTag'])->name('add-tag')->middleware('role:admin|client');
    Route::post('/add-new-tag/{story}', [F::class, 'addNewTag'])->name('add-new-tag')->middleware('role:admin|client');
    
});



Route::prefix('stories')->name('stories-')->group(function () {
    Route::get('/', [S::class, 'index'])->name('index')->middleware('role:admin|client');
    Route::get('/create', [S::class, 'create'])->name('create')->middleware('role:admin|client');
    Route::post('/create', [S::class, 'store'])->name('store')->middleware('role:admin|client');
    Route::get('/{story}', [S::class, 'show'])->name('show')->middleware('role:admin|client');
    Route::get('/edit/{story}', [S::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{story}', [S::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{story}', [S::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('/editsum/{story}', [S::class, 'editsum'])->name('editsum')->middleware('role:admin|client');
    Route::put('/editsum/{story}', [S::class, 'updatesum'])->name('updatesum')->middleware('role:admin|client');
    
    });

Route::prefix('hashtags')->name('hashtags-')->group(function () {
    Route::get('/', [H::class, 'index'])->name('index')->middleware('role:admin');
    Route::get('/create', [H::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('/create', [H::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('/{hashtag}', [H::class, 'show'])->name('show')->middleware('role:admin');
    Route::get('/edit/{hashtag}', [H::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{hashtag}', [H::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{hashtag}', [H::class, 'destroy'])->name('delete')->middleware('role:admin');
    });

Route::prefix('orders')->name('orders-')->group(function () {
        Route::get('/', [O::class, 'index'])->name('index')->middleware('role:admin');
        Route::put('/status/{order}', [O::class, 'update'])->name('update')->middleware('role:admin');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
