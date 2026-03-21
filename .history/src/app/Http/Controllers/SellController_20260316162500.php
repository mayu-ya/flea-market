<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Category;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function create(Request $request)
    {
        $form = $request->except('content');
        $category = $request->only('content');
        Merchandise::create($form);
        Category::create($category);
        
        return redirect('/');
    }
}
