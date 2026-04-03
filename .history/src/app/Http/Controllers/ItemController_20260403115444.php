<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\Detail;;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;

class ItemController extends Controller
{
    public function index()
    {
        $query =Merchandise::with('purchase');

        if (Auth::check() && Auth::user()->profile){
            $profileId = Auth::user()->profile->id;
            $query -> where('profile_id', '!=', $profileId);
        }        

        $merchandises = $query->get();

        return view('index', compact('merchandises'));
    }

    public function tab_index()
    {
        $profileId =  Auth::check() ? Auth::user()->profile->id: null;
        $likeIds = Like::where('profile_id', $profileId)->pluck('merchandise_id');
        $merchandises = Merchandise::whereIn('id', $likeIds)->get();

        return view('mylist', compact('merchandises'));
   }

    public function search(Request $request)
    {
        $merchandises = Merchandise::select('merchandise_name')->KeywordSearch($request->keyword)->get();

        return view('index', compact('merchandises'));
    }

    public function show($item_id)
    {
        $profile = Auth::check() ? Auth::user()->profile: null;
        $merchandise = Merchandise::with('details', 'comments')->find($item_id);

        return view('item', compact('merchandise', 'profile'));
    }

    public function __construct()
    {
        $this->middleware(['auth'])->only(['like', 'unlike']);
    }

    public function like($id)
    {
        if(Auth::check())
        $profileId = Auth::user()->profile->id;
        Like::firstOrCreate([
            'merchandise_id' => $id,
            'profile_id' => $profileId,
        ]);

        return redirect()->back();
    }

    public function unlike($id)
    {
        if(Auth::check())
        $profileId = Auth::user()->profile->id;
        $like = Like::where('merchandise_id', $id)->where('profile_id',$profileId)->first()->delete();

        return redirect()->back();
    }

    public function reply(CommentRequest $request)
    {
        if(Auth::check())
        $profileId = Auth::user()->profile->id;
        $reply = Comment::create([
            'merchandise_id'=>$request->input('merchandise_id'),
            'profile_id'=>$profileId,
            'contact'=>$request->input('contact'),
        ]);

        return redirect()->back()->with('reply', $reply);
    }
}
