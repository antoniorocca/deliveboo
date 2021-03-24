<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Restaurant;
class UserPageController extends Controller
{


  public function graphs(Request $request){

    $user_id = $request->user()->id;
    $restaurant_id = User::find($user_id)->restaurant->id;
    $orders = Order::all()->where('restaurant_id', $restaurant_id);
    
    foreach ($orders as $item) {
      $item->order = $item->order;
    }




    return view('users.graphs', compact('orders'));
  }
  public function profile(){
    return view('users.profile');
  }
}
