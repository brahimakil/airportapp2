<?php

use App\Http\Controllers\Admin\AdminController;
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



Route::post('/Admin', [AdminController::class, 'store']);
Route::get('/Admin', [AdminController::class, 'index']);
Route::get('/Admin/{id}',[AdminController::class , 'show']);
Route::put('/Admin/{id}',[AdminController::class , 'update']);
Route::delete('/Admin/{id}',[AdminController::class , 'destroy']);





