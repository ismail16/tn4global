@extends('frontend.layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="division_id" class="col-md-4 col-form-label text-md-right">Division</label>

                            <div class="col-md-6">
                              <select class="form-control" name="division_id">
                                <option value="">Please select your division</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="district_id" class="col-md-4 col-form-label text-md-right">District</label>

                        <div class="col-md-6">
                          <select class="form-control" name="district_id">
                            <option value="">Please select your district</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

                    <div class="col-md-6">
                        <input id="street_address" type="street_address" class="form-control" name="street_address" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
