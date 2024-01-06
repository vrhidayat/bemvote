<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mhsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\viewController;
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


Route::get('/', [viewController::class, 'dash'])->name('home');
// Route::get('/home', [viewController::class, 'dash']);
Route::get('/kandidat', [viewController::class, 'kandidat'])->name('kandidat');
Route::get('/user', [viewController::class, 'user'])->name('user');

Route::get('/signin', [viewController::class, 'signIn'])->name('signIn');
Route::post('/signingIn', [LoginController::class, 'login'])->name('loginProcess');
Route::get('/signingOut', [LoginController::class, 'logout'])->name('logout');

Route::get('/input-user', [viewController::class, 'inputUsr'])->name('user.add');
Route::post('/simpan-user', [UserController::class, 'simpanUsr'])->name('user.save');
Route::get('/edit-form-user/{id}', [viewController::class, 'editUsr'])->name('user.edit');
Route::post('/update-user', [UserController::class, 'updateUsr'])->name('user.update');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUsr'])->name('user.delete');

Route::get('/input-kandidat', [viewController::class, 'inputKand'])->name('kandidat.add');
Route::post('/simpan-kandidat', [KandidatController::class, 'simpanKand'])->name('kandidat.save');
Route::get('/edit-form-kandidat/{id}', [viewController::class, 'editKand'])->name('kandidat.edit');
Route::post('/update-kandidat', [KandidatController::class, 'updateKand'])->name('kandidat.update');
Route::get('/delete-kandidat/{id}', [KandidatController::class, 'deleteKand'])->name('kandidat.delete');
