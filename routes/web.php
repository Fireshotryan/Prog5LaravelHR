<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\WritersController;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/', [GamesController::class, 'index']);
Route::get('/', [WriterController::class, 'index']);
Route::get('/', [UsersController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/games', [App\Http\Controllers\Admin\GamesController::class, 'index'])->name('games');

Route::get('/writers', [App\Http\Controllers\Admin\WritersController::class, 'index'])->name('writers');

Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');

Route::get('admin/games/{games}/delete', [GamesController::class, 'delete'])
->name('games.delete');

Route::resource('/admin/games', GamesController::class);

