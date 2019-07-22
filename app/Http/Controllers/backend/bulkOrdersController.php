<?php

namespace App\Http\Controllers\backend;

use App\Models\BulkOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class bulkOrdersController extends Controller
{

    public function manage()
    {
        $orders = BulkOrder::orderBy('id', 'asc')->get();
        return view('backend.pages.bulk_order.manage', compact('orders'));
    }


    public function details($id)
    {
        $order = BulkOrder::find($id);
        // $order_details = Order_detail::orderBy('id', 'desc')->where('order_id',$id)->get();
        return view('backend.pages.bulk_order.order_details', compact('order'));
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


    public function seen_by_admin($id)
    {
        $order =  BulkOrder::find($id);
        $order->status = 1;
        $order->save();

        session()->flash('success', 'Bulk Order Confirmed By Admin Successfully !');
        return redirect()->route('admin.bukl_orders.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $order =  BulkOrder::find($id);
        $order->delete();
        session()->flash('success', 'Deleted Order Successfully !');
        return back();
    }
}
