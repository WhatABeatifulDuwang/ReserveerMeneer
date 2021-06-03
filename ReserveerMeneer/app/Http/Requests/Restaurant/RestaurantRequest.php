<?php


namespace App\Http\Requests\Restaurant;


use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => 'required|string',
            "type" => 'required|string',
            "monday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "monday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:monday_opening',
            ],
            "tuesday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "tuesday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:tuesday_opening',
            ],
            "wednesday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "wednesday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:wednesday_opening',
            ],
            "thursday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "thursday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:thursday_opening',
            ],
            "friday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "friday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:friday_opening',
            ],
            "saturday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "saturday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:saturday_opening',
            ],
            "sunday_opening" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
            ],
            "sunday_closing" => [
                'required',
                'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/',
                'after:sunday_opening',
            ],
            "amount_of_seats" => 'required|integer',
        ];
    }
}
