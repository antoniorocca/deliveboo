<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
class DishController extends Controller
{
  public function index(){
    return response()->json([
      'response'=> Dish::all()
    ]);
  }
}
