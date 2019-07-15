@extends('frontend.layouts.master')
@section('content')

<!-- Start Slider area -->
<div id="product_serch_result" class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
  <!-- Start Single Slide -->
  <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="slider__content">
            <div class="contentbox">
              <h2>Buy <span>your </span></h2>
              <h2>favourite <span>Book </span></h2>
              <h2>from <span>Here </span></h2>
              <a class="shopbtn" href="#">shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Single Slide -->
  <!-- Start Single Slide -->
  <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="slider__content">
            <div class="contentbox">
              <h2>Buy <span>your </span></h2>
              <h2>favourite <span>Book </span></h2>
              <h2>from <span>Here </span></h2>
              <a class="shopbtn" href="#">shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Single Slide -->
</div>
<!-- End Slider area -->

<!-- Start Product section -->
<section  class="wn__bestseller__area bg--white pt--80  pb--30">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section__title text-center">
          <h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
          <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
        </div>
      </div>
    </div>
    <div class="row mt--10">
      <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="product__nav nav justify-content-center" role="tablist">
          <div id="filters" class="button-group">
            |<button type="button" class="btn btn-link is-checked" data-filter="*">Show all</button> |
            @foreach(App\Models\Category::orderBy('id', 'asc')->get() as $category)
            <button type="button" class="btn btn-link" data-filter=".{{ $category->id }}">{{ $category->name }}</button> |
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="tab__container mt--20">
      <!-- Start Single Tab Content -->
      <div class="container">
        <div class="row grid">
          @foreach($products as $product)
          <?php
          // $image = App\Models\ProductImage::where('id', $product->id )->first();
          ?>
          <div class="col-md-3 col-sm-6 grid-item {{ $product->category }}" data-category="{{ $product->category }}">
            <div class="product-grid4">
              <div class="product-image4">
                <a href="#">
                  <img class="pic-1" src="{{ asset('public/images/product_image/'.$product->images->first()->image) }}">
                  <img class="pic-2" src="{{ asset('public/images/product_image/'.$product->images->first()->image) }}">
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
                <h3 class="title"><a href="{{ route('single_product',$product->id) }}">{{ $product->title }}</a></h3>
                <div class="price">
                  {{ $product->price }}
                  <!-- <span>$16.00</span> -->
                </div>
                @include('frontend.partial.add_to_cart')
                <!-- <a class="add-to-cart" href="">ADD TO CART</a> -->
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

<!-- Start New Product Setion -->
<section class="wn__product__area brown--color bg--gray pt--80  pb--30">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section__title text-center">
          <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
          <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
        </div>
      </div>
    </div>
    <!-- Start Single Tab Content -->
    <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">

      <!-- Start Single Product -->
      @foreach($products as $product)
      <?php
      $image = App\Models\ProductImage::where('id', $product->id )->first();
      ?>
      <div class="product product__style--3">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="product__thumb">
            <a class="first__img" href="single-product.html"><img src="{{ asset('public/images/product_image/'.$image->image) }}" alt="product image"></a>
            <a class="second__img animation1" href="single-product.html"><img src="{{ asset('public/images/product_image/'.$image->image) }}" alt="product image"></a>
            <div class="hot__box color--2">
              <span class="hot-label">HOT</span>
            </div>
          </div>
          <div class="product__content content--center">
            <h4><a href="single-product.html">{{  $product->title }}</a></h4>
            <ul class="prize d-flex">
              <li>$35.00</li>
              <li class="old_prize">$35.00</li>
            </ul>
            <div class="action">
              <div class="actions_inner">
                <ul class="add_to_links">
                  <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                  <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                  <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                  <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="product__hover--content">
              <ul class="rating d-flex">
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li class="on"><i class="fa fa-star-o"></i></li>
                <li><i class="fa fa-star-o"></i></li>
                <li><i class="fa fa-star-o"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Single Product -->
      @endforeach
    </div>
    <!-- End Single Tab Content -->
  </div>
</section>
<!--End  New Product Setion -->

<!-- Start NEwsletter Area -->
<section class="wn__newsletter__area bg-image--2">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
        <div class="section__title text-center">
          <h2>Stay With Us</h2>
        </div>
        <div class="newsletter__block text-center">
          <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
          <form action="#">
            <div class="newsletter__box">
              <input type="email" placeholder="Enter your e-mail">
              <button>Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End NEwsletter Area -->

<!-- Start Recent Post Area -->
<section class="wn__recent__post bg--gray ptb--80">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section__title text-center">
          <h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
          <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
        </div>
      </div>
    </div>
    <div class="row mt--50">
      <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="post__itam">
          <div class="content">
            <h3><a href="{{ route('blog_details') }}">International activities of the Frankfurt Book </a></h3>
            <p>We are proud to announce the very first the edition of the frankfurt news.We are proud to announce the very first of  edition of the fault frankfurt news for us.</p>
            <div class="post__time">
              <span class="day">Dec 06, 18</span>
              <div class="post-meta">
                <ul>
                  <li><a href="{{ route('index') }}"><i class="bi bi-love"></i>72</a></li>
                  <li><a href="{{ route('index') }}"><i class="bi bi-chat-bubble"></i>27</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="post__itam">
          <div class="content">
            <h3><a href="{{ route('blog_details') }}">Reading has a signficant info  number of benefits</a></h3>
            <p>Find all the information you need to ensure your experience.Find all the information you need to ensure your experience . Find all the information you of.</p>
            <div class="post__time">
              <span class="day">Mar 08, 18</span>
              <div class="post-meta">
                <ul>
                  <li><a href="{{ route('index') }}"><i class="bi bi-love"></i>72</a></li>
                  <li><a href="{{ route('index') }}"><i class="bi bi-chat-bubble"></i>27</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="post__itam">
          <div class="content">
            <h3><a href="{{ route('blog_details') }}">The London Book Fair is to be packed with exciting </a></h3>
            <p>The London Book Fair is the global area inon marketplace for rights negotiation.The year  London Book Fair is the global area inon forg marketplace for rights.</p>
            <div class="post__time">
              <span class="day">Nov 11, 18</span>
              <div class="post-meta">
                <ul>
                  <li><a href="{{ route('index') }}"><i class="bi bi-love"></i>72</a></li>
                  <li><a href="{{ route('index') }}"><i class="bi bi-chat-bubble"></i>27</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Recent Post Area -->

<!-- Best Sale Area -->
<section class="best-seel-area pt--80 pb--60">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section__title text-center pb--50">
          <h2 class="title__be--2">Best <span class="color--theme">Seller</span></h2>
          <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
        </div>
      </div>
    </div>
  </div>
  <div class="slider center">
    <!-- Single product start -->
    @foreach($products as $product)
    <?php
    $image = App\Models\ProductImage::where('id', $product->id )->first();
    ?>
    <div class="product product__style--3">
      <div class="product__thumb">
        <a class="first__img" href="{{ route('single_product', $product->id) }}"><img src="{{ asset('public/images/product_image/'.$image->image) }}" alt="product image"></a>
      </div>
      <div class="product__content content--center">
        <div class="action">
          <div class="actions_inner">
            <ul class="add_to_links">
              <li>
                <a class="btn btn-outline-info" title="Quick View" href="{{ route('single_product', $product->id) }}"><i class="fa fa-eye"></i></a>
              </li>
              <li>
                <form class="" action="{{ route('cards.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button class="btn btn-outline-info" title="Add to Cart" type="submit"><i class="fa fa-shopping-cart"></i></button>
                </form>
              </li>
              <li>
                <a class="btn btn-outline-info" title="Add to Wishlist" href="{{ route('index') }}"><i class="fa fa-shopping-bag"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="product__hover--content">
          <ul class="rating d-flex">
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
          </ul>
        </div>
      </div>
    </div>
    @endforeach
    <!-- Single product end -->

  </div>
</section>
<!-- Best Sale Area Area -->



@endsection
