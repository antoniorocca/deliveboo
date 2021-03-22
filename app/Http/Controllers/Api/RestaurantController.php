<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
class RestaurantController extends Controller
{
  public function index(){
    // $var = Restaurant::with('categories')->get();
    //dd($var);
    return response()->json([
      'response'=> Restaurant::with('dishes')->get()
      //'response'=> $var
    ]);
  }

}
