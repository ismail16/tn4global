<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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

  public function search(Request $request)
  {

    $category_id = $request->category_id;
    $search_key = $request->search_keyword;

    if ($category_id != '' || $search_key != '') {
      $search_results = Product::Where('title', 'LIKE', '%' .$search_key. '%')
      ->Where('category', 'LIKE', '%'. $category_id . '%')
      ->get();
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
    $products = Product::orderBy('id', 'desc')->where('category',$category_id)->paginate(2);
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
