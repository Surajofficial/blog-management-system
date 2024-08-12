<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
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

Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/loginsubmit', [UsersController::class, 'loginsubmit'])->name('loginsubmit');
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register-submit', [UsersController::class, 'create'])->name('registersubmit');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::post('/addcomment/{id}', [CommentsController::class, 'addcomment'])->name('addcomment');
    Route::resource('posts', PostController::class);
});