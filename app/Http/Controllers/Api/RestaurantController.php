<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
class RestaurantController extends Controller
{
  public function index(){
    return response()->json([
      'response'=> Restaurant::with('dishes','categories')->get()
    ]);
  }

}
