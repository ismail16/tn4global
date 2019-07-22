@extends('backend.layouts.master')

@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 d-flex justify-content-center">
        @include('backend.partial.messages')
      </div>
      <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Product</h4>
            <form class="forms-sample" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Product Title">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleInputEmail1">
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" name="category" id="exampleFormControlSelect1">
                      <option value="">Parent Category</option>
                      @foreach(App\Models\Category::orderBy('name', 'desc')->where('parent_id', null)->get() as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @foreach(App\Models\Category::orderBy('name', 'desc')->where('parent_id', $parent->id )->get() as $child)
                        <option value="{{ $child->id }}">-->{{ $child->name }}</option>
                        @endforeach
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Brand</label>
                    <select class="form-control" name="brand_id">
                      <option value="10">Please select a brand for the product</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" rows="5" cols="80" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="product_image">Product Image</label>
                <div class="row">
                  <div class="col-md-4">
                    <input type="file" class="form-control" name="product_image[]" id="product_image" >
                  </div>
                  <div class="col-md-4">
                    <input type="file" class="form-control" name="product_image[]" id="product_image" >
                  </div>
                  <div class="col-md-4">
                    <input type="file" class="form-control" name="product_image[]" id="product_image" >
                  </div>
                  <div class="col-md-4">
                    <input type="file" class="form-control" name="product_image[]" id="product_image" >
                  </div>
                  <div class="col-md-4">
                    <input type="file" class="form-control" name="product_image[]" id="product_image" >
                  </div>
                </div>
              </div>

              <div class="float-right">
                <button class="btn btn-light mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Add Product</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
