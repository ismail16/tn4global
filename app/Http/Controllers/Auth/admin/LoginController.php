<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\verifyRegistration;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{


  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/admin';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  // public function __construct()
  // {
  //   $this->middleware('guest')->except('logout');
  // }

  public function showLoginForm()
  {
      return view('auth.admin.login');
  }


  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string',
    ]);

    if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)) {
      return redirect()->intended(route('admin.index'));
    }else{
      session()->flash('sticky_error', 'Please Check Your Email and Password !!');
      return redirect()->route('admin.login');
    }

  }

  public function logout(Request $request)
  {
      $this->guard()->logout();
      $request->session()->invalidate();
      return redirect()->route('admin.login');
  }
}
