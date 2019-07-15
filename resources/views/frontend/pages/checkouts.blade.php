@extends('frontend.layouts.master')

@section('content')
<div class='container margin-top-20 mb-3'>
	<!-- <div class="card col-lg-12 col-12 mt-2 md-mt-40 sm-mt-40">
		<div id="accordion" class="checkout_accordion mt--30" role="tablist">
			<div class="payment">
				<div class="che__header" role="tab" id="headingOne">
					<a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span>Direct Bank Transfer</span>
					</a>
				</div>
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
				</div>
			</div>
			<div class="payment mb-1">
				<div class="che__header" role="tab" id="headingTwo">
					<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						<span>Your order</span>
					</a>
				</div>
				<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="payment-body">
						<div class="wn__order__box">
							<ul class="order__total">
								<li>Product</li>
								<li>Total</li>
							</ul>
							<ul class="order_product" style="height:100px; overflow:auto; background-color: #fdfbfb;">
								@foreach (App\Models\Cart::totalCarts() as $cart)
								<li style=""> {{ $cart->product->title }} × {{ $cart->product_quantity }}<span>{{ $cart->product->price*$cart->product_quantity }}-tk</span></li>
								@endforeach
							</ul>
							<ul class="shipping__method">
								<?php $totaPrice = 0; ?>
								@foreach (App\Models\Cart::totalCarts() as $cart)
									@php
										$totaPrice += $cart->product->price * $cart->product_quantity;
									@endphp
								@endforeach
								<li>Cart Subtotal <span>{{ $totaPrice }}-tk</span></li>
								<li>Shipping <span>$48.00-tk</span></li>
								<li>
									<input type="text" name="" value="" placeholder="Enter Cropon"class="form-control">
									<span>
										<button type="button" name="button" class="btn btn-primary">Apply Code</button>
									</span>
								</li>
							</ul>
							<ul class="total__amount">
								<li>Order Total <span>{{ $totaPrice + 48 }}-tk</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="card col-lg-12 col-12 mt-2 md-mt-40 sm-mt-40">
		<h5 class="mt-3">Shipping Address</h5>
		<form method="POST" action="{{ route('checkouts.store') }}">
			@csrf
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="form-group">
						<label for="name">Reciever Name</label>
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>
						@if ($errors->has('name'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="email">E-Mail Address</label>
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
						@if ($errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="phone_no">Phone No</label>
						<input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>
						@if ($errors->has('phone_no'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('phone_no') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="shipping_address">Shipping Address (*)</label>
						<textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>
						@if ($errors->has('shipping_address'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('shipping_address') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="message">Additional Message (optional)</label>
						<textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>
						@if ($errors->has('message'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('message') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<h5>Your order</h5>
					<div class="wn__order__box">
						<ul class="order__total">
							<li>Product</li>
							<li>Total</li>
						</ul>
						<ul class="order_product" style="height:100px; overflow:auto; background-color: #fdfbfb;">
							@foreach (App\Models\Cart::totalCarts() as $cart)
							<li style=""> {{ $cart->product->title }} × {{ $cart->product_quantity }}<span>{{ $cart->product->price*$cart->product_quantity }}-tk</span></li>
							<input type="hidden" name="product_quantity[]" value="{{ $cart->product_quantity }}">
							<input type="hidden" name="order_products[]" value="{{ $cart->product->id }}">
							@endforeach
						</ul>
						<ul class="shipping__method">
							<?php $totaPrice = 0; ?>
							@foreach (App\Models\Cart::totalCarts() as $cart)
								@php
									$totaPrice += $cart->product->price * $cart->product_quantity;
								@endphp
							@endforeach
							<li>Cart Subtotal <span>{{ $totaPrice }}-tk</span></li>
							<li>Shipping <span>$48.00-tk</span></li>
							<li>
								<input type="text" name="" value="" placeholder="Enter Cropon"class="form-control mr-1">
								<span>
									<button type="button" class="btn btn-primary">Apply Code</button>
								</span>
							</li>
						</ul>
						<ul class="total__amount">
							<li>Order Total <span>{{ $totaPrice + 48 }}-tk</span></li>
						</ul>
					</div>


					<div class="form-group mt-2">
						<h5>Select a payment method</h5>
						<!-- <label for="payment_method">Select a payment method</label> -->
						<!-- <div class="che__header mb-2">
							<a class="collapsed checkout__title">
								<span>PayPal <img src="{{ asset('public/frontend_assets/images/icons/payment.png') }}" alt="payment images"> </span>
							</a>
						</div> -->
						<div class="_col-md-6">
							<select class="form-control" name="payment_method_id" required id="payments">
								<option value="cash_in">Select a payment method please</option>
								@foreach($payments as $payment)
								<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
								@endforeach
							</select>

							@foreach($payments as $payment)
							@if($payment->short_name == "cash_in")
							<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center">
								<h3>
									For Cash in there is nothing necessary. Just click Finish Order.
									<br>
									<small>
										You will get your product in two or three business days.
									</small>
								</h3>
							</div>
							@else
							<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden"
								<h3>Payment</h3>
								<p>
									<strong>{{ $payment->name }}</strong>
									<br>
									<strong>Account Type: {{$payment->type}}</strong>
								</p>
								<div class="alert alert-success">
									Please send the above money to this Bkash No and write your transaction code below there..
								</div>
							</div>
							@endif
							@endforeach
							<input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-12 col-12 d-flex flex-row-reverse">
							<button type="submit" class="btn btn-primary">Order Now</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
$("#payments").change(function(){
	$payment_method = $("#payments").val();

	if ($payment_method == "cash_in") {
		console.log('cash_in');
		$("#payment_cash_in").removeClass('hidden');
		$("#payment_bkash").addClass('hidden');
		$("#payment_rocket").addClass('hidden');
		$("#transaction_id").addClass('hidden')
	}else if ($payment_method == "bkash") {
		console.log('bkash');
		$("#payment_bkash").removeClass('hidden');
		$("#payment_cash_in").addClass('hidden');
		$("#payment_rocket").addClass('hidden');
		$("#transaction_id").removeClass('hidden');
	}else if ($payment_method == "rocket") {
		console.log('rocket');
		$("#payment_rocket").removeClass('hidden');
		$("#payment_bkash").addClass('hidden');
		$("#payment_cash_in").addClass('hidden');
		$("#transaction_id").removeClass('hidden');
	}
})
</script>
@endsection
