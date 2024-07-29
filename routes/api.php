<?php

use App\Http\Controllers\Admin\auth\AdminAuthController;
use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\book\AdminBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\user\AdminUserController;
use App\Http\Controllers\Admin\ticket\AdminTicketController;

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

//admin authuantication
Route::put('/Admin/auth/',[AdminAuthController::class , 'register']);
Route::post('/Admin/auth/',[AdminAuthController::class , 'login']);

//admin routes for creating , editing , deleting ,returning admins
Route::get('/Admin/admin', [AdminController::class, 'index']);
Route::post('/Admin/admin', [AdminController::class, 'store']);
Route::get('/Admin/admin/{id}',[AdminController::class , 'show']);
Route::put('/Admin/admin/{id}',[AdminController::class , 'update']);
Route::delete('/Admin/admin/{id}',[AdminController::class , 'destroy']);

//admin routes for creating , editing , deleting ,returning users
Route::get('/Admin/user' , [AdminUserController::class , 'index' ]);
Route::post('/Admin/user' , [AdminUserController::class , 'store' ]);
Route::get('/Admin/user/{id}' , [AdminUserController::class , 'show']);
Route::put('/Admin/user/{id}' , [AdminUserController::class , 'update']);
Route::delete('/Admin/user/{id}' , [AdminUserController::class , 'destroy']);

//admin routes for creating , editing , deleting ,returning tickets
Route::get('/Admin/ticket' , [AdminTicketController::class , 'index' ]);
Route::post('/Admin/ticket' , [AdminTicketController::class , 'store' ]);
Route::get('/Admin/ticket/{id}' , [AdminTicketController::class , 'show']);
Route::put('/Admin/ticket/{id}' , [AdminTicketController::class , 'update']);
Route::delete('/Admin/ticket/{id}' , [AdminTicketController::class , 'destroy']);

// //admin routes for creating , editing , deleting ,returning bookings
// Route::get('/Admin/book' , [AdminBookingController::class , 'index' ]);
// Route::post('/Admin/book' , [AdminBookingController::class , 'store' ]);
// Route::get('/Admin/book/{id}' , [AdminBookingController::class , 'show']);
// Route::put('/Admin/book/{id}' , [AdminBookingController::class , 'update']);
// Route::delete('/Admin/book/{id}' , [AdminBookingController::class , 'destroy']);









