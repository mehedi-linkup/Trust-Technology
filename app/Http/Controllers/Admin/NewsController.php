<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::OrderBy('id', 'Desc')->get();
        return view('admin.news.index', compact('news'));
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
        // dd($request->all());
        $request->validate([
            'title' =>'required|string|min:3|max:200',
            'date' =>'required|date',
            'shortdetails' =>'required|string|max:120',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
        $slug = trim($this->linkup_slug($request->title), '-');
        $news = new News;
        $news->title =$request->title;
        $news->slug =$slug;
        $news->date =$request->date;
        $news->shortdetails =$request->shortdetails;
        $news->description =$request->description;
        $news->image = $this->imageUpload($request, 'image', 'uploads/news') ?? '';
        $news->save();

       if($news){
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
    public function edit(News $news)
    {
       return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' =>'required|string|min:3',
            'date' =>'required|date',
            'shortdetails' =>'required|string|max:120',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $newsImage ='';
       if($request->hasFile('image')){
            if(!empty($news->image) && file_exists($news->image)){
                unlink($news->image);
            }
            $newsImage = $this->imageUpload($request, 'image', 'uploads/news');   
       }
       else{
           $newsImage = $news->image;
       }  
        $slug = trim($this->linkup_slug($request->title), '-');
        $news->title =$request->title;
        $news->slug =$slug;
        $news->date =$request->date;
        $news->shortdetails =$request->shortdetails;
        $news->description =$request->description;
        $news->image =$newsImage;
        $news->save();

       if($news){
            Session::flash('update', 'Successfully Update');
            return redirect()->route('news.index');
            
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
    public function destroy(News $news)
    {
        if(!empty($news->image) && file_exists($news->image)){
            unlink($news->image);
        }
        $news->delete();
        if($news){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
