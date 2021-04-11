<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('events-films')->group(function () {
    Route::get('/events', '\App\Http\Controllers\EventController@index')->name('getEventIndex');
    Route::get('/{id}/event-details', '\App\Http\Controllers\EventController@details')->name('getEventDetails');
    Route::get('/{id}/event-reservation', '\App\Http\Controllers\EventController@reservationDetails')->name('getEventReservation');
    Route::post('/{id}/event-reservation', '\App\Http\Controllers\EventController@makeReservation')->name('postEventReservation');

    Route::get('/films', 'FilmController@index')->name('getFilmIndex');
    Route::get('/{id}/film-details', '\App\Http\Controllers\FilmController@details')->name('getFilmDetails');
    Route::get('/{id}/film-reservation', '\App\Http\Controllers\FilmController@reservationDetails')->name('getFilmReservation');
    Route::post('/{id}/film-reservation', '\App\Http\Controllers\FilmController@makeReservation')->name('postFilmReservation');
});

Route::prefix('restaurants')->group(function () {
    Route::get('/', 'RestaurantController@index')->name('getRestaurantIndex');
    Route::get('/{id}/reservation', 'RestaurantController@details')->name('getRestaurantReservation');
    Route::post('/{id}/reservation', 'RestaurantController@makeReservation')->name('postRestaurantReservation');
    Route::get('/dashboard', 'RestaurantController@dashboard')->middleware(['auth'])->name('dashboard');
});
