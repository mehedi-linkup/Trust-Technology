<?php

namespace App\Http\Controllers\Admin;
use App\Models\BackBanner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackBannerController extends Controller
{
    // Edit
    public function edit()
    {
        $backbanner = BackBanner::first();
        return view('admin.backbanner.index', compact('backbanner'));
    }
    public function update(Request $request, BackBanner $backbanner) {
        $request->validate([
            'about' => 'Image|mimes:jpg,jpeg,png,bmp',
            'product' => 'Image|mimes:jpg,jpeg,png,bmp',
            'gallery' => 'Image|mimes:jpg,jpeg,png,bmp',
            'news' => 'Image|mimes:jpg,jpeg,png,bmp',
            'contact' => 'Image|mimes:jpg,jpeg,png,bmp',
        ]);

        // Image Update 
        $bannerAbout = '';
        if($request->hasFile('about')){
            if(!empty($backbanner->about) && file_exists($backbanner->about)){
                unlink($backbanner->about);
            }
            $bannerAbout = $this->imageUpload($request, 'about', 'uploads/backbanner');   
        }
        else{
           $bannerAbout = $backbanner->about;
        }  

        $bannerProduct = '';
        if($request->hasFile('product')){
            if(!empty($backbanner->product) && file_exists($backbanner->product)){
                unlink($backbanner->product);
            }
            $bannerProduct = $this->imageUpload($request, 'product', 'uploads/backbanner');   
        }
        else{
           $bannerProduct = $backbanner->product;
        }  

        $bannerGallery = '';
        if($request->hasFile('gallery')){
            if(!empty($backbanner->gallery) && file_exists($backbanner->gallery)){
                unlink($backbanner->gallery);
            }
            $bannerGallery = $this->imageUpload($request, 'gallery', 'uploads/backbanner');   
        }
        else{
           $bannerGallery = $backbanner->gallery;
        }  
        
        $bannerNews = '';
        if($request->hasFile('news')){
            if(!empty($backbanner->news) && file_exists($backbanner->news)){
                unlink($backbanner->news);
            }
            $bannerNews = $this->imageUpload($request, 'news', 'uploads/backbanner');   
        }
        else{
           $bannerNews = $backbanner->news;
        }  
        $bannerContact = '';
        if($request->hasFile('contact')){
            if(!empty($backbanner->contact) && file_exists($backbanner->contact)){
                unlink($backbanner->contact);
            }
            $bannerContact = $this->imageUpload($request, 'contact', 'uploads/backbanner');   
        }
        else{
           $bannerContact = $backbanner->contact;
        }  
        $backbanner->about = $bannerAbout;
        $backbanner->product = $bannerProduct;
        $backbanner->gallery = $bannerGallery;
        $backbanner->news = $bannerNews;
        $backbanner->contact = $bannerContact;

        $backbanner->save();
        if($backbanner){
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }
}
