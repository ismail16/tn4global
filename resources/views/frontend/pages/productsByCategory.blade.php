@extends('frontend.layouts.master')

@section('content')

<!-- Start Bradcaump area -->
<!-- <div class="ht__bradcaump__area bg-image--6">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bradcaump__inner text-center">
					<h2 class="bradcaump-title">Shop Grid</h2>
					<nav class="bradcaump-content">
						<a class="breadcrumb_item" href="index.html">Home</a>
						<span class="brd-separetor">/</span>
						<span class="breadcrumb_item active">Shop Grid</span>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- End Bradcaump area -->

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
							<li><button type="button" class="btn btn-link is-checked" data-filter="*">Show all</button></li>
							@foreach(App\Models\Category::orderBy('id', 'asc')->get() as $category)
							<li><button type="button" class="btn btn-link" data-filter=".{{ $category->id }}">{{ $category->name }}</button></li>
							<!-- <li><a href="#">{{ $category->name }} <span>3</span></a></li> -->
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
						<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
							<div class="shop__list nav justify-content-center" role="tablist">
								<a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
								<a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
							</div>
							<p>Showing 1–12 of 40 results</p>
							<div class="orderby__wrapper">
								<span>Sort By</span>
								<select class="shot__byselect">
									<option>Default sorting</option>
									<!-- @foreach(App\Models\Category::orderBy('id', 'asc')->get() as $category)
										<option>{{ $category->name }}</option>
									@endforeach -->
								</select>
							</div>
						</div>
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
											$image = App\Models\ProductImage::where('id', $product->id )->first();
											?>
											<div class="col-md-3 col-sm-6 grid-item {{ $product->category }}" data-category="{{ $product->category }}" style="width:50%">
												<div class="product-grid4">
													<div class="product-image4">
														<a href="{{ route('single_product',$product->id) }}">
															<img class="pic-1" src="{{ asset('images/product_image/'.$image->image) }}">
															<img class="pic-2" src="{{ asset('images/product_image/'.$image->image) }}">
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
														<a class="_add-to-cart btn btn-secondary btn-sm" href="">ADD TO CART</a>
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
						<ul class="wn__pagination">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
						</ul>
					</div>
					<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
						<div class="list__view__wrapper">
							<!-- Start Single Product -->
							@foreach($products as $product)
							<?php
							$image = App\Models\ProductImage::where('id', $product->id )->first();
							?>
							<div class="list__view">
								<div class="thumb">
									<a class="first__img" href="{{ route('single_product',$product->id) }}"><img src="{{ asset('images/product_image/'.$image->image) }}" alt="product images" style="width:70%"></a>
									<!-- <a class="second__img animation1" href="single-product.html"><img src="{{ asset('images/product_image/'.$image->image) }}" alt="product images"></a> -->
								</div>
								<div class="content">
									<h2><a href="{{ route('single_product',$product->id) }}">{{ $product->title }}</a></h2>
									<ul class="rating d-flex">
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li class="on"><i class="fa fa-star-o"></i></li>
										<li><i class="fa fa-star-o"></i></li>
										<li><i class="fa fa-star-o"></i></li>
									</ul>
									<ul class="prize__box">
										<li>{{ $product->price }}</li>
										<!-- <li class="old__prize">$220.00</li> -->
									</ul>
									<p>{{ $product->description }}</p>
									<ul class="cart__action d-flex">
										<li class="cart"><a href="cart.html">Add to cart</a></li>
										<li class="wishlist"><a href="cart.html"></a></li>
										<li class="compare"><a href="cart.html"></a></li>
									</ul>

								</div>
							</div>
							<hr>
							@endforeach
							<!-- End Single Product -->

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
