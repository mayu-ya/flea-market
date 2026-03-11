<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class ItemController extends Controller
{
    public function index()
    {
        $merchandises = Merchandise::select('image', 'merchandise_name')->get();
        return view('index', ['merchandises' => $merchandises]);
    }

    public function show($item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();

        return view('item', compact('merchandise'));
    }

    public function __construct()
    {
        $this->middleware(['auth'])->only(['like', 'unlike']);
    }

    public function like($id)
    {
        $profileId = Auth::user()->profile->id;
        Like::firstOrCreate([
            'merchandise_id' => $id,
            'profile_id' => $profileId,
        ]);

        return redirect()->back();
    }

    public function unlike($id)
    {
        $profileId = Auth::user()->profile->id;
        $like = Like::where('merchandise_id', $id)->where('profile_id',$profileId)->first()->delete();

        return redirect()->back();
    }
}
