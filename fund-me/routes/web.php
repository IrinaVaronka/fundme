<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController as S;
use App\Http\Controllers\HashtagController as H;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('stories')->name('stories-')->group(function () {
    Route::get('/', [S::class, 'index'])->name('index');
    Route::get('/create', [S::class, 'create'])->name('create');
    Route::post('/create', [S::class, 'store'])->name('store');
    Route::get('/{story}', [S::class, 'show'])->name('show');
    Route::get('/edit/{story}', [S::class, 'edit'])->name('edit');
    Route::put('/edit/{story}', [S::class, 'update'])->name('update');
    Route::delete('/delete/{story}', [S::class, 'destroy'])->name('delete');
    });

Route::prefix('hashtags')->name('hashtags-')->group(function () {
    Route::get('/', [H::class, 'index'])->name('index');
    Route::get('/create', [H::class, 'create'])->name('create');
    Route::post('/create', [H::class, 'store'])->name('store');
    Route::get('/{hashtag}', [H::class, 'show'])->name('show');
    Route::get('/edit/{hashtag}', [H::class, 'edit'])->name('edit');
    Route::put('/edit/{hashtag}', [H::class, 'update'])->name('update');
    Route::delete('/delete/{hashtag}', [H::class, 'destroy'])->name('delete');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
