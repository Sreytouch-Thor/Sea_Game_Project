<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

//Users routes
Route::get('/users', [UserController::class,'index']);
Route::post('/users', [UserController::class,'store']);
Route::get('/users/{id}', [UserController::class,'show']);
Route::put('/users/{id}', [UserController::class,'update']);
Route::delete('/users/{id}', [UserController::class,'destroy']);

//Ticket routes
Route::get('/tickets', [TicketController::class,'index']);
Route::post('/tickets', [TicketController::class,'store']);
Route::get('/tickets/{id}', [TicketController::class,'show']);
Route::put('/tickets/{id}', [TicketController::class,'update']);
Route::delete('/tickets/{id}', [TicketController::class,'destroy']);

//Event routes

Route::get('/searchEvent/{name}', [EventController::class,'searchEvent']);
Route::get('/event', [EventController::class,'index']);
Route::post('/event', [EventController::class,'store']);
Route::get('/event/{id}', [EventController::class,'show']);
Route::put('/event/{id}', [EventController::class,'update']);
Route::delete('/event/{id}', [EventController::class,'destroy']);

//team routes
Route::get('/team', [TeamController::class,'index']);
Route::post('/team', [TeamController::class,'store']);
Route::get('/team/{id}', [TeamController::class,'show']);
Route::put('/team/{id}', [TeamController::class,'update']);
Route::delete('/team/{id}', [TeamController::class,'destroy']);

