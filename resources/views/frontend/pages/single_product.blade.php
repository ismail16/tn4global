@extends('frontend.layouts.master')

@section('content')

<!-- Start Bradcaump area -->
<!-- <div class="ht__bradcaump__area bg-image--4">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bradcaump__inner text-center">
					<h2 class="bradcaump-title">Shop Single</h2>
					<nav class="bradcaump-content">
						<a class="breadcrumb_item" href="index.html">Home</a>
						<span class="brd-separetor">/</span>
						<span class="breadcrumb_item active">Shop Single</span>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- End Bradcaump area -->
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<div class="wn__single__product">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="wn__fotorama__wrapper">
								<?php $images = App\Models\ProductImage::where('product_id', $product->id )->get(); ?>
								<div class="exzoom hidden" id="exzoom">
									<div class="exzoom_img_box">
										<ul class='exzoom_img_ul'>
											@foreach($images as $image)
												<li><img src="{{ asset('images/product_image/'.$image->image) }}" alt=""></li>
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
									<span>{{ $product->title }}</span>
								</div>
								<div class="product__overview">
									<p>{{ $product->description }}</p>
								</div>
								<div class="box-tocart d-flex">
									<span>Qty</span>
									<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
									<div class="addtocart__actions">
										<button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
									</div>
								</div>
								<div class="product_meta">
									<span class="posted_in">Category:
										<a class="btn btn-outline-info" href="{{route('productsByCategory',$product->category_id)}}">{{ \App\Models\Category::find($product->category_id)->name }}</a>
									</span>
								</div>
								<div class="product-share">
									<ul>
										<li class="categories-title">Share :</li>
										<li>
											<a href="#">
												<i class="icon-social-twitter icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-facebook icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-linkedin icons"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product__info__detailed">
					<div class="pro_details_nav nav justify-content-start" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
{{--						<a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>--}}
					</div>
					<div class="tab__container">
						<!-- Start Single Tab Content -->
						<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
							<div class="description__attribute">
								<p>{{ $product->description }}</p>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
				<div class="shop__sidebar">
					<aside class="wedget__categories poroduct--cat">
						<h3 class="wedget__title">Product Categories</h3>
						<ul>
							@foreach(App\Models\Category::orderBy('id', 'asc')->get() as $category)
							<li>
								<a href="{{ route('productsByCategory',$category->id) }}">
									{{ $category->name }}
									<span>({{ count(\App\Models\Product::where('category_id', $category->id)->get()) }})</span>
								</a>
							</li>
							@endforeach
						</ul>
					</aside>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End main Content -->

@endsection
