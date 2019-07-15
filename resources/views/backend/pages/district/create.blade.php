@extends('backend.layouts.master')

@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 d-flex justify-content-center">
        @include('backend.partial.messages')
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">District</h4>
            <form class="forms-sample" method="post" action="{{ route('admin.district.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">District Name</label>
                <input type="text" name="district_name" class="form-control" id="exampleInputName1" placeholder="District Name">
              </div>
              <div class="form-group">
                 <label for="exampleFormControlSelect1">Parent Category</label>
                 <select class="form-control" name="division_id" id="exampleFormControlSelect1">
                   <option value="">Select Division</option>
                   @foreach($divisions as $division)
                      <option value="{{ $division->id }}">{{ $division->name }}</option>
                   @endforeach
                 </select>
               </div>
              <div class="float-right">
                <button class="btn btn-light mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Add Category</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
