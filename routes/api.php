<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\studentController;
use App\Models\car;
use App\Models\parrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/parent/add', [ParentController::class, 'add']);
Route::get('/parent/delete/{id}', [ParentController::class, 'delete']);
Route::put('/parent/update/{id}',[ParentController::class,'update']);
Route::get('/parent/getParent',[ParentController::class,'getParent']);

Route::post('/student/add', [studentController::class, 'add']);
Route::get('/student/delete/{id}', [studentController::class, 'delete']);
Route::put('/student/update/{id}', [studentController::class, 'update']);
Route::get('/student/getStudent', [studentController::class, 'getStudent']);

Route::post('/ride/add',[RideController::class,'add']);
Route::get('/ride/delete/{id}',[RideController::class,'delete']);
Route::put('/ride/update/{id}',[RideController::class,'update']);
Route::get('/ride/getParent/{id}',[RideController::class,'getParent']);

Route::post('/driver/add',[DriverController::class,'add']);
Route::get('/driver/delete/{id}',[DriverController::class,'delete']);
Route::put('/driver/update/{id}',[DriverController::class,'update']);
Route::get('/driver/getDriver',[DriverController::class,'getDriver']);

Route::post('/car/add',[CarController::class,'add']);
Route::get('/car/delete/{id}',[CarController::class,'delete']);
Route::put('/car/update/{id}',[CarController::class,'update']);
Route::get('/car/getCar',[CarController::class,'getCar']);


