<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::select(['profile_img', 'name', 'post_code', 'address', 'building'])->get();

        return view('profile', ['profiles' => $profile]);
    }

    public function upsert(ProfileRequest $request)
    {
        $profile = $request->only(['profile_img', 'name', 'post_code', 'address', 'building']);
        $profile = Profile::updateOrCreate(
            ['user_id' => auth()->Id()],
            [
                'user_id' => auth()->id(),
                // 'profile_img' => $profile['profile_img'],
                'name' => $profile['name'],
                'post_code' => $profile['post_code'],
                'address' => $profile['address'],
                'building' => $profile['building'],
            ]
        );

        return redirect('mypage');
    }
}
