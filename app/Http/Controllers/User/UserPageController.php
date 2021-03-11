<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPageController extends Controller
{


  public function graphs(){
    return view('users.graphs');
  }
  public function profile(){
    return view('users.profile');
  }
}
