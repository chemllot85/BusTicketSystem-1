<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StopController;

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

//create middleware on the admin URLs
Route::middleware('is_admin')->group(function(){
            /************Route Controller**********/
Route::get('/admin_dashboard/Routes',[RouteController::class, 'list']);
Route::get('/admin_dashboard/Routes/add',[RouteController::class, 'add']);
Route::post('/admin_dashboard/Routes/add/save',[RouteController::class, 'save']);
Route::get('/admin_dashboard/Routes/edit/{id}',[RouteController::class, 'edit']);
Route::post('/admin_dashboard/Routes/edit/update/{id}',[RouteController::class, 'update']);
Route::get('/admin_dashboard/Routes/delete/{id}',[RouteController::class, 'delete']);

/************Stop Controller**********/
Route::get('/admin_dashboard/Stops',[StopController::class, 'list']);
Route::get('/admin_dashboard/Stops/add',[StopController::class, 'add']);
Route::post('/admin_dashboard/Stops/add/save',[StopController::class, 'save']);
Route::get('/admin_dashboard/Stops/edit/{id}',[StopController::class, 'edit']);
Route::post('/admin_dashboard/Stops/edit/update/{id}',[StopController::class, 'update']);
Route::get('/admin_dashboard/Stops/delete/{id}',[StopController::class, 'delete']);

            /************Bus Controller**********/
Route::get('/admin_dashboard/Buses',[BusController::class,'list']);
Route::get('/admin_dashboard/Buses/add',[BusController::class,'add']);
Route::post('/admin_dashboard/Buses/save',[BusController::class,'save']);
Route::get('/admin_dashboard/Buses/edit/{id}',[BusController::class,'edit']);
Route::post('/admin_dashboard/Buses/update/{id}',[BusController::class,'update']);
Route::get('/admin_dashboard/Buses/delete/{id}',[BusController::class,'delete']);

            /************Seat Controller**********/
Route::get('/admin_dashboard/Seats',[SeatController::class,'list']);
Route::get('/admin_dashboard/Seats/add',[SeatController::class,'add']);
Route::post('/admin_dashboard/Seats/save',[SeatController::class,'save']);
Route::get('/admin_dashboard/Seats/edit/{id}',[SeatController::class,'edit']);
Route::post('/admin_dashboard/Seats/update/{id}',[SeatController::class,'update']);
Route::get('/admin_dashboard/Seats/delete/{id}',[SeatController::class,'delete']);
    });

            /************Ticket Controller**********/
Route::get('/', [TicketController::class,'getAllRoute']);
Route::post('/trips', [TicketController::class,'getAllBusTrips']);
Route::get('/trips/seats/{b_id}', [TicketController::class,'getAllSeats']);
/**************Add Middlware on booking can't book a seat until the user login***********/
Route::middleware('isLoggedIn')->group(function(){
    Route::get('/trips/seat/book/{seat_id}', [TicketController::class,'bookSeat']);
});

            /************User Controller**********/
Route::get('/users/register', [UserController::class,'register']);
Route::post('/users/save', [UserController::class,'save']);
Route::get('/users/login', [UserController::class,'login']);
Route::post('/users/handleLogin', [UserController::class,'handleLogin']);
Route::get('/users/logout', [UserController::class,'logout']);

Route::get('/notAuthorized',function(){
    return view('notAuth');
});