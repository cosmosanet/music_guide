<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\MainController::class, 'welcome'])->name('welcome');
Route::get('/create_album', [App\Http\Controllers\CreateAlbumController::class, 'create_album'])->name('create_album');
Route::post('/Addalbum', [App\Http\Controllers\CreateAlbumController::class, 'Addalbum'])->name('Addalbum')
;
Route::post('/Changealbum', [App\Http\Controllers\ChangeController::class, 'Changealbum'])->name('Changealbum');
Route::get('change_album/{id}', [App\Http\Controllers\ChangeController::class, 'change_album'])->name('change_album');

Route::delete('DeleteAlbum', [App\Http\Controllers\ChangeController::class, 'DeleteAlbum'])->name('DeleteAlbum');
