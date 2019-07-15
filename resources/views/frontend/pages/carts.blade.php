@extends('frontend.layouts.master')

@section('content')
<div class="container">
	@if (App\Models\Cart::totalItems() > 0)
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<!-- <th style="width:1%">No.</th> -->
				<th style="width:49%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:15%">Quantity</th>
				<th style="width:15%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			<?php $total = 0; ?>
			@foreach(App\Models\Cart::totalCarts() as $cart)
			<tr>
				<!-- <td>{{ $loop->index+1 }}</td> -->
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src="{{ asset('public/images/product_image/'.$cart->product->images->first()->image) }}" alt="..." class="img-responsive"/></div>
						<div class="col-sm-10">
							<a href="{{ route('single_product',$cart->product->id) }}">{{ $cart->product->title }}</a>

						</div>
					</div>
				</td>
				<td data-th="Price">{{ $cart->product->price }}</td>
				<td data-th="Quantity">
					<div class="input-group">
						<form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
							@csrf
							<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
							<!-- <div class="input-group-append"> -->
							<button class="btn btn-info btn-md ml-2"><i class="fa fa-refresh"></i></button>
							<!-- </div> -->
						</form>
					</div>
				</td>
				<td data-th="Subtotal" class="text-center">{{ $cart->product->price*$cart->product_quantity }}</td>
				<td class="actions" data-th="">
					<form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
						@csrf
						<button class="btn btn-danger btn-md"><i class="fa fa-trash-o"></i></button>
					</form>
				</td>
			</tr>
			<?php
			$total +=$cart->product->price*$cart->product_quantity;

			?>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td><a href="{{ route('products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>Total {{ $total }}</strong></td>
				<td><a href="{{ route('checkout') }}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>
	@else
	<div class="alert alert-warning mt-3">
		<div class="d-flex justify-content-center pt-5">
			<h3>There is no item in your cart.</h3>
		</div>
		<div class="d-flex justify-content-center pb-5">
			<a href="{{ route('products') }}" class="btn btn-info btn-md">Continue Shopping....</a>
		</div>
	</div>
	@endif
</div>

<style media="screen">
.table>tbody>tr>td, .table>tfoot>tr>td{
	vertical-align: middle;
}
@media screen and (max-width: 600px) {
	table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}

	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}

	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}



	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}

}
</style>
@endsection
