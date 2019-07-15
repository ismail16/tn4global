<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Cart;
use Auth;

class CheckoutsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $payments = Payment::orderBy('priority', 'asc')->get();
    return view('frontend.pages.checkouts', compact('payments'));
  }


  public function store(Request $request)
  {

    $this->validate($request, [
      'name'  => 'required',
      'phone_no'  => 'required',
      'shipping_address'  => 'required',
      'payment_method_id'  => 'required'
    ]);

    $order = new Order();
    // check transaction ID has given or not
    if ($request->payment_method_id != 'cash_in') {
      if ($request->transaction_id == NULL || empty($request->transaction_id)) {
        session()->flash('sticky_error', 'Please give transaction ID for your payment');
        return back();
      }
    }

    $order->name = $request->name;
    $order->email = $request->email;
    $order->phone_no = $request->phone_no;
    $order->shipping_address = $request->shipping_address;
    // $order= implode(',', $request->order_products);
    $order->message  = $request->message;

    $order->ip_address = request()->ip();
    $order->transaction_id = $request->transaction_id;
    if (Auth::check()) {
      $order->user_id = Auth::id();
    }

    $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
    $order->save();

    $order_id = $order->id;
    if (count($request->order_products) > 0) {
      foreach(array_combine($request->order_products, $request->product_quantity) as $product_id=>$quantity) {
        $order_details = new Order_detail();
        $order_details->order_id = $order_id;
        $order_details->product_id = $product_id;
        $order_details->product_quantity = $quantity;
        $order_details->save();
      }
      // foreach(array_combine($request->order_products, $request->product_quantity) as $f => $n) {
      // // foreach ($request->order_products as $product_id) {
      //   $order_details = new Order_detail();
      //   $order_details->order_id = $order_id;
      //   $order_details->product_id = $product_id;
      //   $order_details->product_quantity = $product;
      //   $order_details->save();
      // }
    }

    foreach (Cart::totalCarts() as $cart) {
      if (Auth::check()) {
        if ($cart->user_id == Auth::id()) {
          $cart->delete();
        }
      }else if ($cart->ip_address == $order->ip_address) {
        $cart->delete();
      }
    }

    session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    return redirect()->route('index');
  }
}
