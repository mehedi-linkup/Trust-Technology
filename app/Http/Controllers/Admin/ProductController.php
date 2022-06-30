<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::OrderBy('id', 'Desc')->get();
        return view('admin.product.index', compact('product', 'category'));
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
            'title' => 'required|string|max:100',
            'category_id' => 'required|string',
            'shortdes' => 'required|string|max:255',
            'image' => 'required|Image|mimes:jpg,png,jpeg,bmp,gif'
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->shortdes = $request->shortdes;
        $product->description = $request->description;
        $product->image = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
        $product->save();
        if ($product) {
            Session::flash('status', 'success');
            return redirect()->route('product.index');
        } else {
            Session::flash('errors', 'something went wrong');
        }
        return redirect()->back();
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
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'category'));
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
            'title' => 'required|string',
            'shortdes' => 'required|string',
            'image' => 'Image|mimes:jpg,png,jpeg,bmp,gif'
        ]);

        $product = Product::findOrFail($id);
        $productImage = '';
        if ($request->hasFile('image')) {
            if (!empty($product->image) && file_exists($product->image)) {
                unlink($product->image);
            }
            $productImage = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
        } else {
            $productImage = $product->image;
        }
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->shortdes = $request->shortdes;
        $product->description = $request->description;
        $product->image = $productImage;
        $product->save();
        if ($product) {
            Session::flash('update', 'success');
            return redirect()->route('product.index');
        } else {
            Session::flash('errors', 'something went wrong');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!empty($product->image) && file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();
        if ($product) {
            Session::flash('delete', 'success');
            return redirect()->back();
        } else {
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }
    }
}
