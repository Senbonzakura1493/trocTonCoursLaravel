<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\APIPasswordResetRequestController;
use App\Http\Controllers\APIChangePasswordController;

use App\Http\Controllers\CollaborationsController;
use App\Http\Controllers\SchoolyearsController;
use App\Http\Controllers\CoursesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\CollaborationsController',
], function ($router) {
    Route::get('/collaborations', [CollaborationsController::class, 'indexApi']);
    Route::post('/collaborations/store',[CollaborationsController::class, 'storeApi']);
    Route::get('/collaborations/{user}',[CollaborationsController::class, 'showAPI']);

    Route::get('/schoolyears', [SchoolyearsController::class, 'indexApi']);
    Route::get('/courses', [CoursesController::class, 'indexApi']);
    
});


Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\AuthAPIController',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthAPIController::class, 'login'])->middleware('throttle:60,1');
    Route::post('/register', [AuthAPIController::class, 'register'])->middleware('throttle:60,1');
    Route::post('/logout', [AuthAPIController::class, 'logout']);
    Route::post('/refresh', [AuthAPIController::class, 'refresh']);
    Route::get('/user-profile', [AuthAPIController::class, 'me']);    
    Route::put('/user-profile-update', [AuthAPIController::class, 'update']);    
    Route::post('/reset-password-request', [APIPasswordResetRequestController::class, 'sendPasswordResetEmail']);
    Route::post('/change-password', [APIChangePasswordController::class, 'passwordResetProcess']);
});
