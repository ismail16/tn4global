<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {

        $orders = Order::orderBy('id', 'asc')->get();
        return view('backend.pages.order.manage', compact('orders'));
    }


    public function details($id)
    {
      $order = Order::find($id);
      // $order_details = Order_detail::orderBy('id', 'desc')->where('order_id',$id)->get();
      return view('backend.pages.order.order_details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seen_by_admin(Request $request, $id)
    {
      $order =  Order::find($id);
      $order->is_seen_by_admin = $request->seen_by_admin;
      $order->save();

      session()->flash('success', 'Order Confirmed By Admin Successfully !');
      return redirect()->route('admin.orders.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $order =  Order::find($id);
      $order->delete();
      session()->flash('success', 'Deleted Order Successfully !');
      return back();
    }
}
