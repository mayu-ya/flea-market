<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExhibitionRequest;
use App\Models\Merchandise;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Detail;

class SellController extends Controller
{
    public function index()
    {
        $profile_id = Auth::user()->profile->id;
        $categories = Category::all();

        return view('sell', compact('profile_id', 'categories'));
    }

    public function create(ExhibitionRequest $request)
    {
        //dd($request);
        $form = $request->except('content', 'image');
        $image = $request->file('image')->store('public');
        $form['image'] => $image;
        $Merchandise = Merchandise::create($form);

        $categories = $request->input('content', []);

        foreach($categories as $category)
        Detail::create([
            'merchandise_id' => $Merchandise->id,
            'category_id' => $category,
        ]);
        
        return redirect('/');
    }
}
