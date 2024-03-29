<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [UserController::class, 'home'])->middleware(['auth'])->name('dashboard');

Route::post('/create-user', [UserController::class, 'createUserWithCredentials'])->name('createUser');

Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

Route::post('playlists/search', [PlaylistController::class, 'search'])->name('searchPlaylist');

Route::post('musics/search', [MusicController::class, 'search'])->name('searchMusic');

Route::resource('playlists', PlaylistController::class);

Route::resource('musics', MusicController::class);

Route::resource('users', UserController::class);

require __DIR__.'/auth.php';
