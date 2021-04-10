<?php

namespace App\Http\Controllers;


use App\Http\Requests\ReserveRestaurantRequest;
use App\Models\Restaurant\Restaurant;
use App\Models\Restaurant\RestaurantReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = null;
        $category = $request->category;

        if ($category == null or $category == "all") {
            $restaurants = Restaurant::all();

        } else {
            $restaurants = Restaurant::where("type", $category)->get();
        }

        $categories = Restaurant::select("type")->distinct()->get();
        return view('restaurant.index', ['restaurants' => $restaurants, "categories" => $categories]);
    }

    public function details($id)
    {
        $restaurant = Restaurant::find($id);

        if ($restaurant != null) {
            return view('restaurant.reservation', [
                'restaurant' => $restaurant,
                'id' => $id
            ]);
        }
        else {
            return redirect("/restaurants");
        }
    }

    public function makeReservation(ReserveRestaurantRequest $request, $id)
    {
        $unAvailableSeats = RestaurantReservation::where("date", "=", $request->date)->where("time", "=", $request->time)->count();
        $add_to_waiting_list = false;

        if ($unAvailableSeats >= 10) {
            $add_to_waiting_list = true;
        }

        RestaurantReservation::create([
            "restaurant_id" => $id,
            "date" => $request->date,
            "time" => $request->time,
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "address" => $request->address,
            "postal_code" => $request->postal_code,
            "city" => $request->city,
            "waiting_list" => $add_to_waiting_list,
        ]);

        if($add_to_waiting_list == true) {
            return redirect('/restaurants')->with('status', "Bedankt voor je reservering op " . $request->date . " om " . $request->time . ". Het is erg druk op dit moment, u staat op de wachtlijst.");
        }
        return redirect('/restaurants')->with('status', "Bedankt voor je reservering op " . $request->date . " om " . $request->time . "!");
    }
}
