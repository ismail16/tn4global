<?php

namespace App\Http\Controllers\backend;

use App\Models\BulkProductImage;
use App\Models\BulkProduct;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BulkProduct_s extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manage()
    {
        $products = BulkProduct::orderBy('id', 'desc')->get();
        return view('backend.pages.bulk_product.manage', compact('products'));
    }

    public function create()
    {
        return view('backend.pages.bulk_product.create');
    }

    public function store(Request $request)
    {
        $product = new BulkProduct();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->slug =  str_slug($product->title);
        $product->author =  'admin';
        $product->publisher =  'admin';
        $product->status =  1;
        $product->save();

        if (count($request->product_image) > 0) {
            $image_no = 0;
            foreach ($request->product_image as $image) {
                $image_time = time();
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $product->slug.'-image-'. $image_no .'-'.$image_time.'.' . $ext;
                $upload_path = 'images/bulk_product_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success) {
                    $product_image = new BulkProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image = $image_full_name;
                    $product_image->save();
                }
                $image_no++;
            }
        }
        return back();
    }


    public function edit($id)
    {
        $product = BulkProduct::find($id);
        $product_img = BulkProductImage::find($id);
        return view('backend.pages.bulk_product.edit', compact('product','product_img'));
    }


    public function update(Request $request, $id)
    {
        $product = BulkProduct::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->slug =  str_slug($product->title);
        $product->author =  'admin';
        $product->publisher =  'admin';
        $product->status =  1;
        $product->save();

        $image0 = $request->file('product_image0');
        if ($image0) {
            if(File::exists('images/bulk_product_image/'.$request->product_image00))
            {
                File::delete('images/bulk_product_image/'.$request->product_image00);
            }
            $ext = strtolower($image0->getClientOriginalExtension());
            $image_full_name = $product->slug.'-image-'. '0' .'.' . $ext;
            $upload_path = 'images/bulk_product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image0->move($upload_path, $image_full_name);
            if ($success) {
                if ($request->product_id00) {
                    $product_image = BulkProductImage::find($request->product_id00);
                }else {
                    $product_image = new ProductImage;
                    $product_image->product_id = $product->id;
                    $product_image->image = $image_full_name;
                }

                $product_image->save();
            }
        }

        $image1 = $request->file('product_image1');
        if ($image1) {
            if(File::exists('images/bulk_product_image/'.$request->product_image11))
            {
                File::delete('images/bulk_product_image/'.$request->product_image11);
            }
            $ext = strtolower($image1->getClientOriginalExtension());
            $image_full_name = $product->slug.'-image-'. '1' .'.' . $ext;
            $upload_path = 'images/bulk_product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image1->move($upload_path, $image_full_name);
            if ($success) {
                if ($request->product_id11 != '') {
                    $product_image = BulkProductImage::find($request->product_id11);
                }else {
                    $product_image = new ProductImage;
                    $product_image->product_id = $product->id;
                    $product_image->image = $image_full_name;
                }
                $product_image->save();
            }
        }

        $image2 = $request->file('product_image2');
        if ($image2) {
            if(File::exists('images/bulk_product_image/'.$request->product_image22))
            {
                File::delete('images/bulk_product_image/'.$request->product_image22);
            }
            $ext = strtolower($image2->getClientOriginalExtension());
            $image_full_name = $product->slug.'-image-'. '2' .'.' . $ext;
            $upload_path = 'images/bulk_product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image2->move($upload_path, $image_full_name);
            if ($success) {
                if ($request->product_id22 != '') {
                    $product_image = BulkProductImage::find($request->product_id22);
                }else {
                    $product_image = new ProductImage;
                    $product_image->product_id = $product->id;
                    $product_image->image = $image_full_name;
                }

                $product_image->save();
            }
        }

        $image3 = $request->file('product_image3');
        if ($image3) {
            if(File::exists('images/bulk_product_image/'.$request->product_image33))
            {
                File::delete('images/bulk_product_image/'.$request->product_image33);
            }
            $ext = strtolower($image3->getClientOriginalExtension());
            $image_full_name = $product->slug.'-image-'. '3' .'.' . $ext;
            $upload_path = 'images/bulk_product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image3->move($upload_path, $image_full_name);
            if ($success) {
                if ($request->product_id33 != '') {
                    $product_image = BulkProductImage::find($request->product_id22);
                }else {
                    $product_image = new ProductImage;
                    $product_image->product_id = $product->id;
                    $product_image->image = $image_full_name;
                }

                $product_image->save();
            }
        }

        return back();
    }

    public function delete($id){

        $ProductImages=BulkProductImage::where('product_id',$id)->get();
        if (!is_null($ProductImages)) {
            foreach ($ProductImages as  $ProductImage) {
                if(File::exists('images/bulk_product_image/'.$ProductImage->image))
                {
                    File::delete('images/bulk_product_image/'.$ProductImage->image);
                }
                $ProductImage->delete();
            }
        }

        $Product = BulkProduct::find($id);
        $Product->delete();

        session()->flash('success','Delete Bulk Product Successfully !');
        return back();
    }

    public function destroy(Product $product)
    {
        //
    }
}
