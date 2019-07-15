@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 d-flex justify-content-center">
        @include('backend.partial.messages')
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category</h4>
            <form class="forms-sample" method="post" action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Category Name</label>
                <input type="text" name="category_name" value="{{ $category->name }}" class="form-control" id="exampleInputName1" placeholder="Category Name">
              </div>
              <div class="form-group">
                 <label for="exampleFormControlSelect1">Parent Category</label>
                 <select class="form-control" name="parent_id" id="exampleFormControlSelect1">

                   <option value="">Parent Category</option>
                   @foreach(App\Models\Category::orderBy('name', 'desc')->where('parent_id', null)->get() as $parent)
                      <option value="{{ $parent->id }}" {{ $parent->id = $category->id ? 'selected':''}}>{{ $parent->name }}</option>
                      @foreach(App\Models\Category::orderBy('name', 'desc')->where('parent_id', $parent->id )->get() as $child)
                         <option value="{{ $child->id }}">-->{{ $child->name }}</option>
                      @endforeach
                   @endforeach
                 </select>
               </div>
              <div class="form-group">
                <label>Category Image</label>
                <div class="row">
                  <div class="col-md-4">
                    <img src="{{ asset('images/category_image/'.$category->image) }}" alt="" width="70px">
                  </div>
                  <div class="col-md-8">
                    <input type="file" value="{{ $category->image }}" name="category_image" >
                  </div>
                </div>
                <!-- <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                  </span>
                </div> -->
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Discription</label>
                <textarea class="form-control" name="category_description" id="exampleTextarea1" rows="3">
                  {{ $category->description }}
                </textarea>
              </div>
              <div class="float-right">
                <button class="btn btn-light mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Update Category</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
