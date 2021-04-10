<?php

namespace App\Http\Controllers;


use App\Models\Restaurant\Restaurant;
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
        return view('restaurant.index', ['restaurants' => $restaurants, "categories" => $categories]);
    }
}
