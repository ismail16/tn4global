<!-- Header -->
<header id="wn__header" class="header__area header__absolute sticky__header" style="background-color: rgba(70, 117, 53, 0.9);">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-6 col-lg-2">
        <div class="logo">
          <a href="{{ route('index') }}">
            <img src="{{ asset('public/frontend_assets/images/logo/logo.png')}}" alt="logo images">
          </a>
        </div>
      </div>
      <div class="col-lg-8 d-none d-lg-block">
        <nav class="mainmenu__nav">
          <ul class="meninmenu d-flex justify-content-start">
            <li class="drop with--one--item"><a href="{{ route('index') }}">Home</a></li>
            <li class="drop with--one--item"><a href="{{ route('products') }}">Products</a></li>
            <li class="drop"><a href="shop-grid.html">Books</a>
              <div class="megamenu mega03">
                <ul class="item item03">
                  <li style="font-size: 20px">Category</li>
                  @foreach(App\Models\Category::orderBy('id', 'desc')->get() as $category)
                  <!-- <option value="{{ $category->id }}">{{ $category->name }}</option> -->
                  <li><a href="{{ route('products') }}">{{ $category->name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </li>
            <li class="drop"><a href="{{route('blogs')}}">Blog</a>
              <div class="megamenu dropdown">
                <ul class="item item01">
                  <li><a href="{{route('blogs')}}">Blog Page</a></li>
                  <li><a href="{{route('blog_details')}}">Blog Details</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{ route('contract') }}">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-md-6 col-sm-6 col-6 col-lg-2">
        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
          <!-- <li class="shop_search"><a class="search__active" href="#"></a></li> -->
          <!-- <li class="wishlist"><a href="#"></a></li> -->
          <li class="shopcart"><a class="_cartbox_active" href="{{ route('carts') }}"><span class="product_qun">{{ App\Models\Cart::totalItems() }}</span></a>
          </li>

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="rounded-circle" style="width:40px;">
            <p>&nbsp;&nbsp;{{ Auth::user()->first_name }}<span class="caret"></span></p>

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <small><a class="dropdown-item" href="{{ route('user.dashboard') }}">Profile</a></small>
              <small><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a></small>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>

          </li>
          @endguest

          <!-- <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
            <div class="searchbar__content setting__block">
              <div class="content-inner">
                <div class="switcher-currency">
                  <strong class="label switcher-label">
                    <span>My Account</span>
                  </strong>
                  <div class="switcher-options">
                    <div class="switcher-currency-trigger">
                      <div class="setting__menu">
                        <span><a href="#">Compare Product</a></span>
                        <span><a href="#">My Account</a></span>
                        <span><a href="#">My Wishlist</a></span>
                        <span><a href="#">Sign In</a></span>
                        <span><a href="#">Create An Account</a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li> -->
        </ul>
      </div>
    </div>

    <div class="row" style="background-color:black; margin:auto 300px;">
      <div class="col-md-12">
        <div class="input-group mb-2 mt-2 d-flex justify-content-center">
          <form method="POST" action="{{ route('search.product') }}">
            @csrf
            <div class="input-group mb-3">
              <div class="input-group-prepend mr-1">
                <select class="custom-select mr-2" id="product_category_selector">
                  <option value="">Select Category</option>
                  @foreach(App\Models\Category::orderBy('id', 'desc')->get() as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <input type="hidden" name="category_id" id="select_category_id"  value="" class="form-control">
              <input type="text" name="search_keyword" class="form-control" aria-label="Text input with dropdown button">
              <button type="submit" class="ml-1">Search</button>
            </div>
          </form>          
        </div>
      </div>
    </div>

  </div>

  <!-- Start Mobile Menu -->
  <div class="row d-none">
    <div class="col-lg-12 d-none">
      <nav class="mobilemenu__nav">
        <ul class="meninmenu">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Pages</a>
            <ul>
              <li><a href="about.html">About Page</a></li>
              <li><a href="portfolio.html">Portfolio</a>
                <ul>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-details.html">Portfolio Details</a></li>
                </ul>
              </li>
              <li><a href="my-account.html">My Account</a></li>
              <li><a href="cart.html">Cart Page</a></li>
              <li><a href="checkout.html">Checkout Page</a></li>
              <li><a href="wishlist.html">Wishlist Page</a></li>
              <li><a href="error404.html">404 Page</a></li>
              <li><a href="faq.html">Faq Page</a></li>
              <li><a href="team.html">Team Page</a></li>
            </ul>
          </li>
          <li><a href="shop-grid.html">Shop</a>
            <ul>
              <li><a href="shop-grid.html">Shop Grid</a></li>
              <li><a href="single-product.html">Single Product</a></li>
            </ul>
          </li>
          <li><a href="blog.html">Blog</a>
            <ul>
              <li><a href="blog.html">Blog Page</a></li>
              <li><a href="blog-details.html">Blog Details</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- End Mobile Menu -->
  <div class="mobile-menu d-block d-lg-none">
  </div>
  <!-- Mobile Menu -->
</div>
</header>
<!-- //Header -->


<!-- Start Search Popup -->
<!-- <div class="brown-color box-search-content search_active block-bg close__top">
  <form id="search_mini_form" class="minisearch" action="#">
    <div class="field__search">
      <input type="text" placeholder="Search entire store here...">
      <div class="action">
        <a href="#"><i class="zmdi zmdi-search"></i></a>
      </div>
    </div>
  </form>
  <div class="close__wrap">
    <span>close</span>
  </div>
</div> -->
<!-- End Search Popup -->
<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
