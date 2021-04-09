<?php

namespace App\Http\Controllers;

use App\Models\Event\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events =Event::all();

        return view('event.index', [
            'events' => $events
        ]);
    }

    public function details($id)
    {
        $event =Event::find($id);
        return view('event.details', ['event' => $event]);
    }
}
