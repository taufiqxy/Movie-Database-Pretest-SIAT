<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::redirect('/', '/tampil-movie');
Route::get('/tampil-movie', [MovieController::class, 'tampilMovie']);
Route::get('/tambah-movie', [MovieController::class, 'tambahMovie'])
->name('halaman.tambah');

Route::get('/update-hapus-movie', [MovieController::class, 'updateHapusMovie'])
->name('halaman.update.hapus');

Route::get('/{movie_id}/edit-movie', [MovieController::class, 'editMovie'])
->name('halaman.edit');

Route::post('/tambah-movie', [MovieController::class, 'storeMovie']);
Route::delete('/hapus-movie/{movie_id}', [MovieController::class, 'deleteMovie']);
Route::put('/update-movie/{movie_id}', [MovieController::class, 'updateMovie']);
