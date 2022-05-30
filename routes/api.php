<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HospitalsApiController;
use App\Http\Controllers\Api\BloodTypesApiController;
use App\Http\Controllers\Api\PurposesApiController;
use App\Http\Controllers\Api\UrgenciesApiController;
use App\Http\Controllers\Api\RhGroupsApiController;
use App\Http\Controllers\Api\BloodRequestsApiController;
use App\Http\Controllers\Api\DonorsApiController;
use App\Http\Controllers\Api\GendersApiController;
use App\Http\Controllers\Api\UsersApiController;

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
    Route::get('/blood-requests/profile', [BloodRequestsApiController::class, 'requestorProfile']);
    Route::post('/blood-requests', [BloodRequestsApiController::class, 'store']);
    Route::post('/blood-requests/{bloodRequest}', [BloodRequestsApiController::class, 'update']);
    Route::post('/blood-requests/approval/{bloodRequest}', [BloodRequestsApiController::class, 'approval']);
    Route::get('/blood-requests/total-approved', [BloodRequestsApiController::class, 'totalApprovedBags']);
    Route::get('/blood-requests/total-approved-req', [BloodRequestsApiController::class, 'totalApprovedRequest']);
    Route::get('/blood-requests/total-pending-req', [BloodRequestsApiController::class, 'totalPending']);

    //hospital api
    Route::get('/hospitals', [HospitalsApiController::class, 'index']);
    Route::post('/hospitals',[HospitalsApiController::class,'store']);
    
    //blood types
    Route::get('/blood-types', [BloodTypesApiController::class, 'index']);
    Route::post('/blood-types', [BloodTypesApiController::class, 'store']);
    
    //purposes api
    Route::get('/purposes', [PurposesApiController::class, 'index']);
    
    //urgencies api
    Route::get('/urgencies', [UrgenciesApiController::class, 'index']);
    
    //rh groups
    Route::get('/rh-groups', [RhGroupsApiController::class, 'index']);

    // Donors 
    Route::get('/donors', [DonorsApiController::class, 'index']);
    Route::get('/donors-profile', [DonorsApiController::class, 'donorProfile']);
    Route::post('/donors', [DonorsApiController::class, 'store']);
    Route::post('/donors/{donor}', [DonorsApiController::class, 'update']);
    
    //gender
    Route::get('/genders',[GendersApiController::class,'index']);
    
    // users 
    Route::get('/users',[UsersApiController::class,'index']);
    Route::post('/users',[UsersApiController::class,'store']);

    // users 
    Route::get('/roles',[UsersApiController::class,'roles']);

});
