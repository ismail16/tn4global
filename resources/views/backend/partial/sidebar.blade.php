<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link" style="padding: 5px 35px !important;">
        <div class="user-wrapper" style="margin-bottom: 0px !important;">
          <div class="profile-image">
            <img src="{{ asset('public/frontend_assets/images/logo/profile.png')}}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Ismail Hossain</p>
            <div>
              <small class="designation text-muted">Manager</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="ui-basic">
        <i class="fas fa-ambulance menu-icon"></i>
        <span class="menu-title">Orders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders.manage') }}">Manage Orders</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#Category" aria-expanded="false" aria-controls="ui-basic">
        <i class="fa fa-list-alt menu-icon"></i>
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Category">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.manage') }}">Manage Category</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#Products" aria-expanded="false" aria-controls="ui-basic">
        <i class="fab fa-product-hunt menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Products">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.create') }}">Add Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.manage') }}">Manage Products</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#Division" aria-expanded="false" aria-controls="ui-basic">
        <i class="fas fa-city menu-icon"></i>
        <span class="menu-title">Division</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Division">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.division.manage') }}">Manage Division</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#District" aria-expanded="false" aria-controls="ui-basic">
        <i class="fas fa-city menu-icon"></i>
        <span class="menu-title">District</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="District">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.district.manage') }}">Manage District</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
          <form method="POST" action="{{ route('admin.logout.submit') }}">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </span>
      </a>
    </li>

  </ul>
</nav>
