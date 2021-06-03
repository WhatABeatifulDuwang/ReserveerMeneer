<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantRequest;
use App\Models\Restaurant\Restaurant;
use App\Models\Restaurant\RestaurantReservation;
use App\Http\Requests\Restaurant\ReserveRestaurantRequest;
use Illuminate\Http\Request;

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

        return view('restaurant.index')
            ->with('restaurants', $restaurants)
            ->with("categories", $categories);
    }

    public function indexAdmin()
    {
        $restaurants = Restaurant::all();

        return view('restaurantAdmin.index')
            ->with('restaurants', $restaurants);
    }

    public function create()
    {
        return view('restaurantAdmin.create');
    }

    public function store(RestaurantRequest $request)
    {
        $restaurant = new Restaurant();

        $restaurant = $this->setRestaurant($restaurant, $request);

        $restaurant->save();

        return redirect()->route('getRestaurantAdminIndex')->with('success', 'Het restaurant is succesvol aangemaakt!');
    }

    public function details($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant != null) {
            return view('restaurant.reservation')
                ->with('restaurant', $restaurant)
                ->with('id', $id);
        }
        else {
            return redirect("/restaurants");
        }
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return view('restaurantAdmin.edit')
            ->with('restaurant', $restaurant);
    }

    public function update($id, RestaurantRequest $request)
    {
        $restaurant = Restaurant::findOrFail($id);

        $restaurant = $this->setRestaurant($restaurant, $request);

        $restaurant->save();

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
            "date" => $request->input('date'),
            "time" => $request->input('time'),
            "firstname" => $request->input('firstname'),
            "lastname" => $request->input('lastname'),
            "email" => $request->input('email'),
            "address" => $request->input('address'),
            "postal_code" => $request->input('postal_code'),
            "city" => $request->input('city'),
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
            $restaurant = Restaurant::findOrFail($request->restaurant);
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

        return view('restaurant.dashboard')
            ->with("restaurants", $restaurants)
            ->with("reservations", $reservations)
            ->with("restaurant", $restaurant)
            ->with("date", $date);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $restaurant->delete();

        return redirect()->route('getRestaurantAdminIndex')
            ->with('success', 'Het restaurant is succesvol verwijderd!');
    }

    public function setRestaurant(Restaurant $restaurant, RestaurantRequest $request)
    {
        $restaurant->name = $request->input('name');
        $restaurant->type = $request->input('type');
        $restaurant->monday_opening = $request->input('monday_opening');
        $restaurant->monday_closing = $request->input('monday_closing');
        $restaurant->tuesday_opening = $request->input('tuesday_opening');
        $restaurant->tuesday_closing = $request->input('tuesday_closing');
        $restaurant->wednesday_opening = $request->input('wednesday_opening');
        $restaurant->wednesday_closing = $request->input('wednesday_closing');
        $restaurant->thursday_opening = $request->input('thursday_opening');
        $restaurant->thursday_closing = $request->input('thursday_closing');
        $restaurant->friday_opening = $request->input('friday_opening');
        $restaurant->friday_closing = $request->input('friday_closing');
        $restaurant->saturday_opening = $request->input('saturday_opening');
        $restaurant->saturday_closing = $request->input('saturday_closing');
        $restaurant->sunday_opening = $request->input('sunday_opening');
        $restaurant->sunday_closing = $request->input('sunday_closing');
        $restaurant->amount_of_seats = $request->input('amount_of_seats');

        return $restaurant;
    }
}
