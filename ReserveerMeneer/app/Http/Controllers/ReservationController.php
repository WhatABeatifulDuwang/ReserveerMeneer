<?php

namespace App\Http\Controllers;


use App\Models\Event\Reservation;
use Illuminate\Support\Facades\Response;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', [
            'reservations' => $reservations,
        ]);
    }

    function exportCsv()
    {
        $array = Reservation::all()->toArray();

        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("reservations.csv", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);

        return Response::download('reservations.csv');
    }

    function exportJson()
    {
        $array = Reservation::all()->toArray();

        if (count($array) == 0) {
            return null;
        }
        $json_data = json_encode($array);
        file_put_contents('reservations.json', $json_data);

        return Response::download('reservations.json');
    }
}
