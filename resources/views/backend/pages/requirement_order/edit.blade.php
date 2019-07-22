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
            <form class="forms-sample" method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Title</label>
                <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="exampleInputName1" placeholder="Product Title">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" value="{{ $product->price }}" class="form-control" name="price" id="exampleInputEmail1">
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" value="{{ $product->quantity }}" class="form-control" name="quantity" id="exampleInputEmail1">
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
                        <option value="{{ $parent->id }}" {{ $product->category == $parent->id? 'selected':''  }}>{{ $parent->name }}</option>
                        @foreach(App\Models\Category::orderBy('name', 'desc')->where('parent_id', $parent->id )->get() as $child)
                        <option value="{{ $child->id }}" {{ $product->category == $child->id? 'selected':''  }}>-->{{ $child->name }}</option>
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
                <textarea name="description" rows="5" cols="80" class="form-control">
                    {{ $product->description }}
                </textarea>
              </div>
              <div class="form-group">
                <label for="product_image">Product Image</label>
                <div class="row">

                  <?php
                  $product_images = App\Models\ProductImage::where('product_id', $product->id )->get();
                  $product_image = $product_images->toArray();

                  // echo "<pre>";
                  // print_r($product_image);
                  // die();

                  ?>

                  <div class="col-md-4">
                    @if(isset($product_image[0]['image']))
                    <img src="{{ asset('images/product_image/'.$product_image[0]['image']) }}" alt="" width="50px">
                    <input type="hidden" value="{{ $product_image[0]['id'] }}"  name="product_id00" >
                    <input type="hidden" value="{{ $product_image[0]['image'] }}"  name="product_image00" >
                    @endif
                    <input type="file" class="form-control" name="product_image0" id="product_image" >
                  </div>

                  <div class="col-md-4">
                    @if(isset($product_image[1]['image']))
                    <img src="{{ asset('images/product_image/'.$product_image[1]['image']) }}" alt="" width="50px">
                    <input type="hidden" value="{{ $product_image[1]['id'] }}"  name="product_id11" >
                    <input type="hidden" value="{{ $product_image[1]['image'] }}"  name="product_image11" >
                    @endif
                    <input type="file" class="form-control" name="product_image1" id="product_image" >
                  </div>


                  <div class="col-md-4">
                    @if(isset($product_image[2]['image']))
                    <img src="{{ asset('images/product_image/'.$product_image[2]['image']) }}" alt="" width="50px">
                    <input type="hidden" value="{{ $product_image[2]['id'] }}"  name="product_id22" >
                    <input type="hidden" value="{{ $product_image[2]['image'] }}"  name="product_image22" >
                    @endif
                    <input type="file" class="form-control" name="product_image2" id="product_image" >
                  </div>

                  <div class="col-md-4">
                    @if(isset($product_image[3]['image']))
                    <img src="{{ asset('images/product_image/'.$product_image[3]['image']) }}" alt="" width="50px">
                    <input type="hidden" value="{{ $product_image[3]['id'] }}"  name="product_id33" >
                    <input type="hidden" value="{{ $product_image[3]['image'] }}"  name="product_image33" >
                    @endif
                    <input type="file" class="form-control" name="product_image3" id="product_image" >
                  </div>
                </div>
              </div>

              <div class="float-right">
                <button class="btn btn-light mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Update Product</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
