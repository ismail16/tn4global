@extends('backend.layouts.master')

@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 d-flex justify-content-center">
        @include('backend.partial.messages')
      </div>
      <div class="col-md-10 grid-margin stretch-card">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-0">
                  <div class="row pl-5 pr-5 pt-3 pb-1">
                    <div class="col-md-6">
                      <img src="{{ asset('public/images/logos/TN4-Logo.png')}}" width="160">
                    </div>

                    <div class="col-md-6 text-right">
                      <p class="font-weight-bold mb-1">Invoice #{{ $order->id }}</p>
                      <p class="text-muted">{{ $order->created_at->format('d M Y') }}</p>
                    </div>
                  </div>

                  <hr class="my-1">
{{--                  {{$order}}--}}

                  <div class="row pl-5 pr-5 pt-3 pb-1">
                    <div class="col-md-6">
                      <p class="font-weight-bold mb-0">Client Information</p>
                      <p class="mb-0"><span class="text-muted">Name: </span>{{ $order->name }}</p>
                      <p class="mb-0"><span class="text-muted">Phone: </span>{{ $order->phone }}</p>
                      <p class="mb-0"><span class="text-muted">Address: </span>{{ $order->address }}</p>
                    </div>

                    <div class="col-md-6 text-right">
                      <p class="font-weight-bold mb-0">Payment Details</p>
                      <p class="mb-0"><span class="text-muted">Order Type: </span>Bulk Order</p>
                    </div>
                  </div>

                  <div class="row pl-5 pr-5 pt-3 pb-1">
                    <div class="col-md-12">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="border-0 text-uppercase small font-weight-bold">Title</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $product = App\Models\BulkProduct::Where('id', $order->bulk_products_id)->first();
                          ?>
                          <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }} tk</td>
                            <td>{{ $product->quantity * $product->price }} tk</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="d-flex flex-row-reverse bg-dark text-white pl-5 pr-5 pt-1 pb-0">
                    <div class="py-3 px-5 text-right">
                      <div class="mb-0">Grand Total</div>
                      <div class="h2 font-weight-light"> {{ $product->quantity * $product->price }} tk</div>
                    </div>
                  </div>

                  <div class="buttun-group d-flex flex-row-reverse">
                     <a class="btn btn-danger m-2" href="{{ route('admin.orders.manage') }}">Cancel</a>
                    <a href="{{ route('admin.bukl_orders.seen_by_admin',$order->id) }}" name="button" class="btn btn-primary m-2">Confirmed</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="#">Books house</a></div>
        </div>
      </div>
    </div>
  </div>
  @endsection
