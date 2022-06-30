<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        // return view('admin.category.index', compact('category'));
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'status' => 'required',
            // 'image' =>'Image|mimes:jpg,png,jpeg,bmp'
        ]);

        $slug = trim($this->linkup_slug($request->name), '-');

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->slug =$slug;
        // $category->image = $this->imageUpload($request, 'image', 'uploads/category');
        $category->save();

        if($category){
            Session::flash('status', 'Category added successfully');
            return back();
        }else{
            Session::flash('error', '!Opps Category Added fail');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'status' => 'required'
            // 'image' =>'Image|mimes:jpg,png,jpeg,bmp'
        ]);

        $slug = trim($this->linkup_slug($request->name), '-');

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug =$slug;
        $category->status = $request->status;
        // $catImage='';
        // if($request->hasFile('image')){
        //     if(!empty($category->image) && file_exists($category->image)){
        //         unlink($category->image);
        //     }
        //     $catImage = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
        // }
        // else{
        //     $catImage = $category->image;
        // }
        // $category->image = $catImage;
        $category->save();

        if($category){
            Session::flash('update', 'Category updated successfully');
            return redirect()->route('category.index');
        }else{
            Session::flash('error', '!Opps Category updated fail');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('category_id',$id)->count();
        if($product>0){
            Session::flash('delete_check','Delete fail');
            return back();
        }
        else{
            $category = Category::where('id',$id)->first();
        if(!empty($category->image) && file_exists($category->image)){
            unlink($category->image);
        }
        $category->delete();
        if($category){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
            else{
                Session::flash('errors', 'something went wrong');
                return redirect()->back();
            } 
        }
        
    }
}
