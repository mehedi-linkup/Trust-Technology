<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Video;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Member;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Committee;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // index 
    public function index()
    {
        $sliders = Banner::latest()->get();
        $about = About::first();
        $committee = Committee::where('status', '1')->take(8)->get();
        $photo = PhotoGallery::latest()->take(8)->get();
        $news = News::latest()->take(3)->get();
        $product = Product::latest()->take(12)->get();
        // $category = Category::get()->take(10);
        $categorylast = Category::get()->skip(10);
        // $videos = Video::where('status', 1)->skip(1)->take(4)->get();
        // $video = Video::where('status', 1)->orderBy('created_at','DESC')->first();
        $videos = Video::where('status', 1)->take(4)->get();
        return view('website.index', compact('sliders', 'committee','about', 'photo', 'news','product','videos','categorylast'));
    }

    public function products(){
        
        $products = Product::latest()->get();
        // $category = Category::latest()->get();
        // $product = Product::with('category')->latest()->get();
        // $category = Category::with('product')->latest()->get();
        // return view('website.products', compact('products', 'category'));
        return view('website.products', compact('products'));
    }

    public function ProductCat($id) {
        // $category = Category::latest()->get();
        $productcat = Category::with('product')->find($id);
        return view('website.productcate', compact('productcat'));
    }

    public function ProductDetails($id){
        $product = Product::with('category')->find($id);
        return view('website.productDetails', compact('product'));
    }
    public function aboutUs()
    {
        $about = About::first();
        return view('website.about', compact('about'));
    }
    public function photoGallery()
    {
        $photo = PhotoGallery::all();
        return view('website.gallery', compact('photo'));
    }
    public function committee()
    {
        $committee = Committee::where('status', '1')->get(); 
        return view('website.committee', compact('committee'));
    }
    public function news()
    {
        $news = News::latest()->get();
        return view('website.news', compact('news'));
    }
    public function newsDetails($slug){
        $news =News::where('slug', $slug)->first();
        return view('website.newsDetails', compact('news'));
    }
    public function register()
    {
        return view('website.register');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function categorywiseProduct($id){
        $category = Category::where('id',$id)->first();
        
        $product = Product::where('category_id',$id)->get();
        
        return view('website.category',compact('product','category'));
    }
}
