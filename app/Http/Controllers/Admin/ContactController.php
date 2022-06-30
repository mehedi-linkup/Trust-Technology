<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function contactList()
    {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|max:50',
            'phone' => 'required'
            // 'phone' => 'required|regex:/^01[13-9][\d]{8}$/|min:11',
           
        ]);

        $message = new Contact();
        $message->name = $request->name;
        $message->phone = $request->phone; 
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        if($message){
            Session::flash('status', 'success');
            return back();
        }
        else{
            Session::flash('errors', 'success');
            return back();
        }
    }
    public function destroy(Contact $contact){
        $contact->delete();
        if($contact){
            Session::flash('delete', 'success');
            return redirect()->back();
        }
        else{
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }   
    }
}
