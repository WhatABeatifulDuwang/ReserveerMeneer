<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveEventRequest;
use App\Models\Event\Event;
use App\Models\Event\Reservation;
use DateTime;
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

    public function reservationDetails($id)
    {
        $event =Event::find($id);
        return view('event.reservation', [
            'event' => $event,
            'id' => $id
        ]);
    }

    public function makeReservation(ReserveEventRequest $request, $id)
    {
        $event =Event::find($id);

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
        $reservation = Reservation::find($id);
        return view('event.confirmation', [
            'reservation' => $reservation,
            'id' => $id
        ]);
    }
}
