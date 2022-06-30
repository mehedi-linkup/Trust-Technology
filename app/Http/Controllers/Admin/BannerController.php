<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::OrderBy('id', 'Desc')->get();
        return view('admin.banner.index', compact('banner'));
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
            'title' =>'required|string|min:3|max:100',
            'image' =>'required|Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $banner = new Banner();
       $banner->title = $request->title;
       $banner->image = $this->imageUpload($request, 'image', 'uploads/banner') ?? '';
       $banner->save();
       if($banner){
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' =>'required|string|min:3',
            'image' =>'|Image|mimes:jpg,png,jpeg,bmp'
       ]);
       $bannerPhoto ='';
       if($request->hasFile('image')){
            if(!empty($banner->image) && file_exists($banner->image)){
                unlink($banner->image);
            }
            $bannerPhoto = $this->imageUpload($request, 'image', 'uploads/banner');   
       }
       else{
           $bannerPhoto = $banner->image;
       }  
     
       $banner->title = $request->title;
       $banner->image = $bannerPhoto;
       $banner->save();
       if($banner){
            Session::flash('update', 'success');
            return redirect()->route('banner.index'); 
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
    public function destroy(Banner $banner)
    {
        if(!empty($banner->image) && file_exists($banner->image)){
            unlink($banner->image);
        }
        $banner->delete();
        if($banner){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
