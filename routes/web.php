<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
    Route::post('/events/{id}/attendees', [EventController::class, 'storeAttendee'])->name('attendees.store');  
});

// login importado de laravel.
// https://laravel.com/docs/7.x/authentication#authentication-quickstart 

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


