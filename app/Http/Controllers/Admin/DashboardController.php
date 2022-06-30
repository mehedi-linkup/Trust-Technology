<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\News;
use App\Models\PhotoGallery;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $slider = Banner::count();
        $product = Product::count();
        $photo = PhotoGallery::count();
        $news = News::count();
        return view('admin.home',compact('slider','product','photo','news'));
    }

   
}
