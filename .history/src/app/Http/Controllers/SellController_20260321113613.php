<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function create(Request $request)
    {
        //dd($request);
        $form = $request->except('content');
        // 登録した商品のIDは、カテゴリ登録で必要になる
        $Merchandise = Merchandise::create($form);

        $category = $request->only('content');
        //$categories = implode(",", $contents);

        // 商品IDを適切に設定しなければエラーとなる
        // $categori->merchandise_id = ???;
        //$category->content = $contents;
        Detail::create([
            'merchandise_id' => $Merchandise->id,
            'category_id' => $category->id,
        ]);
        
        return redirect('/');
    }
}
