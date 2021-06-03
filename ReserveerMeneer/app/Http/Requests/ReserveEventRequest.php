<?php

namespace App\Http\Requests;

use App\Models\Event\Event;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class ReserveEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'ticket_number' => 'required|gt:0',
            'start_date' => 'required',
            'days_count' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'Upload een png of jpeg bestand.',
            'ticket_number.gt' => 'Ticket aantal kan niet negatief zijn.'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $event = Event::find($this->id);
            $eventStartDate = new DateTime($event->start_date);
            $eventStartDate->setTime(0, 0);
            $eventEndDate = new DateTime($event->end_date);

            $reservationStartDate = new DateTime($this->start_date);
            $reservationEndDate = new DateTime($this->start_date);
            switch ($this->days_count)
            {
                case '2':
                    $reservationEndDate->modify('+1 day');
                    break;
                case '3':
                    $reservationEndDate = new DateTime($event->end_date);
                    $reservationEndDate->setTime(0, 0);
                default:
                    break;
            }
            if ($reservationStartDate < $eventStartDate) {
                $validator->errors()->add('field', 'Je reservering mag niet eerder beginnen dan het evenement begint.');
            }
            if ($reservationEndDate > $eventEndDate) {
                $validator->errors()->add('field', 'Je reservering mag niet langer duren dan het evenement.');
            }

            if ($this->ticket_number > $event->max_tickets)
            {
                $validator->errors()->add('field', 'Je kunt niet meer zo veel tickets kopen.');
            }
        });
    }
}
