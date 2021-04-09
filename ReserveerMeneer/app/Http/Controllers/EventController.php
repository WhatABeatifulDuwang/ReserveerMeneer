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

        $startDate = new DateTime($request->start_date);
        $endDate = new DateTime($request->start_date);
        switch ($request->days_count)
        {
            case '2':
                $startDate->modify('+1 day');
                break;
            case '3':
                $endDate = new DateTime($event->end_date);
            default:
                break;
        }
        $interval = $startDate->diff($endDate);
        $days = 1 + $interval->format('%a');

        // Save the file locally in storage/public/reservation
        $request->file->store('reservation', 'public');

        // Save hash to db
        Reservation::create([
            'event_id' => $event->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'img_path' => $request->file->hashName(),
            'start_date' => $request->input('start_date'),
            'end_date' => $endDate,
            'ticket_number',
            'total_price' => $event->price*$days*$request->ticket_number,
        ]);

        return redirect()->route('getEventIndex');
    }
}
