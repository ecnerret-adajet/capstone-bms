<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HospitalsControllers;
use App\Http\Controllers\UsersController;

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

// blood bank inventory
Route::get('/blood-banks', [BloodBankController::class, 'index'])
    ->name('blood-banks')
    ->middleware('auth');

Route::get('/blood-banks/create', [BloodBankController::class, 'create'])
    ->name('blood-banks.create')
    ->middleware('auth');


// blood request
Route::get('/blood-requests', [BloodRequestController::class, 'index'])
    ->name('blood-requests')
    ->middleware('auth');
    
Route::get('/blood-requests/profile', [BloodRequestController::class, 'profile'])
    ->name('blood-requests.profile')
    ->middleware('auth');

Route::post('/blood-requests', [BloodRequestController::class, 'store'])
    ->name('blood-requests.store')
    ->middleware('auth');

Route::get('/blood-requests/create', [BloodRequestController::class, 'create'])
    ->name('blood-requests.create')
    ->middleware('auth');

Route::get('/blood-requests/edit/{bloodRequest}', [BloodRequestController::class, 'edit'])
    ->name('blood-requests.edit')
    ->middleware('auth');
    
Route::get('/blood-requests/show-approval/{bloodRequest}', [BloodRequestController::class, 'showRequestApproval'])
    ->name('blood-requests.show-approval')
    ->middleware('auth');

// Donors
Route::get('/donors', [DonorsController::class, 'index'])
    ->name('donors')
    ->middleware('auth');

Route::get('/donors/profile', [DonorsController::class, 'donor'])
    ->name('donors.profile')
    ->middleware('auth');

Route::get('/donors/create', [DonorsController::class, 'create'])
    ->name('donors.create')
    ->middleware('auth');

Route::get('/donors/edit/{donor}', [DonorsController::class, 'edit'])
    ->name('donors.edit')
    ->middleware('auth');

// Hospitals
Route::get('/hospitals', [HospitalsControllers::class, 'index'])
    ->name('hospitals')
    ->middleware('auth');

Route::get('/hospitals/create', [HospitalsControllers::class, 'create'])
    ->name('hospitals.create')
    ->middleware('auth');

Route::get('/hospitals/edit/{hospital}',[HospitalsControllers::class, 'edit'])
    ->name('hospitals.edit')
    ->middleware('auth');

// Events
Route::get('/events', [EventController::class, 'index'])
    ->name('events')
    ->middleware('auth');

Route::get('/events/create', [EventController::class, 'create'])
    ->name('events.create')
    ->middleware('auth');

// users
Route::get('/users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('auth');

Route::get('/users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

// role
Route::get('/roles', [UsersController::class, 'roles'])
    ->name('roles')
    ->middleware('auth');



