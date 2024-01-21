<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LoginController;
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

Route::group(['middleware' => 'user-access:admin,staff'], function () {
    Route::name('user.')->group(function () {
        Route::get('/input-user', [viewController::class, 'inputUsr'])->name('add');
        Route::post('/simpan-user', [UserController::class, 'simpanUsr'])->name('save');
        Route::get('/edit-form-user/{id}', [viewController::class, 'editUsr'])->name('edit');
        Route::post('/update-user', [UserController::class, 'updateUsr'])->name('update');
        Route::get('/delete-user/{id}', [UserController::class, 'deleteUsr'])->name('delete');
    });
});
Route::group(['middleware' => 'user-access:admin,staff'], function () {
    Route::controller(viewController::class)->group(function () {
        Route::get('/', 'dash')->name('home');
        Route::get('/kandidat', 'kandidat')->name('kandidat');
        Route::get('/user', 'user')->name('user');
        Route::get('/jadwal', 'jadwal')->name('jadwal');
        Route::get('/calendar', 'calendar')->name('calendar');
        Route::get('/event', 'event')->name('event');
    });

    Route::name('kandidat.')->group(function () {
        Route::get('/input-kandidat', [viewController::class, 'inputKand'])->name('add');
        Route::post('/simpan-kandidat', [KandidatController::class, 'simpanKand'])->name('save');
        Route::get('/edit-form-kandidat/{id}', [viewController::class, 'editKand'])->name('edit');
        Route::post('/update-kandidat', [KandidatController::class, 'updateKand'])->name('update');
        Route::get('/delete-kandidat/{id}', [KandidatController::class, 'deleteKand'])->name('delete');
    });


    Route::name('jadwal.')->group(function () {
        Route::get('/input-jadwal', [viewController::class, 'inputJadwal'])->name('add');
        Route::post('/simpan-jadwal', [JadwalController::class, 'simpanJadwal'])->name('save');
        Route::get('/edit-form-jadwal/{id}', [viewController::class, 'editJadwal'])->name('edit');
        Route::post('/update-jadwal', [JadwalController::class, 'updateJadwal'])->name('update');
        Route::get('/delete-jadwal/{id}', [JadwalController::class, 'deleteJadwal'])->name('delete');
    });
});

Route::group(['middleware' => 'user-access:user'], function () {
    Route::get('/get-candidate/{id}', [viewController::class, 'getCandidate'])->name('getCandidate');
});

Route::name('sign.')->group(function () {
    Route::get('/login', [viewController::class, 'signIn'])->name('in');
    Route::post('/signingIn', [LoginController::class, 'login'])->name('proccess');
    Route::get('/signingOut', [LoginController::class, 'logout'])->name('out');
});

Route::get('/block', 'viewController@block')->name('block');

Route::get('/get-events', [CalendarController::class, 'getEvents'])->name('getEvents');
