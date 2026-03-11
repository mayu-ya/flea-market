<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();

        return view('mypage');
    }
}
