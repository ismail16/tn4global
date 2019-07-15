<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\verifyRegistration;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }


  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user) {
    if ($user->status == 1) {
      if (Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)) {
        return redirect()->intended(route('index'));
      }else{
        session()->flash('sticky_error', 'Please Check Your Email and Password !!');
        return redirect()->route('login');
      }
    }else{
      if (!is_null($user)) {
        $user->notify(new verifyRegistration($user));
        session()->flash('success', 'A New confirmation email sent to you');
        return redirect('/');
      }else{
        session()->flash('success', 'A New confirmation email sent to you');
        return redirect()->route('login');
      }
    }
  }else {
    session()->flash('sticky_error', 'Email not found !Please Registration first !!');
    return redirect()->route('login');
  }

  }
}
