<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', '=', Auth::id())->first();

        return view('profile', ['profile' => $profile]);
    }

    public function upsert(ProfileRequest $request)
    {
        $profile = $request->except('profile_img');
        $image = $request->file('profile_img');
        $profileId = Profile::where('user_id', auth()->id())->first();
        $path = $image ? str_replace('public/', 'storage/', $image->store('public/profile')) : ($profileId->profile_img ?? null);

        $profile = Profile::updateOrCreate(
            ['user_id' => auth()->Id()],
            [
                'user_id' => auth()->id(),
                'name' => $profile['name'],
                'post_code' => $profile['post_code'],
                'address' => $profile['address'],
                'building' => $profile['building'],
                'profile_img' => $path,
            ]
        );

        return redirect('/')->with(compact('profile'));
    }
}
