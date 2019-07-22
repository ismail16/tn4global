@extends('frontend.layouts.master')

@section('content')
  <div class='container mt-2'>
    <div class="row" style="margin: 50px !important;">
      <div class="col-md-4">
        <div class="list-group">
          <a href="" class="list-group-item">
            @php
             $user_image = App\Helpers\ImageHelper::getUserImage(Auth::user()->id)
            @endphp
            @if($user_image != null)
            <img src="{{ $user_image }}" class="img rounded-circle" style="width:100px">
              @else
              <img src="https://image.flaticon.com/icons/png/128/149/149452.png" class="img rounded-circle" style="width:100px">
            @endif
          </a>
          <a href="{{ route('user.dashboard') }}" class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('user.profile') }}" class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }}">Update Profile</a>

        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-body">
          @yield('sub-content')
        </div>
      </div>
    </div>
  </div>
@endsection
