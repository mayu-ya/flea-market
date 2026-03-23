<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\Detail;;
use App\Models\Category;
use App\Models\Like;

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

    public function show($item)
    {
        $merchandise = Merchandise::with('details')->find($item);

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
