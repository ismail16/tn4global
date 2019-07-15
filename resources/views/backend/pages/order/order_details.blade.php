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
                      <img src="{{ asset('public/frontend_assets/images/logo/logo.png')}}">
                    </div>

                    <div class="col-md-6 text-right">
                      <p class="font-weight-bold mb-1">Invoice #{{ $order->id }}</p>
                      <p class="text-muted">{{ $order->created_at }}</p>
                    </div>
                  </div>

                  <hr class="my-1">

                  <div class="row pl-5 pr-5 pt-3 pb-1">
                    <div class="col-md-6">
                      <p class="font-weight-bold mb-0">Client Information</p>
                      <p class="mb-0">{{ $order->name }}</p>
                      <p class="mb-0">{{ $order->phone_no }}</p>
                      <p class="mb-0">{{ $order->shipping_address }}</p>
                    </div>

                    <div class="col-md-6 text-right">
                      <p class="font-weight-bold mb-0">Payment Details</p>
                      <p class="mb-0"><span class="text-muted">VAT: </span> 1425782</p>
                      <!-- <p class="mb-0"><span class="text-muted">VAT ID: </span> 10253642</p> -->
                      <p class="mb-0"><span class="text-muted">Payment Type: </span> ---- </p>
                      <!-- <p class="mb-0"><span class="text-muted">Name: </span> John Doe</p> -->
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
                          <?php $total = 0; ?>

                          @foreach(App\Models\Order_detail::Where('order_id', $order->id)->get() as $order_details)
                          @foreach(App\Models\Product::Where('id', $order_details->product_id)->get() as $product)
                          <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $order_details->product_quantity }}</td>
                            <td>{{ $product->price }} tk</td>
                            <td>{{ $order_details->product_quantity * $product->price }} tk</td>
                          </tr>
                          <?php
                           $total += $order_details->product_quantity * $product->price
                          ?>
                          @endforeach
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="d-flex flex-row-reverse bg-dark text-white pl-5 pr-5 pt-1 pb-0">
                    <div class="py-3 px-5 text-right">
                      <div class="mb-0">Grand Total</div>
                      <div class="h2 font-weight-light">{{ $total }} tk</div>
                    </div>

                    <!-- <div class="py-3 px-5 text-right">
                      <div class="mb-0">Discount</div>
                      <div class="h2 font-weight-light">0%</div>
                    </div> -->

                    <!-- <div class="py-3 px-5 text-right">
                      <div class="mb-0">Sub - Total amount</div>
                      <div class="h2 font-weight-light">$32,432</div>
                    </div> -->
                  </div>

                  <div class="buttun-group d-flex flex-row-reverse">
                     <a class="btn btn-danger m-2" href="{{ route('admin.orders.manage') }}">Cancel</a>
                     <form class="" action="{{ route('admin.orders.seen_by_admin',$order->id) }}" method="post">
                       @csrf
                       <input hidden type="text" name="seen_by_admin" value="1">
                       <button type="submit" name="button" class="btn btn-primary m-2">Confirmed</button>
                     </form>
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
