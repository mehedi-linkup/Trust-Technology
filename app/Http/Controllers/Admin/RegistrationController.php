<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:1',
            'image' => 'mimes:jpg,png.jpeg,bmp'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
        $user->save();
        if($user) {
            Session::flash('status', 'success');
            return back(); 
        }
        return redirect()->back()->withInput();
    }

    public function settings() {
        
        return view('auth.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required',
            // 'password' => 'required|min:1',
            'image' => 'mimes:jpg,png.jpeg,bmp'
        ]);
        $user = User::findOrFail(Auth::id());
        
        $profileImage = '';
        if($request->hasFile('image')) {
            if(!empty($user->image) && file_exists($user->image)) {
                unlink($user->image);
            }
            $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
        } else {
            $profileImage = $user->image;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        // $user->password = Hash::make($request->password);
        $user->image = $profileImage;
        $user->save();
        if($user)
        {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput();
    }
    public function destroy($id) {
        $user = User::find($id);
        if (!empty($user->image) && file_exists($user->image)) {
            unlink($user->image);
        }
        $user->delete();

        if ($user) {
            Session::flash('delete', 'success');
            return redirect()->back();
        } else {
            Session::flash('errors', 'something went wrong');
            return redirect()->back();
        }
    }

}
