<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function manage()
     {
       $categories=Category::orderBy('id','desc')->get();
       return view('backend.pages.category.manage', compact('categories'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       $categories=Category::orderBy('id','asc')->get();
       return view('backend.pages.category.create', compact('categories'));
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        $this->validate($request,[
            'category_name' => 'required',
            'category_image' => 'nullable|image',
        ],
        [
          'category_name.required' => 'Please provide a category name',
          'category_image.image' => 'Please provide a valid image with .jpg, .png...',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->parent_id = $request->parent_id;

        $image = $request->file('category_image');
         if ($image) {
             $image_name = time();
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $ext;
             $upload_path = 'images/category_image/';
             $image_url = $upload_path . $image_full_name;
             $success = $image->move($upload_path, $image_full_name);
             if ($success) {
                 $category->image = $image_full_name;
             }
         }else{
           $category->image = 'null';
         }
         $category->save();
         session()->flash('success', 'Save Category Information Successfully !');
         return redirect()->route('admin.category.create');
     }

     public function edit($id)
     {
        $category = Category::find($id);
        if(!is_null($category))
        {
            $main_categories=Category::orderBy('name','desc')->where('parent_id',NULL)->get();
            return view('backend.pages.category.edit',compact('category','main_categories'));
        }
        else
        {
            return redirect()->route('admin.categories');
        }
     }


     public function update(Request $request,$id)
     {

       $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',
        ],
        [
          'name.required' => 'Please provide a category name',
          'image.image' => 'Please provide a valid image with .jpg, .png...',
        ]);

        $category =  Category::find($id);

        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->parent_id = $request->parent_id;

        $image = $request->file('category_image');
         if ($image) {
           //delete old image
           if(File::exists('images/category_image/'.$category->image))
            {
               File::delete('images/category_image/'.$category->image);
            }
             $image_name = time();
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $ext;
             $upload_path = 'images/category_image/';
             $image_url = $upload_path . $image_full_name;
             $success = $image->move($upload_path, $image_full_name);
             if ($success) {
                 $category->image = $image_full_name;
             }
         }else{
           $category->image =   $category->image;
         }
         $category->save();
         session()->flash('success', 'Updated Category Information Successfully !');
         return redirect()->route('admin.category.edit',$id);
   }

     public function delete($id)
     {
        $category= Category::find($id);
        if(!is_null($category))
        {
            //if is is parent category, then delete all its sub category
            if($category->parent_id==null)
            {
                //delete sub category
                $sub_categories=Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
                foreach($sub_categories as $sub)
                {
                    if(File::exists('images/category_image/'.$sub->image))
                    {
                        File::delete('images/category_image/'.$sub->image);
                    }
                    $sub->delete();
                }
            }
            //delete category image
             if(File::exists('images/category_image/'.$category->image))
             {
                 File::delete('images/category_image/'.$category->image);
             }
            $category->delete();
        }
        session()->flash('success','Category delete successful!!');
        return back();
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function destroy(Category $category)
     {
          //
     }
}
