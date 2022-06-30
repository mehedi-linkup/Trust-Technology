<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
   public function index(){
       $about =About::first();
       return view('admin.about.index', compact('about'));
   }

   public function update(Request $request, About $about){
       $request->validate([
            'description' => 'required|string',
            'image' => 'Image|mimes:jpg,png.jpeg,bmp'
       ]);
       $aboutImage = '';
       if($request->hasFile('image')){
           if(!empty($about->image) && file_exists($about->image)){
                unlink($about->image);
           }
           $aboutImage= $this->imageUpload($request, 'image', 'uploads/about');
       }else{
           $aboutImage = $about->image;
       }
       $about->description = $request->description;
       $about->mission = $request->mission;
       $about->trams = $request->trams;
       $about->image=$aboutImage;
       $about->save();
       if($about){
            Session::flash('status', 'success');
            return back();
       }else{
           Session::flash('errors', '!opps Update fail');
           return back();
       }
      
   }
}
