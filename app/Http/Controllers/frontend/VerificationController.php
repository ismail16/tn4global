<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!is_null($user)) {
          $user->status = 1;
          $user->remember_token = null;
          $user->save();
          session()->flash('success', 'You are registered successfully !! Login now');
          return redirect('login');
        }else{
          session()->flash('errors', 'Your token not match please try again latter! ');
          return redirect('/');
        }
    }
}
