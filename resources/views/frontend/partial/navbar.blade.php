<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark sticky__header" style="background-color: #2f404e!important;">
    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('public/images/logos/TN4-Logo.png')}}" alt="logo images">
            </a>
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    Home
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('products') }}">
                    Products
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(App\Models\Category::orderBy('id', 'desc')->get() as $category)
                        <a class="dropdown-item" href="{{ route('productsByCategory', $category->id) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('contract') }}">
                    Contact
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('requirement') }}">
                    Requirements
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('carts') }}">
                    <i class="fa fa-cart-plus">
                        <span class="badge badge-info">{{ App\Models\Cart::totalItems() }}</span>
                    </i>
                </a>
            </li>
            @guest
            <li class="nav-item dropdown" style="margin: 0px 55px 0px 0px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">Registration</a>
                    @endif
                </div>
            </li>
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" style="display: -webkit-box; margin: 17px 3px -16px 5px; cursor: pointer;">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="rounded-circle" style="width:40px;">
                        <p>&nbsp;&nbsp;{{ Auth::user()->first_name }}<span class="caret"></span></p>

                    </a>

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
        </ul>
    </div>
</nav>
{{--<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark search-bar-stiky d-flex justify-content-end">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <form class="form-inline" action="#">--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <select class="custom-select" name="category_id">--}}
{{--                        @foreach(App\Models\Category::orderBy('id', 'desc')->get() as $category)--}}
{{--                            <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <input type="text" name="key_word" class="form-control" placeholder="Search Product" >--}}
{{--                    <div class="input-group-prepend">--}}
{{--                        <button class="btn btn-outline-secondary" type="button">--}}
{{--                            <i class="fa fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<style>
    .navbar-icon-top .navbar-nav .nav-link > .fa {
        position: relative;
        width: 36px;
        font-size: 24px;
    }

    .search-bar-stiky{
        -webkit-animation: 0.4s ease-in-out 0s normal both 1 running fadeInDown;
        animation: 0.4s ease-in-out 0s normal both 1 running fadeInDown;
        /* background: rgba(0, 0, 0, 0.9) none repeat scroll 0 0; */
        /* box-shadow: 0 0 5px #bdbdbd; */
        /* left: 0; */
        position: fixed;
        top: 78px;
         transition: box-shadow 0.5s ease-in-out 0s;
        width: 100%;
        z-index: 99;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
        font-size: 0.75rem;
        position: absolute;
        right: 0;
        font-family: sans-serif;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa {
        top: 3px;
        line-height: 12px;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
        top: -10px;
    }

    @media (min-width: 576px) {
        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 768px) {
        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 992px) {
        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 1200px) {
        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
</style>
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
