<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function memberList()
    {
        $member = Member::all();
        return view('admin.member' ,compact('member'));
    }
    public function memberStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|regex:/^01[13-9][\d]{8}$/|min:11',
            'date' => 'required|date',
            'blood' => 'required|max:10',
            'area' => 'required|max:50',
            'image' =>'required|Image|mimes:jpg,png,jpeg,bmp',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->date = $request->date;
        $member->email = $request->email;
        $member->area = $request->area;
        $member->blood = $request->blood;
        $member->address = $request->address;
        $member->image = $this->imageUpload($request, 'image', 'uploads/member');
        $member->save();

        if($member){
            Session::flash('status', 'success');
            return back();
        }
        else{
            Session::flash('errors', 'success');
            return back();
        }
    }

    public function approveStatus($id){
        Member::where('id', $id)->where('status', '0')->update([
            'status'=>'1',
        ]);
        return redirect()->back();
    }
    public function pendingStatus($id){
        Member::where('id', $id)->where('status', '1')->update([
            'status'=>'0',
        ]);
        return redirect()->back();
    }

    public function destroy(Member $member)
    {
        if(!empty($member->image) && file_exists($member->image)){
            unlink($member->image);
        }
        $member->delete();
        if($member){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
