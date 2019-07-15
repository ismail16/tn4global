<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Division;
use App\Models\District;

class DistrictController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    public function create()
    {
      $divisions =  Division::orderBy('id','asc')->get();
      return view('backend.pages.district.create', compact('divisions'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'district_name' => 'required',
        'division_id' => 'required',
      ],
      [
        'district_name.required' => 'Please Provide District Name',
        'division_id.required' => 'Please Select Any District',
      ]);

      $districts = new District;

      $districts->name = $request->district_name;
      $districts->division_id = $request->division_id;

      $districts->save();

      Session()->flash('success','District Saved Successfully !');
      return back();

    }

    public function manage()
    {
      $districts = District::orderBy('id','asc')->get();
      return view('backend.pages.district.manage', compact('districts'));
    }

    public function edit($id)
    {
      $district = District::find($id);
      $divisions =  Division::orderBy('id','asc')->get();

      if (!is_null($district)) {
        return view('backend.pages.district.edit', compact('district','divisions'));
      }
      else
      {
        return redirect()->route('admin.division.manage');
      }
    }

   public function update(Request $request, $id)
   {
     $this->validate($request,[
       'district_name' => 'required',
       'division_id' => 'required',
     ],
     [
       'district_name.required' => 'Please Provide District Name',
       'division_id.required' => 'Please Select Any District',
     ]);

     $districts = District::find($id);

     $districts->name = $request->district_name;
     $districts->division_id = $request->division_id;

     $districts->save();

     Session()->flash('success','Update District Information Successfully !');
     return back();
   }

   public function delete($id)
   {
     $district = District::find($id);
     $district->delete();

     session()->flash('success','Delete District Successfully !');
     return back();
   }
}
