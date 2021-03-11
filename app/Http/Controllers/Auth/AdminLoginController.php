<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm(){
      return view('auth.admin_login');
    }
    public function login(Request $request){


      $this->validate($request, [
        'email' => 'required | email',
        'password' => 'required ',
      ]);
      if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)) {
        return redirect()->intended(route('admin'));
      }
      return redirect()->back()->whithInput($request->only('email'));


    }
}
