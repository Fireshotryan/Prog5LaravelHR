<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\TagsController;

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
Route::get('/', [TagsController::class, 'index']);
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

Route::get('/comments/{games}', [CommentsController::class, 'show'])->name('comments.show');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');


Route::post('/comments/{games}', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/tags', [App\Http\Controllers\Admin\TagsController::class, 'index'])->name('tags');

Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');

// Show user profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Update user profile
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('admin/games/{games}/delete', [GamesController::class, 'delete'])
->name('games.delete');

Route::get('/games/accept/{id}', [GamesController::class, 'accept'])->name('games.accept');

Route::get('/games/reject/{id}', [GamesController::class, 'reject'])->name('games.reject');

Route::get('admin/tags/{tags}/delete', [TagsController::class, 'delete'])
->name('tags.delete');

Route::get('admin/users/{users}/delete', [UsersController::class, 'delete'])
->name('users.delete');

Route::resource('/admin/games', GamesController::class);
Route::resource('/admin/tags', TagsController::class);
Route::resource('/admin/users', UsersController::class);
Route::resource('roles', RoleController::class);

