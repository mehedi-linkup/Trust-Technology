<?php

namespace App\Http\Controllers\Admin;

use App\Models\Committee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committee = Committee::OrderBy('id', 'Desc')->get();
        return view('admin.committee.index', compact('committee'));
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
            'name' =>'required|string|min:3|max:100',
            'designation' => 'required|string|max:50',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $committee = new Committee;
       $committee->name =$request->name;
       $committee->designation =$request->designation;
       $committee->facebook =$request->facebook;
       $committee->twitter =$request->twitter;
       $committee->linkedin =$request->linkedin;
       $committee->instagram =$request->instagram;
       $committee->image = $this->imageUpload($request, 'image', 'uploads/committee') ?? '';
       $committee->save();

       if($committee){
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
    public function edit(Committee $management)
    {
       return view('admin.committee.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $management)
    {
        $request->validate([
            'name' =>'required|string|min:3',
            'designation' => 'required|string',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $committeeImage ='';
       if($request->hasFile('image')){
            if(!empty($management->image) && file_exists($management->image)){
                unlink($management->image);
            }
            $committeeImage = $this->imageUpload($request, 'image', 'uploads/committee');   
       }
       else{
           $committeeImage = $management->image;
       }  
       $management->name =$request->name;
       $management->designation =$request->designation;
       $management->facebook =$request->facebook;
       $management->twitter =$request->twitter;
       $management->linkedin =$request->linkedin;
       $management->instagram =$request->instagram;
       $management->image = $committeeImage;
       $management->save();

       if($management){
            Session::flash('update', 'success');
            return redirect()->route('management.index');
            
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
    public function destroy(Committee $management)
    {
        if(!empty($management->image) && file_exists($management->image)){
            unlink($management->image);
        }
        $management->delete();
        if($management){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
