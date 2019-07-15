@extends('frontend.layouts.master')

@section('content')

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
		<div class="container">
				<div class="row">
						<div class="col-lg-12">
								<div class="bradcaump__inner text-center">
									<h2 class="bradcaump-title">Blog Page</h2>
										<nav class="bradcaump-content">
											<a class="breadcrumb_item" href="index.html">Home</a>
											<span class="brd-separetor">/</span>
											<span class="breadcrumb_item active">Blog</span>
										</nav>
								</div>
						</div>
				</div>
		</div>
</div>
<!-- End Bradcaump area -->
<!-- Start Blog Area -->
<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<div class="blog-page">
					<div class="page__header">
						<h2>Category Archives: HTML</h2>
					</div>
					<!-- Start Single Post -->
					<article class="blog__post d-flex flex-wrap">
						<div class="thumb">
							<a href="{{ route('blog_details') }}">
								<img src="{{ asset('public/frontend_assets/images/blog/blog-3/1.jpg') }}" alt="blog images">
							</a>
						</div>
						<div class="content">
							<h4><a href="{{ route('blog_details') }}">Blog image post</a></h4>
							<ul class="post__meta">
								<li>Posts by : <a href="{{ route('blog_details') }}">road theme</a></li>
								<li class="post_separator">/</li>
								<li>Mar 10 2018</li>
							</ul>
							<p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Crastoup pretium arcu ex. Aenean posuere libero eu augue rhoncus Praesent ornare tortor amet.</p>
							<div class="blog__btn">
								<a href="{{ route('blog_details') }}">read more</a>
							</div>
						</div>
					</article>
					<!-- End Single Post -->
					<!-- Start Single Post -->
					<article class="blog__post d-flex flex-wrap">
						<div class="thumb">
							<a href="{{ route('blog_details') }}">
								<img src="{{ asset('public/frontend_assets/images/blog/blog-3/2.jpg') }}" alt="blog images">
							</a>
						</div>
						<div class="content">
							<h4><a href="{{ route('blog_details') }}">Post with Gallery</a></h4>
							<ul class="post__meta">
								<li>Posts by : <a href="{{ route('blog_details') }}">road theme</a></li>
								<li class="post_separator">/</li>
								<li>Mar 10 2018</li>
							</ul>
							<p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Crastoup pretium arcu ex. Aenean posuere libero eu augue rhoncus Praesent ornare tortor amet.</p>
							<div class="blog__btn">
								<a href="{{ route('blog_details') }}">read more</a>
							</div>
						</div>
					</article>
					<!-- End Single Post -->
					<!-- Start Single Post -->
					<article class="blog__post d-flex flex-wrap">
						<div class="thumb">
							<a href="{{ route('blog_details') }}">
								<img src="{{ asset('public/frontend_assets/images/blog/blog-3/3.jpg') }}" alt="blog images">
							</a>
						</div>
						<div class="content">
							<h4><a href="{{ route('blog_details') }}">Post with Gallery</a></h4>
							<ul class="post__meta">
								<li>Posts by : <a href="{{ route('blog_details') }}">road theme</a></li>
								<li class="post_separator">/</li>
								<li>Mar 10 2018</li>
							</ul>
							<p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Crastoup pretium arcu ex. Aenean posuere libero eu augue rhoncus Praesent ornare tortor amet.</p>
							<div class="blog__btn">
								<a href="{{ route('blog_details') }}">read more</a>
							</div>
						</div>
					</article>
					<!-- End Single Post -->

				</div>
				<ul class="wn__pagination">
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
				<div class="wn__sidebar">
					<!-- Start Single Widget -->
					<aside class="widget search_widget">
						<h3 class="widget-title">Search</h3>
						<form action="#">
							<div class="form-input">
								<input type="text" placeholder="Search...">
								<button><i class="fa fa-search"></i></button>
							</div>
						</form>
					</aside>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget recent_widget">
						<h3 class="widget-title">Recent</h3>
						<div class="recent-posts">
							<ul>
								<li>
									<div class="post-wrapper d-flex">
										<div class="thumb">
											<a href="blog-details.html"><img src="{{ asset('public/frontend_assets/images/blog/sm-img/1.jpg') }}" alt="blog images"></a>
										</div>
										<div class="content">
											<h4><a href="{{ route('blog_details') }}">Blog image post</a></h4>
											<p>	March 10, 2015</p>
										</div>
									</div>
								</li>
								<li>
									<div class="post-wrapper d-flex">
										<div class="thumb">
											<a href="{{ route('blog_details') }}"><img src="{{ asset('public/frontend_assets/images/blog/sm-img/2.jpg') }}" alt="blog images"></a>
										</div>
										<div class="content">
											<h4><a href="{{ route('blog_details') }}">Post with Gallery</a></h4>
											<p>	March 10, 2015</p>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</aside>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget comment_widget">
						<h3 class="widget-title">Comments</h3>
						<ul>
							<li>
								<div class="post-wrapper">
									<div class="thumb">
										<img src="{{ asset('public/frontend_assets/images/blog/comment/1.jpeg') }}" alt="Comment images">
									</div>
									<div class="content">
										<p>Irin says:</p>
										<a href="#">Quisque semper nunc vitae...</a>
									</div>
								</div>
							</li>
							<li>
								<div class="post-wrapper">
									<div class="thumb">
										<img src="{{ asset('public/frontend_assets/images/blog/comment/1.jpeg') }}" alt="Comment images">
									</div>
									<div class="content">
										<p>Boighor says:</p>
										<a href="#">Quisque semper nunc vitae...</a>
									</div>
								</div>
							</li>
						</ul>
					</aside>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget category_widget">
						<h3 class="widget-title">Categories</h3>
						<ul>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Creative</a></li>
							<li><a href="#">Electronics</a></li>
						</ul>
					</aside>
					<!-- End Single Widget -->
					<!-- Start Single Widget -->
					<aside class="widget archives_widget">
						<h3 class="widget-title">Archives</h3>
						<ul>
							<li><a href="#">March 2015</a></li>
							<li><a href="#">December 2014</a></li>
						</ul>
					</aside>
					<!-- End Single Widget -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Blog Area -->

	@endsection
