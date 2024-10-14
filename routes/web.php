<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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
Route::get('movies', [MovieController::class                , 'index'])->name('movies.index');
Route::post('movies/create', [MovieController::class        , 'store'])->name('movies.store');
Route::get('movies/create', [MovieController::class         ,  'create'])->name('movies.create');
Route::get('movies/{movie}', [MovieController::class        ,  'show'])->name('movies.show');
Route::get('movies/{movie}/edit', [MovieController::class   , 'edit'])->name('movies.edit');
Route::put('movies/{movie}/edit', [MovieController::class        , 'update'])->name('movies.update');
Route::delete('movies/{movie}/delete', [MovieController::class     , 'destroy'])->name('movies.destroy');


Route::get('movies/search/movie', [MovieController::class, 'search'])->name('movies.search');
