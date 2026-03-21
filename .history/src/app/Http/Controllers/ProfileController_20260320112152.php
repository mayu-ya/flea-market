<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::select(['profile_img', 'name', 'post_code', 'address', 'building'])->get();

        return view('profile', ['profiles' => $profile]);
    }

    public function upsert(ProfileRequest $request)
    {
        $profile = $request->except('profile_img');
        //$image = $request->file('profile_img');
        //if($image) {
           //$profile_path = $image->store('public/profile');
           //$path = str_replace('public/', 'storage/', $profile_path);
        //}

        $profile = Profile::updateOrCreate(
            ['user_id' => auth()->Id()],
            [
                'user_id' => auth()->id(),
                'name' => $profile['name'],
                'post_code' => $profile['post_code'],
                'address' => $profile['address'],
                'building' => $profile['building'],
                //'profile_img' => $path,
            ]
        );

        return redirect('/')->with(compact('profile'));
    }
}
