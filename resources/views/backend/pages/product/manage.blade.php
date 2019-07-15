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
                <table class="table table-striped" id='table_id'>
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $count = 1;
                    @endphp
                    @foreach($products as $product)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                          <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-success btn-xs">Edit</a>
                          <a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger btn-xs">Delete</a>

                          <div class="modal fade" id="deleteModal{{$product->id}}" role="dialog">
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
                                        <h4>Are you sure delete {{ $product->title }} ?</h4>
                                      </div>
                                      <div class="col-md-12">
                                        <form action="{{ route('admin.product.delete',$product->id) }}" method="post">
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
