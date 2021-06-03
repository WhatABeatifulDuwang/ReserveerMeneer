<?php

namespace App\Http\Requests\Restaurant;


use App\Models\Restaurant\Restaurant;
use Illuminate\Foundation\Http\FormRequest;

class ReserveRestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "date" => "required|date|after_or_equal:today",
            "time" => 'required|date_format:H:i',
            "firstname" => 'required',
            "lastname" => 'required',
            "email" => 'required|email:rfc,dns',
            "address" => 'required',
            "postal_code" => 'required',
            "city" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.after_or_equal' => 'De datum van de reservering moet mag niet in het verleden zijn.',
            'email.email' => 'Er moet een valide emailadres ingevuld worden.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $unixtime = strtotime($this->time);
            $minutes = date("i", $unixtime);

            if (strcmp($minutes, "00") != 0 && strcmp($minutes, "30") != 0) {
                $validator->errors()->add('field', 'De tijd van een reservering kan alleen per half uur');
            }

            $restaurant = Restaurant::find($this->id);

            $day_of_week = date('w', strtotime($unixtime));

            $open = null;
            $close = null;

            switch ($day_of_week) {
                case 0:
                    $open = strtotime($restaurant->sunday_opening);
                    $close = strtotime($restaurant->sunday_closing);
                    break;
                case 1:
                    $open = strtotime($restaurant->monday_opening);
                    $close = strtotime($restaurant->monday_closing);
                    break;
                case 2:
                    $open = strtotime($restaurant->tuesday_opening);
                    $close = strtotime($restaurant->tuesday_closing);
                    break;
                case 3:
                    $open = strtotime($restaurant->wednesday_opening);
                    $close = strtotime($restaurant->wednesday_closing);
                    break;
                case 4:
                    $open = strtotime($restaurant->thursday_opening);
                    $close = strtotime($restaurant->thursday_closing);
                    break;
                case 5:
                    $open = strtotime($restaurant->friday_opening);
                    $close = strtotime($restaurant->friday_closing);
                    break;
                case 6:
                    $open = strtotime($restaurant->saturday_opening);
                    $close = strtotime($restaurant->saturday_closing);
                    break;
                default:
                    $open = strtotime("00:00");
                    $close = strtotime("00:00");
                    break;
            }

            if ($unixtime < $open) {
                $validator->errors()->add('field', 'Het restaurant opent pas om ' . date("H:i", $open) . ", dit ligt na het gekozen tijdstip.");
            }

            if ($unixtime > $close) {
                $validator->errors()->add('field', 'Het restaurant sluit om ' . date("H:i", $close) . ", dit is eerder dan het gekozen tijdstip.");
            }
        });
    }
}
