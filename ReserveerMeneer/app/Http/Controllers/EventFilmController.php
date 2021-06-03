<?php

namespace App\Http\Controllers;


use App\Models\Cinema\Cinema;
use App\Models\Cinema\Film;
use App\Models\Cinema\Hall;
use App\Models\Event\Event;
use Illuminate\Http\Request;

class EventFilmController extends Controller
{
    public function index(Request $request)
    {
        $eventsAndFilms = $this->getEventsAndFilms($request);

        $name = array_column($eventsAndFilms, 'name');
        $start_time = array_column($eventsAndFilms, 'start_date');

        if ($request->start_time_sort) {
            array_multisort($start_time, SORT_ASC, $eventsAndFilms);
        } else {
            array_multisort($name, SORT_ASC, $eventsAndFilms);
        }

        return view('EventsAndFilms.index')
            ->with('eventsAndFilms', $eventsAndFilms);
    }

    public function getEventsAndFilms(Request $request)
    {
        $films = Film::all();
        $filmArray = $films->toArray();
        $newFilmArray = array();

        foreach ($filmArray as $film) {
            $film['name'] = decrypt($film['name']);
            $film['description'] = decrypt($film['description']);

            $hall = Hall::find($film['hall_id']);
            $cinema = Cinema::find($hall->cinema_id);
            $film['cinema_name'] = $cinema->name;
            $film['city'] = $cinema->city;

            array_push($newFilmArray, $film);
        }

        $events = Event::all();
        $EventArray = $events->toArray();
        $newEventArray = array();

        foreach ($EventArray as $event) {
            $event['name'] = decrypt($event['name']);
            $event['description'] = decrypt($event['description']);
            $event['address'] = decrypt($event['address']);
            $event['city'] = decrypt($event['city']);

            array_push($newEventArray, $event);
        }

        $eventsAndFilms = array_merge($newEventArray, $newFilmArray);

        if ($request->location) {
            $filterBy = $request->location;
            $eventsAndFilms = array_filter($eventsAndFilms, function ($var) use ($filterBy) {
                return str_contains(strtolower($var['city']), strtolower($filterBy));
            });
        }
        if ($request->start_time) {
            $filterBy = $request->start_time;
            $eventsAndFilms = array_filter($eventsAndFilms, function ($var) use ($filterBy) {
                return ($var['start_date'] > $filterBy);
            });
        }
        if ($request->end_time) {
            $filterBy = $request->end_time;
            $eventsAndFilms = array_filter($eventsAndFilms, function ($var) use ($filterBy) {
                return ($var['end_date'] < $filterBy);
            });
        }

        return $eventsAndFilms;
    }

}
