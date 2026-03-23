<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Merchandise;

class PurchaseController extends Controller
{
    public function index($item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();
        $profile = Profile::where('user_id', '=', Auth::id())->first();

        return view('purchase', compact('merchandise', 'profile'));
    }

    public function create(Request $request, $item)
    {
        $merchandise
    }
}
