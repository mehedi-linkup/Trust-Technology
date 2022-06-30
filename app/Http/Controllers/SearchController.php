<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $bloodDonor =Member::where('status', 1)->latest()->get();
        return view('website.blood', compact('bloodDonor'));
    }
   public function searchQuery(Request $request)
   {
        $request->validate([
            'area' => 'required',
            'blood' => 'required',
        ]);
       
        $search = Member::where('status', 1)->Where($request->only('area', 'blood'))->get();
           return view('website.blood_search', compact('search'));  
    }
}
