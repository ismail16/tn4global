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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Phipping Address</th>
                    <th>Email</th>
                    <th>Order Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $count = 1;
                  @endphp
                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone_no }}</td>
                    <td>{{ $order->shipping_address }}</td>
                    <td>{{ $order->email }}</td>
                    <td>
                      @if($order->is_seen_by_admin == 1)
                      Confirmed
                      @else
                      Pending
                      @endif

                    </td>
                    <td>
                      <!-- <a href="{{ route('admin.product.edit',$order->id) }}" class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a> -->
                      <a href="{{ route('admin.orders.details',$order->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                      <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteModal{{$order->id}}" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Order</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              <div class="text-center">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Are you sure delete {{ $order->title }} ?</h4>
                                  </div>
                                  <div class="col-md-12">
                                    <form action="{{ route('admin.orders.delete',$order->id) }}" method="post">
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
