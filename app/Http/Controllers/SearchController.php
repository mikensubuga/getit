<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileCategory;
use App\JobProfile;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');
        $categories = ProfileCategory::all();
        $profiles = JobProfile::where('shortDesc', 'like', "%$query%")
            ->orWhere('longDesc', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")->get();
        //     return $profiles;
        return view('front.search-results', compact('categories', 'profiles'));
    }
}
