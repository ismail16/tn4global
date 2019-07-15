<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
// use App\Models\ProductImage;


use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function index()
  {
    $products = Product::orderBy('id', 'desc')->get();
    return view('frontend.pages.index', compact('products'));
  }

  public function products()
  {
    $products = Product::orderBy('id', 'desc')->get();
    return view('frontend.pages.products', compact('products'));
  }
  public function search(Request $request)
  {

    $category_id = $request->category_id;
    $search_key = $request->search_keyword;

    if ($category_id != '' || $search_key != '') {
      $search_results = Product::Where('title', 'LIKE', '%' .$search_key. '%')
      ->Where('category', 'LIKE', '%'. $category_id . '%')
      ->get();
      // dd($search_results);

      if (count($search_results)>0) {
        return view('frontend.pages.search_products', compact('search_results'));
      }else{
        $no_data = 'no_data';
        return view('frontend.pages.search_products', compact('no_data'));
      }
    }else{
      $search_results = Product::orderBy('id','desc')->get();
      return view('frontend.pages.search_products', compact('search_results'));
    }

  }
  public function productsByCategory($category_id)
  {
    $products = Product::orderBy('id', 'desc')->where('category',$category_id)->get();
    return view('frontend.pages.productsByCategory', compact('products'));
  }
  public function single_product($id)
  {
    $product = Product::find($id);
    return view('frontend.pages.single_product', compact('product'));
  }

  public function contract()
  {
   return view('frontend.pages.contract');
 }
 public function blogs()
 {
   return view('frontend.pages.blogs');
 }
 public function blog_details()
 {
   return view('frontend.pages.blog_details');
 }


}
