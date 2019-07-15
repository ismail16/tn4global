@if (Session::has('error'))
  <div class="container mt-2">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <ul>
            @php
              $value = Session::get('error');
            @endphp
{{--            @foreach ($error->all() as $err)--}}
              <p>{{ $value }}</p>
{{--            @endforeach--}}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endif

@if ($errors->any())
<div class="container mt-2">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
          @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endif

@if(Session::has('success'))
<div class="container mt-2">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div>
    </div>
  </div>
</div>
@endif

@if(Session::has('sticky_error'))
<div class="container mt-2">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <p>{{ Session::get('sticky_error') }}</p>
      </div>
    </div>
  </div>
</div>
@endif
