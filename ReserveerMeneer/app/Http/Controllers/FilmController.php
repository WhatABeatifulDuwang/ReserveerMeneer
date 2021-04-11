<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveFilmRequest;
use App\Models\Cinema\Cinema;
use App\Models\Cinema\Film;
use App\Models\Cinema\FilmReservation;
use App\Models\Cinema\FilmSeat;
use App\Models\Cinema\Hall;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $films = Film::all();

        return view('film.index', [
            'films' => $films
        ]);
    }

    public function details($id)
    {
        $film = Film::find($id);
        $hall = Hall::find($film->hall_id);
        $cinema = Cinema::find($hall->cinema_id);

        if ($film == null) {
            return redirect()->route('getEventIndex');
        }

        return view('film.details', ['film' => $film, 'cinema' => $cinema]);
    }

    public function reservationDetails($id)
    {
        $film = Film::find($id);
        $seats = FilmSeat::where('film_id', $film->id)->get();
        $maxX = $seats->max('x');
        $maxY = $seats->max('y');

        if ($film == null) {
            return redirect()->route('getFilmIndex');
        }

        return view('film.reservation', [
            'film' => $film,
            'seats' => $seats,
            'maxX' => $maxX,
            'maxY' => $maxY,
            'id' => $id
        ]);
    }

    public function makeReservation(ReserveFilmRequest $request, $id)
    {
        FilmReservation::create([
            'film_id' => $id,
            'seat_id' => $request->input('seat_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
        ]);

        // reserve the selected seat
        $filmSeat = FilmSeat::find($request->input('seat_id'));
        $filmSeat->reserved = 1;
        $filmSeat->save();

        $x = $filmSeat->x;
        $y = $filmSeat->y;

        $leftSeat = FilmSeat::query()->where([
            ['film_id', '=', $id],
            ['x', '=', $x - 1],
            ['y', '=', $y]
        ])->first();
        if ($leftSeat) {
            $leftSeat->reserved = 1;
            $leftSeat->save();
        }

        $rightSeat = FilmSeat::query()->where([
            ['film_id', '=', $id],
            ['x', '=', $x + 1],
            ['y', '=', $y]
        ])->first();
        if ($rightSeat) {
            $rightSeat->reserved = 1;
            $rightSeat->save();
        }

        return redirect()->route('getFilmIndex');
    }
}
