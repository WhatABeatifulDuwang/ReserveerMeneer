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

    public function indexAdmin()
    {
        $restaurants = Restaurant::all();

        return view('restaurantAdmin.index', [
            'restaurants' => $restaurants
        ]);
    }

    public function create()
    {
        return view('restaurantAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'max_tickets' => 'required'
        ]);

        Restaurant::create($request->all());

        return redirect()->route('getRestaurantAdminIndex')->with('success', 'Het restaurant is succesvol aangemaakt!');
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

    public function edit($id)
    {
        $restaurant = Event::find($id);
        return view('restaurantAdmin.edit', ['restaurant' => $restaurant]);
    }

    public function update($id, Request $request)
    {
        $restaurant = Restaurant::find($id);
        $request->validate([
            "name" => 'required',
            "type" => 'required',
            "monday_opening_time" => 'required',
            "monday_closing_time" => 'required',
            "tuesday_opening_time" => 'required',
            "tuesday_closing_time" => 'required',
            "wednesday_opening_time" => 'required',
            "wednesday_closing_time" => 'required',
            "thursday_opening_time" => 'required',
            "thursday_closing_time" => 'required',
            "friday_opening_time" => 'required',
            "friday_closing_time" => 'required',
            "saturday_opening_time" => 'required',
            "saturday_closing_time" => 'required',
            "sunday_opening_time" => 'required',
            "sunday_closing_time" => 'required',
            "amount_of_seats" => 'required',
        ]);

        $restaurant->update($request->all());

        return redirect()->route('getRestaurantAdminIndex')->with('success', 'Het restaurant is succesvol bijgewerkt!');
    }

    public function makeReservation(ReserveRestaurantRequest $request, $id)
    {
        $count = RestaurantReservation::where("date", "=", $request->date)->where("time", "=", $request->time)->count();
        $add_to_waiting_list = false;

        if ($count >= 10) {
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

    public function dashboard(Request $request)
    {
        $date = date("Y-m-d");
        $restaurant = null;

        if ($request->restaurant != null) {
            $restaurant = Restaurant::find($request->restaurant);
            if ($restaurant == null) {
                return redirect('/dashboard')->with('status', "Het gekozen restaurant bestaat niet!");
            }
        } else {
            $restaurant = Restaurant::first();
        }

        if ($request->date != null) {
            $date = $request->date;
        }

        $restaurants = Restaurant::all();

        $reservations = RestaurantReservation::where("restaurant_id", "=", $restaurant->id)->where("date", "=", $date)->get();

        return view('restaurant.dashboard', ["restaurants" => $restaurants, "reservations" => $reservations, "restaurant" => $restaurant, "date" => $date]);
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('getRestaurantAdminIndex')->with('success', 'Het restaurant is succesvol verwijderd!');
    }
}
