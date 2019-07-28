@extends('frontend.layouts.master')
@section('content')

<!-- Start Slider area -->
<div id="product_serch_result" class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
  <!-- Start Single Slide -->
  <div class="slide animation__style10 _bg-image--1 fullscreen align__center--left">
      <img src="{{asset('public/frontend_assets/images/bg/Baner-01.png')}}" alt="">
       <div class="slider__content" style="_background-color: #56ba47; opacity: .6; _color: #00a651; position: absolute; bottom: 5px; text-align: center;">
          <div class="contentbox">
              <h4 style="color:red">To get offer !!</h4>
              <a style="margin-left:50px; background-color: #fff;opacity: 1; color:#c34040" class="shopbtn" href="">shop now</a>
          </div>
      </div>
  </div>
  <!-- End Single Slide -->
  <!-- Start Single Slide -->
  <div class="slide animation__style10 _bg-image--2 fullscreen align__center--left">
      <img src="{{asset('public/frontend_assets/images/bg/Baner-02.png')}}" alt="">

       <div class="slider__content" style="_background-color: #56ba47; opacity: .6; _color: #00a651; position: absolute; bottom: 5px; text-align: center;">
          <div class="contentbox">
              <h4 style="color:red">To get offer !!</h4>
              <a style="margin-left:50px; background-color: #fff;opacity: 1; color:#c34040" class="shopbtn" href="">shop now</a>
          </div>
      </div>
  </div>
  <!-- End Single Slide -->
    <!-- Start Single Slide -->
    <div class="slide animation__style10 _bg-image--3 fullscreen align__center--left">
        <img src="{{asset('public/frontend_assets/images/bg/Baner-03.png')}}" alt="">
        <div class="slider__content" style="_background-color: #56ba47; opacity: .6; _color: #00a651; position: absolute; bottom: 5px; text-align: center;">
            <div class="contentbox">
              <h4 style="color:red">To get offer !!</h4>
              <a style="margin-left:50px; background-color: #fff;opacity: 1; color:#c34040" class="shopbtn" href="">shop now</a>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->

<!-- Start Product section -->
<hr>
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
                <h3 class="title"><a href="{{ route('single_product',$product->id) }}">{{ $product->title }}</a></h3>
                <div class="price">
                  {{ $product->price }} Tk
                  <!-- <span>$16.00</span> -->
                </div>
                @include('frontend.partial.add_to_cart')
                <!-- <a class="add-to-cart" href="">ADD TO CART</a> -->
              </div>
            </div>
          </div>
          @endforeach
        </div>
          <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
                  {{ $products->render() }}
              </div>
          </div>
      </div>
      <!-- End Single Tab Content -->
    </div>
  </div>
</section>
<!-- End Product section  -->

<!-- Start New Product Setion -->
<hr>
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
//      $image = App\Models\ProductImage::where('id', $product->id )->first();
      ?>
      <div class="product product__style--3">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="product__thumb">
            <a class="first__img" href="{{ route('single_product',$product->id) }}"><img src="{{ asset('images/product_image/'.$product->images->first()->image) }}" alt="product image"></a>
            <a class="second__img animation1" href="{{ route('single_product',$product->id) }}"><img src="{{ asset('images/product_image/'.$product->images->first()->image) }}" alt="product image"></a>
            <div class="hot__box color--2">
              <span class="hot-label">HOT</span>
            </div>
          </div>
          <div class="product__content content--center">
            <h4><a href="{{ route('single_product',$product->id) }}">{{  $product->title }}</a></h4>
            <ul class="prize d-flex">
              <li> {{ $product->price }} Tk</li>
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
<hr>
<section class="wn__newsletter__area">
    <div class="container">
        <div class="row">
            <div class="col-md-7 bg-image--4">
                <img src="{{ asset('public/frontend_assets/images/bg/Baner-04.png') }}" alt="">
            </div>
            <div class="col-md-5">
                <div class="section__title mt-4">
                    <h4>For Global buyers contact with Us</h4>
                </div>
                <div class="newsletter__block">
                    <p>To get exclusive offers Global buyers can order their requirements</p>
                    <div class="newsletter__box text-right">
{{--                        <input type="email" placeholder="Enter your e-mail">--}}
                        <a href="{{ route('requirement') }}" class="btn btn-primary">Order --></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Best Sale Area -->
<hr>
<section class="best-seel-area bg--gray pt--80 pb--60">

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
        <a class="first__img" href="{{ route('single_product', $product->id) }}"><img src="{{ asset('images/product_image/'.$product->images->first()->image) }}" alt="product image"></a>
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
