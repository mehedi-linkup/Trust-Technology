<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::latest()->get();
        return view('admin.video.index', compact('video'));
    }


    public function approveStatus($id){
        $video = video::find($id);
        if($video->status == 1){
            $video->status = 0;
            $video->save();
        }
        else{
            $video->status = 1;
            $video->save();
        }

        // video::where('id', $id)->update([
        //     'status'=>  $oldStatus->status == 0 ? 1 : 0
        // ]);

        // video::where('id', '!=', $id)->update([
        //     'status' => 0,
        // ]);

        Session::flash('status', 'success');
        return back();
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
            'title' =>'required|string|min:3|max:200',
            'video' =>'required|url'
       ]);
     
       $video = new Video();
       $video->title = $request->title;
       $video->video = $request->video;
       $video->save();
       if($video){
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
    public function edit(Video $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' =>'required|string|min:3|max:200',
            'video' =>'required|url'
       ]);
       $video->title = $request->title;
       $video->video = $request->video;
       $video->save();
       if($video){
            Session::flash('status', 'success');
           return redirect()->route('video.index');
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
    public function destroy(Video $video)
    {
        if(!empty($video->image) && file_exists($video->image)){
            unlink($video->image);
        }
        $video->delete();
        if($video){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
