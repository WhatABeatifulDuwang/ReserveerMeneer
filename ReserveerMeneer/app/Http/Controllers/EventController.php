<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\ReserveEventRequest;
use App\Models\Event\Event;
use App\Models\Event\Reservation;
use DateTime;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('event.index')
            ->with('events', $events);
    }

    public function indexAdmin()
    {
        $events = Event::all();

        return view('eventAdmin.index')
            ->with('events', $events);
    }

    public function create()
    {
        return view('eventAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'price' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'max_tickets' => 'required|integer'
        ]);

        Event::create($request->all());

        return redirect()->route('getEventAdminIndex')->with('success', 'Het evenement is succesvol aangemaakt!');
    }

    public function details($id)
    {
        $event = Event::findOrFail($id);

        return view('event.details')
            ->with('event', $event);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('eventAdmin.edit')
            ->with('event', $event);
    }

    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->address = $request->input('address');
        $event->city = $request->input('city');
        $event->price = $request->input('price');
        $event->max_tickets = $request->input('max_tickets');

        if($request->start_date != null || $request->end_date != null)
        {
            $event->start_date = $request->input('start_date');
            $event->end_date = $request->input('end_date');
        }

        $event->save();

        return redirect()->route('getEventIndex');
    }

    public function reservationDetails($id)
    {
        $event = Event::findOrFail($id);

        return view('event.reservation')
            ->with('event', $event)
            ->with('id', $id);
    }

    public function makeReservation(ReserveEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $startDateTime = new DateTime($request->start_date);
        $endDateTime = new DateTime($request->start_date);
        switch ($request->days_count)
        {
            case '2':
                $endDateTime->modify('+1 day');
                break;
            case '3':
                $endDateTime = new DateTime($event->end_date);
            default:
                break;
        }
        $interval = $startDateTime->diff($endDateTime);
        $days = 1 + $interval->format('%a');

        $request->file->store('reservation', 'public');

        $reservation = Reservation::create([
            'event_id' => $event->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'img_path' => $request->file->hashName(),
            'start_date' => $request->input('start_date'),
            'end_date' => $endDateTime,
            'ticket_number' => $request->input('ticket_number'),
            'total_price' => $event->price*$days*$request->ticket_number,
        ]);

        return redirect()->route('getEventConfirmation', $reservation->id);
    }

    public function getConfirmation($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('event.confirmation')
            ->with('reservation', $reservation)
            ->with('id', $id);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('getEventAdminIndex')->with('success', 'Het evenement is succesvol verwijderd!');
    }
}
