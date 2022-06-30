<?php

namespace App\Http\Controllers\Admin;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $gallery = PhotoGallery::OrderBy('id', 'Desc')->get();
     return view('admin.gallery.index', compact('gallery'));
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
        // dd($request->all())
        $request->validate([
            'title' =>'required|string|min:3|max:100',
            'image' =>'required|Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $gallery = new PhotoGallery();
       $gallery->title = $request->title;
       $gallery->image = $this->imageUpload($request, 'image', 'uploads/gallery') ?? '';
       $gallery->save();
       if($gallery){
            Session::flash('status', 'success');
            return back(); 
        }else{
            Session::flash('errors', ' something went wrong');
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
    public function edit(PhotoGallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $gallery)
    {
        $request->validate([
            'title' =>'required|string|min:3|max:100',
            'image' =>'|Image|mimes:jpg,png,jpeg,bmp'
       ]);
       $photoGallery ='';
       if($request->hasFile('image')){
            if(!empty($gallery->image) && file_exists($gallery->image)){
                unlink($gallery->image);
            }
            $photoGallery = $this->imageUpload($request, 'image', 'uploads/gallery');   
       }
       else{
           $photoGallery = $gallery->image;
       }  
     
       $gallery->title = $request->title;
       $gallery->image = $photoGallery;
       $gallery->save();
       if($gallery){
            Session::flash('update', 'success');
            return redirect()->route('gallery.index'); 
        }else{
            Session::flash('errors', ' something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallery $gallery)
    {
        if(!empty($gallery->image) && file_exists($gallery->image)){
            unlink($gallery->image);
        }
        $gallery->delete();
        if($gallery){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
