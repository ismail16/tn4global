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
            <h4 class="card-title">Division</h4>
            <form class="forms-sample" method="post" action="{{ route('admin.division.update',$division->id) }}">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Divition Name</label>
                <input type="text" name="division_name" value="{{ $division->name }}" class="form-control" id="exampleInputName1" placeholder="Category Name">
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Divition Priority</label>
                <input type="number" name="division_priority" value="{{ $division->priority }}" class="form-control" id="exampleInputName1">
              </div>

              <div class="float-right">
                <button class="btn btn-light mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Update Divition</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
