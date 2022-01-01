<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BloodRequestController;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

// blood request
Route::get('/blood-requests', [BloodRequestController::class, 'index'])
    ->name('blood-requests')
    ->middleware('auth');

Route::post('/blood-requests', [BloodRequestController::class, 'store'])
    ->name('blood-requests.store')
    ->middleware('auth');

Route::get('/blood-requests/create', [BloodRequestController::class, 'create'])
    ->name('blood-requests.create')
    ->middleware('auth');


