@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 d-flex justify-content-center">
          @include('backend.partial.messages')
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>District Name</th>
                      <th>Division</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($districts as $district)
                      <tr>
                        <td class="py-1">#</td>
                        <td>{{ $district->name }}</td>
                        @foreach( App\Models\Division::orderBy('name', 'desc')->where('id', $district->division_id )->get() as $division )
                          <td>
                              {{ $division->name }}
                          </td>
                        @endforeach

                        <td>
                          <a href="{{ route('admin.district.edit',$district->id) }}" class="btn btn-success btn-xs">Edit</a>
                          <a href="#deleteModal{{$district->id}}" data-toggle="modal" class="btn btn-danger btn-xs">Delete</a>

                          <div class="modal fade" id="deleteModal{{$district->id}}" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete Category</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <div class="text-center">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4>Are you sure delete?</h4>
                                      </div>
                                      <div class="col-md-12">
                                        <form action="{{ route('admin.district.delete',$district->id) }}" method="post">
                                            {{csrf_field()}}
                                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
                                            <button  type="submit" class="btn btn-danger btn-xs">Confirmed</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
