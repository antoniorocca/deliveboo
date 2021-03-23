<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
class UserPageController extends Controller
{


  public function graphs(Request $request){
    $user_id = $request->user()->id;
    $restaurant_id = User::find($user_id)->restaurant->id;
    $orders = Order::where('restaurant_id', $restaurant_id);
    dd($orders);
    return view('users.graphs');
  }
  public function profile(){
    return view('users.profile');
  }
}
