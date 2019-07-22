<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\Division;
use App\Models\District;

use App\Notifications\verifyRegistration;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority', 'desc')->get();
        $districts = District::orderBy('id','asc')->get();
        return view('auth.register',compact('divisions','districts'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
          'first_name' => 'required',
          'email' => 'required|string|email|unique:users',
          'address' => 'required',
          'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function register(Request $request)
    {
        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->ip_address = request()->ip();
        $user->password = Hash::make($request->password);
        $user->remember_token = str_random(50);
        $user->status = 1;

        try {
            $user->save();
//            $user->notify(new verifyRegistration($user));
            session()->flash('success', 'Registration Successfully! Thank You');
            return back();
        }catch (\Exception $exception) {
//            dd();
            session()->flash('error', $exception->errorInfo[2]);
            return back();
        }
    }
}
