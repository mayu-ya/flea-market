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
        $merchandises = Merchandise::with('purchase')->get();

        return view('index', compact('merchandises'));
    }

    //public function tab_index(Request $request)
    //{
        //$query = $request->query('tab');
        //$merchandises = Merchandise::all();

        //return view('mylist', compact('merchandises', 'query'));
   //}

    public function search(Request $request)
    {
        $merchandises = Merchandise::select('merchandise_name')->KeywordSearch($request->keyword)->get();

        return view('index', compact('merchandises'));
    }

    public function show($id)
    {
        $profile = Auth::user()->profile;
        $merchandise = Merchandise::with('details', 'comments')->find($id);

        return view('item', compact('merchandise', 'profile'));
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

    public function reply(CommentRequest $request)
    {
        //$profile_id = Auth::user()->profile->id;
        
        //$input = $request->only('merchandise_id', 'contact');
        //if(is_array($input['merchandise_id'])){
            //$input['merchandise_id'] = $input['merchandise_id']['id'];
        //}
        //$input['profile_id'] = Auth::user()->profile->id;
        //dd($input);
        //$input += ['profile_id'=>$profile_id];
        //$reply = new Comment;
        //$reply->fill($input)->save();
        //$reply = Comment::create($input);

        $profileId = Auth::user()->profile->id;
        $reply = Comment::create([
            'merchandise_id'=>$request->input('merchandise_id'),
            'profile_id'=>$profileId,
            'contact'=>$request->input('contact'),
        ]);

        return redirect()->back()->with('reply', $reply);
    }
}
