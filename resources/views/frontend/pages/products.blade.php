@extends('frontend.layouts.master')

@section('content')
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
	<div class="container">
		<div class="row">
			<!--Start Product Sidebar  -->
			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
				<div class="shop__sidebar">
					<aside class="wedget__categories poroduct--cat">
						<h3 class="wedget__title">Product Categories</h3>
						<ul id="filters">
							<li><a class="btn btn-link" href="{{ route('products') }}">All Products</a></li>
							@foreach(App\Models\Category::orderBy('id', 'asc')->get() as $category)
{{--							<li><button type="button" class="btn btn-link" data-filter=".{{ $category->id }}">{{ $category->name }}</button></li>--}}
{{--							<!-- <li><a href="#">{{ $category->name }} <span>3</span></a></li> -->--}}
								<li><a class="btn btn-link" href="{{ route('productsByCategory', $category->id) }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</aside>
				</div>
			</div>
			<!--End Product Sidebar  -->

			<!--Start All Product -->
			<div class="col-lg-9 col-12 order-1 order-lg-2">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="wedget__title">Products</h3>
					</div>
				</div>
				<div class="tab__container">
					<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
						<!-- <div class="row"> -->
						<!-- Start Product section -->
						<section class="wn__bestseller__area bg--white _pt--80  _pb--30">
							<div class="container">
								<div class="tab__container mt--2">
									<!-- Start Single Tab Content -->
									<div class="container">
										<div class="row grid">
											@foreach($products as $product)
											<?php
											// $image = App\Models\ProductImage::where('id', $product->id )->first();
											?>
											<div class="col-md-3 col-sm-6 grid-item {{ $product->category }}" data-category="{{ $product->category }}" style="width:50%">
												<div class="product-grid4">
													<div class="product-image4">
														<a href="{{ route('single_product',$product->id) }}">
															<img class="pic-1" src="{{ asset('images/product_image/'.$product->images->first()->image) }}">
															<img class="pic-2" src="{{ asset('images/product_image/'.$product->images->first()->image) }}">
														</a>
														<ul class="social">
															<li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
															<li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
															<li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
														</ul>
														<span class="product-new-label">New</span>
														<span class="product-discount-label">-10%</span>
													</div>
													<div class="product-content">
														<p class="_title"><a href="{{ route('single_product',$product->id) }}">{{ $product->title }}</a></p>
														<div class="_price">
															Price -{{ $product->price }}TK
															<!-- <span>$16.00</span> -->
														</div>
														@include('frontend.partial.add_to_cart')
														<!-- <a class="_add-to-cart btn btn-secondary btn-sm" href="">ADD TO CART</a> -->
													</div>
												</div>
											</div>
											@endforeach
										</div>

									</div>
									<!-- End Single Tab Content -->
								</div>
							</div>
						</section>
						<!-- End Product section  -->
						<!-- </div> -->
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								{{ $products->render() }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End All Product -->
		</div>
	</div>
</div>
<!-- End Shop Page -->


@endsection
