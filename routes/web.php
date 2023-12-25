<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BusesController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'admin'], function(){


    Route::get('/home', [dashboard::class, 'home']) ->name('home');
});
Route::get('/home', [DashboardController::class, 'home']) ->name('home');
Route::get('/buses', [BusesController::class, 'index'])->name('buses.index');
Route::get('/buses/create', [BusesController::class, 'create'])->name('buses.create');
Route::post('/buses', [BusesController::class, 'store'])->name('buses.store');
Route::get('/buses/{bus}/edit', [BusesController::class, 'edit'])->name('buses.edit');
Route::put('/buses/{bus}', [BusesController::class, 'update'])->name('buses.update');
Route::delete('/buses/{bus}', [BusesController::class, 'destroy'])->name('buses.destroy');
Route::resource('routes', RouteController::class);
Route::resource('customers', CustomerController::class);
Route::resource('seats', SeatController::class);
Route::get('/seats', [SeatController::class, 'showSeatArrangementForm'])->name('seats.index.form');
Route::post('/seats', [SeatController::class, 'showSeatArrangement'])->name('seats.index');
Route::get('/seats/create', [SeatController::class, 'create'])->name('seats.create');
Route::post('/seats/store', [SeatController::class, 'store'])->name('seats.store');
Route::get('/seats/{seat}/edit', [SeatController::class, 'edit'])->name('seats.edit');
Route::put('/seats/{seat}', [SeatController::class, 'update'])->name('seats.update');
Route::delete('/seats/{seat}', [SeatController::class, 'destroy'])->name('seats.destroy');
Route::get('/seats/all', [SeatController::class, 'index'])->name('seats.index.all');
Route::get('/seats/{seat}', [SeatController::class, 'show'])->name('seats.show');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/get-customer-info/{customerId}', [BookingController::class, 'getCustomerInfo']);
Route::get('/bookings/get-suggestions/{busNumber}', [BookingController::class, 'getSuggestions']);
Route::get('/bookings/calculate-cost/{busNumber}/{source}/{destination}', [BookingController::class, 'calculateCost']);
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');