<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Division;
use App\Models\District;
use File;

class UsersController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function dashboard()
  {
    $user = Auth::user();
    return view('frontend.pages.users.dashboard', compact('user'));
  }


  public function profile()
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    $districts = District::orderBy('name', 'asc')->get();

    $user = Auth::user();
    return view('frontend.pages.users.profile', compact('user', 'divisions', 'districts'));
  }
  public function profileUpdate(Request $request)
  {
    $user = Auth::user();

    $this->validate($request, [
      'first_name' => 'required|string|max:30',
      'last_name' => 'nullable|string|max:15',
      'username' => 'required|alpha_dash|max:100|unique:users,username,'.$user->id,
      'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
      'division_id' => 'required|numeric',
      'district_id' => 'required|numeric',
      'phone_no' => 'required|max:15|unique:users,phone_no,'.$user->id,
      'street_address' => 'required|max:100',
    ]);

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->division_id = $request->division_id;
    $user->district_id = $request->district_id;
    $user->phone_no = $request->phone_no;
    $user->street_address = $request->street_address;
    $user->shipping_address = $request->shipping_address;

    if ($request->password != NULL || $request->password != "") {
      $user->password = Hash::make($request->password);
    }
    $user->ip_address = request()->ip();

     $image = $request->file('profile_image');
     if ($image) {
         if(File::exists('images/users/'.$request->profile_image_old))
         {
             File::delete('images/users/'.$request->profile_image_old);
         }
         $ext = strtolower($image->getClientOriginalExtension());
         $image_full_name = str_slug($user->first_name).'-'.$user->id. '.' . $ext;
         $upload_path = 'images/users/';
         $image_url = $upload_path . $image_full_name;
         $success = $image->move($upload_path, $image_full_name);
         if ($success) {
             $user->avatar = $image_full_name;
         }
     }else{
        $user->avatar = 'null';
     }
    $user->save();
    session()->flash('success', 'User profile has updated successfuly !!');
    return back();
  }
}
