<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchandise;
use App\Models\Category;
use App\Models\Profile;

class SellController extends Controller
{
    public function index()
    {
        $profile_id = Auth::user()->profile->id;

        return view('sell', compact('profile_id'));
    }

    public function create(Request $request)
    {
        $form = $request->except('content');
        Merchandise::create($form);

        $contents = $request->only('content');
        $categories = implode(",", $contents);
        $category = new Category();
        $category->contents = $contents;
        $category->save();
        
        return redirect('/');
    }
}
