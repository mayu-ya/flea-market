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
        $form = $request->except('content', 'image');
        $img = $request->file('image');
        $image = str_replace('public/', 'storage/', $img->store('public/item'));
        $form['image'] = $image;
        $Merchandise = Merchandise::create($form);

        $categories = $request->input('content', []);

        // コントローラー内
$categories = $request->input('content', []);
dd($categories); // ← ここでテストを止めて、中身が [20] になっているか確認

        foreach($categories as $category) {
            Detail::create([
                'merchandise_id' => $Merchandise->id,
                'category_id' => $category,
            ]);
        }
        
       
        
        return redirect('/');
    }
}
