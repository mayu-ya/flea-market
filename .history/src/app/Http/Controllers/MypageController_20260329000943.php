<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Merchandise;

class MypageController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();
        $profileId = $profile->only('id');
        $merchandises = Merchandise::where('id', '=', $profileId);

        return view('mypage_sell', compact('profile', 'merchandises'));
    }

    public function tab_index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();
        $merchandises = Merchandise::all();

        return view('mypage_buy', compact('profile', 'merchandises'));
    }
}
