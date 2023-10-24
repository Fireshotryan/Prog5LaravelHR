<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\WritersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [WritersController::class, 'index']);
Route::get('/', [UsersController::class, 'index']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/', [WelcomeController::class, 'welcome']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [WelcomeController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/games', [App\Http\Controllers\Admin\GamesController::class, 'index'])->name('games');

Route::get('/writers', [App\Http\Controllers\Admin\WritersController::class, 'index'])->name('writers');

Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');

Route::get('admin/games/{games}/delete', [GamesController::class, 'delete'])
->name('games.delete');

Route::get('/games/accept/{id}', [GamesController::class, 'accept'])->name('games.accept');

Route::get('/games/reject/{id}', [GamesController::class, 'reject'])->name('games.reject');


Route::get('admin/writers/{writers}/delete', [WritersController::class, 'delete'])
->name('writers.delete');

Route::get('admin/users/{users}/delete', [UsersController::class, 'delete'])
->name('users.delete');

Route::resource('/admin/games', GamesController::class);
Route::resource('/admin/writers', WritersController::class);
Route::resource('/admin/users', UsersController::class);
Route::resource('roles', RoleController::class);

