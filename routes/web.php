<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/in/{user:username}', [App\Http\Controllers\UserController::class, 'show'])->name('usuario.show');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('links', App\Http\Controllers\LinkController::class);
    Route::resource('redes-sociales', App\Http\Controllers\SocialNetworkController::class)->parameters(['redes-sociales' => 'socialNetwork']);
    Route::get('perfil', [App\Http\Controllers\UserController::class, 'edit'])->name('usuario.edit');
    Route::put('perfil', [App\Http\Controllers\UserController::class, 'update'])->name('usuario.update');
    Route::post('perfil/avatar', [App\Http\Controllers\UserController::class, 'upload_avatar'])->name('usuario.avatar');
});