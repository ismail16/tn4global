<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function manage()
  {
    $divisions = Division::orderBy('priority', 'desc')->get();
    return view('backend.pages.division.manage', compact('divisions'));
  }

  public function create()
  {
    return view('backend.pages.division.create');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'division_name' => 'required',
      'division_priority' => 'required',
    ],
    [
      'division_name.required' => 'please provide a division name',
      'division_priority.required' =>'please provide a division priority',
    ]);

    $division = new Division;
    $division->name = $request->division_name;
    $division->priority = $request->division_priority;
    $division->save();

    session()->flash('success', 'Division saved Successfully !');
    return back();
  }

  public function edit($id)
  {
    $division = Division::find($id);
    if (!is_null($division)) {
      return view('backend.pages.division.edit', compact('division'));
    }
    else
    {
      return redirect()->route('admin.division.manage');
    }
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'division_name' => 'required',
      'division_priority' => 'required',
    ],
    [
      'division_name.required' => 'please provide a division name',
      'division_priority.required' =>'please provide a division priority',
    ]);

    $division =  Division::find($id);
    $division->name = $request->division_name;
    $division->priority = $request->division_priority;
    $division->save();

    session()->flash('success', 'Update Division Successfully !');
    return back();
  }

  public function delete($id)
  {
    $division = Division::find($id);
    $division->delete();

    session()->flash('success','Delete Division Successfully !');
    return back();
  }
}
