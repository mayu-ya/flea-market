<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Merchandise;
use App\Models\Purchase;

class MypageController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();
        $profileId = $profile->id;
        $merchandises = Merchandise::where('profile_id', '=', $profileId)->get();

        return view('mypage_sell', compact('profile', 'merchandises'));
    }

    public function tab_index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();
        $profileId = $profile->id;
        $items = Purchase::where('profile_id', '=', $profileId)->pluck('merchandise_id');
        $merchandises = Merchandise::where('profile_id', '=', $items)->get();

        return view('mypage_buy', compact('profile', 'merchandises'));
    }
}
