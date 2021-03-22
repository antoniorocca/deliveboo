<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function show(Restaurant $restaurant)
    {
        return view('guests.restaurant', compact('restaurant'));
    }
}
