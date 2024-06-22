<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Home page - list of cars
/* Route::get('/', [CarController::class, 'index']);
Route::post('/cars', [CarController::class, 'store']);
Route::get('/cars/create', [CarController::class, 'create']); */

Route::get('/', [CarController::class, 'index']);
Route::get('/cars/create', [CarController::class, 'create'])->middleware('auth');
Route::post('/cars', [CarController::class, 'store']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->middleware('auth');
Route::put('/cars/{id}', [CarController::class, 'update'])->middleware('auth');

// Manufacturers index page
Route::get('/manufacturers', [ManufacturerController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'delete'])->name('logout');
});


