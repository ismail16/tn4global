@extends('frontend.layouts.master')

@section('content')
<div class="maincontent bg--white pt--80 pb--55">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="wn__single__product">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="wn__fotorama__wrapper">
								@php
									$images = \App\Models\BulkProductImage::where('product_id',$product->id)->get();
								@endphp
								<div class="exzoom hidden" id="exzoom">
									<div class="exzoom_img_box">
										<ul class='exzoom_img_ul'>
											@foreach($images as $image)
												<li><img src="{{ asset('images/bulk_product_image/'.$image->image) }}" alt=""></li>
											@endforeach
										</ul>
									</div>
									<div class="exzoom_nav">
									</div>
									<p class="exzoom_btn">
										<a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
										<a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="product__info__main">
								<div class="price-box">
									<span>Title: {{ $product->title }}</span>
								</div>
								<div class="">
									<span>Price: {{ $product->price }}Tk (Per-quantity)</span>
								</div>
								<div class="product_meta">
									<span class="posted_in">
										Category: {{ $product->category_id }}
									</span>
								</div>
								<div class="product_meta">
									<span class="posted_in">
										Brand: {{ $product->brand_id }}
									</span>
								</div>
								<div class="box-tocart d-flex">
									<span>Quantity</span>
									<input id="qty" class="input-text qty" value="{{ $product->quantity }}" title="Qty" type="number">
								</div>

								<div class="product_meta">
									Details:
									<span class="posted_in">
										<p>{{ $product->description }}</p>
									</span>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-form-wrap">
					<h2 class="contact__title">Submit Bulk Order</h2>
					<form action="{{ route('bulk_order_submit') }}" method="post">
						@csrf
						<input type="text" name="bulk_products_id" value="{{$product->id}}">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="Name">Name</label>
								<input type="text" name="name" class="form-control" id="Name" placeholder="Name" required>
							</div>
							<div class="form-group col-md-12">
								<label for="inputEmail4">Email</label>
								<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
							</div>
							<div class="form-group col-md-12">
								<label for="phone">Phone</label>
								<input type="number" name="phone" class="form-control" id="phone" placeholder="phone number" required>
							</div>
							<div class="form-group col-md-12">
								<label for="Address">Address</label>
								<textarea name="address" class="form-control" id="Address" rows="3" required>
								</textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">City</label>
								<input type="text" name="city" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-md-6">
								<label for="inputState">Country</label>
								<input type="text" class="form-control" name="country" id="country" required>
							</div>
						</div>
						<div class="form-group">
							<label for="Description">Message</label>
							<textarea name="message" class="form-control" id="message" rows="3">
							</textarea>
						</div>
						<input type="submit" class="btn btn-primary" value="Order Now">
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- End main Content -->

@endsection
