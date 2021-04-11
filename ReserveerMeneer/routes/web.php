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
    Route::get('/', '\App\Http\Controllers\EventFilmController@index')->name('getEventFilmIndex');

    Route::get('/events', '\App\Http\Controllers\EventController@index')->name('getEventIndex');
    Route::get('/{id}/event-details', '\App\Http\Controllers\EventController@details')->name('getEventDetails');
    Route::get('/{id}/event-reservation', '\App\Http\Controllers\EventController@reservationDetails')->name('getEventReservation');
    Route::post('/{id}/event-reservation', '\App\Http\Controllers\EventController@makeReservation')->name('postEventReservation');

    Route::get('/eventsAdmin', '\App\Http\Controllers\EventController@indexAdmin')->name('getEventAdminIndex');
    Route::get('/event-create', '\App\Http\Controllers\EventController@create')->name('getEventCreate');
    Route::get('/{id}/event-edit', '\App\Http\Controllers\EventController@edit')->name('getEventEdit');
    Route::post('/event-store', '\App\Http\Controllers\EventController@store')->name('postEventStore');
    Route::post('/{id}/event-update', '\App\Http\Controllers\EventController@update')->name('postEventEdit');
    Route::post('/{id}/event-delete', '\App\Http\Controllers\EventController@delete')->name('postEventDelete');

    Route::get('/films', 'FilmController@index')->name('getFilmIndex');
    Route::get('/{id}/film-details', '\App\Http\Controllers\FilmController@details')->name('getFilmDetails');
    Route::get('/{id}/film-reservation', '\App\Http\Controllers\FilmController@reservationDetails')->name('getFilmReservation');
    Route::post('/{id}/film-reservation', '\App\Http\Controllers\FilmController@makeReservation')->name('postFilmReservation');

    Route::get('/filmsAdmin', '\App\Http\Controllers\FilmController@indexAdmin')->name('getFilmAdminIndex');
    Route::get('/film-create', '\App\Http\Controllers\FilmController@create')->name('getFilmCreate');
    Route::get('/{id}/film-edit', '\App\Http\Controllers\FilmController@edit')->name('getFilmEdit');
    Route::post('/film-store', '\App\Http\Controllers\FilmController@store')->name('postFilmStore');
    Route::post('/{id}/film-update', '\App\Http\Controllers\FilmController@update')->name('postFilmEdit');
    Route::post('/{id}/film-delete', '\App\Http\Controllers\FilmController@delete')->name('postFilmDelete');
});

Route::prefix('restaurants')->group(function () {
    Route::get('/', 'RestaurantController@index')->name('getRestaurantIndex');
    Route::get('/{id}/reservation', 'RestaurantController@details')->name('getRestaurantReservation');
    Route::post('/{id}/reservation', 'RestaurantController@makeReservation')->name('postRestaurantReservation');
    Route::get('/dashboard', 'RestaurantController@dashboard')->middleware(['auth'])->name('dashboard');

    Route::get('/restaurantsAdmin', '\App\Http\Controllers\RestaurantController@indexAdmin')->name('getRestaurantAdminIndex');
    Route::get('/restaurant-create', '\App\Http\Controllers\RestaurantController@create')->name('getRestaurantCreate');
    Route::get('/{id}/restaurant-edit', '\App\Http\Controllers\RestaurantController@edit')->name('getRestaurantEdit');
    Route::post('/restaurant-store', '\App\Http\Controllers\RestaurantController@store')->name('postRestaurantStore');
    Route::post('/{id}/restaurant-update', '\App\Http\Controllers\RestaurantController@update')->name('postRestaurantEdit');
    Route::post('/{id}/restaurant-delete', '\App\Http\Controllers\RestaurantController@delete')->name('postRestaurantDelete');
});
