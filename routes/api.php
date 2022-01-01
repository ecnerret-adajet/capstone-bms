<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HospitalsApiController;
use App\Http\Controllers\Api\BloodTypesApiController;
use App\Http\Controllers\Api\PurposesApiController;
use App\Http\Controllers\Api\UrgenciesApiController;
use App\Http\Controllers\Api\RhGroupsApiController;
use App\Http\Controllers\Api\BloodRequestsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function() {

    //Blood Requests
    Route::get('/blood-requests', [BloodRequestsApiController::class, 'index']);

    //hospital api
    Route::get('/hospitals', [HospitalsApiController::class, 'index']);
    
    //blood types
    Route::get('/blood-types', [BloodTypesApiController::class, 'index']);
    Route::post('/blood-types', [BloodTypesApiController::class, 'store']);
    
    //purposes api
    Route::get('/purposes', [PurposesApiController::class, 'index']);
    
    //urgencies api
    Route::get('/urgencies', [UrgenciesApiController::class, 'index']);
    
    //rh groups
    Route::get('/rh-groups', [RhGroupsApiController::class, 'index']);
    
});
