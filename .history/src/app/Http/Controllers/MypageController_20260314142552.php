<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class MypageController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();

        return view('mypage_sell', compact('profile'));
    }
}
