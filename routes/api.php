<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/users'],function (){
    Route::get('view', [UserController::class,'view']);
    Route::post('create', [UserController::class,'create']);
});

Route::group(['prefix'=>'/roles'],function (){
    Route::get('view', [RoleController::class,'view']);
    Route::get('view/{id}', [RoleController::class,'viewById']);
    Route::post('create', [RoleController::class,'create']);
    Route::put('update/{id}', [RoleController::class,'update']);
});

Route::group(['prefix'=>'/permissions'],function (){
    Route::get('view', [PermissionController::class,'view']);
    Route::post('create', [PermissionController::class,'create']);
});

Route::group(['prefix'=>'/auth','middleware' => ['role']],function (){
    Route::post('login', [AuthController::class,'login']);
});
Route::post('login', [AuthController::class,'login']);

/*Route::group(['prefix'=>'/auth','middleware' => ['role:super-admin']], function () {
    Route::post('login', [AuthController::class,'login']);
});*/
