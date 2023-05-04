<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController as S;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
