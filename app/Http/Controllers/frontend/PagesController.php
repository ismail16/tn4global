<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BulkOrder;
use App\Models\BulkProduct;
use App\Models\BulkProductImage;
use App\Models\Contract;
use App\Models\Product;
// use App\Models\ProductImage;


use App\Models\Requirement;
use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function index()
  {
    $products = Product::orderBy('id', 'desc')->paginate(5);
    return view('frontend.pages.index', compact('products'));
  }

  public function products()
  {
    $products = Product::orderBy('id', 'desc')->paginate(5);
    return view('frontend.pages.products', compact('products'));
  }
  public function bulk_products()
  {
    $products = BulkProduct::orderBy('id', 'desc')->paginate(5);
    return view('frontend.pages.bulk_products', compact('products'));
  }

  public function search(Request $request)
  {

    $category_id = $request->category_id;
    $search_key = $request->key_word;

//    return $request;

    if ($category_id != '' || $search_key != '') {
      $search_results = Product::Where('title', 'LIKE', '%' .$search_key. '%')
      ->Where('category_id', 'LIKE', '%'. $category_id . '%')
      ->paginate(10);
//      return "hello";
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
    $products = Product::orderBy('id', 'desc')->where('category_id',$category_id)->paginate(2);

//    return $products;
    return view('frontend.pages.productsByCategory', compact('products'));
  }
  public function single_product($id)
  {
    $product = Product::find($id);
    return view('frontend.pages.single_product', compact('product'));
  }
  public function single_bulk_product($id)
  {
    $product = BulkProduct::find($id);
    return view('frontend.pages.single_bulk_product', compact('product'));
  }
  public function bulk_order_submit(Request $request)
  {
      $request->validate([
          'bulk_products_id' => 'required',
          'name' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'address' => 'required',
          'country' => 'required',
      ]);

      BulkOrder::create(
          [
              'bulk_products_id' => $request->bulk_products_id,
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'address' => $request->address,
              'city' => $request->city,
              'country' => $request->country,
              'message' => $request->message,
              'status' => 0,
          ]
      );
      return redirect()->route('index')->with('success', 'Thank You. Your Bulk Order Submit Successfully. We will contract very soon');
  }

  public function contract()
  {
   return view('frontend.pages.contract');
 }
 public function contract_submit(Request $request)
 {
     $request->validate([
         'name' => 'required',
         'email' => 'required',
     ]);

     Contract::create(
         [
             'name' => $request->name,
             'mobile' => $request->mobile,
             'email' => $request->email,
             'website' => $request->website,
             'subject' => $request->subject,
             'message' => $request->message,
         ]
     );
     return redirect()->back()->with('success', 'Thank You. Yor Message Submit Successfully');
 }

    public function requirement()
    {
        return view('frontend.pages.requirement');
    }
    public function requirement_submit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        Requirement::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
            ]
        );
        return redirect()->back()->with('success', 'Thank You. Yor Requirements Submit Successfully. We will contract very soon');
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
