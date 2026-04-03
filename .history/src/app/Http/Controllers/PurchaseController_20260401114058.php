<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Models\User;
use App\Models\Profile;
use App\Models\Merchandise;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index($item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();
        $profile = Profile::where('user_id', '=', Auth::id())->first();

        return view('purchase', compact('merchandise', 'profile'));
    }

    public function ajax()
    {
        $ajax_form = $request;

        return response()->json([
            'form' => view('')->with(['input_data' => $ajax_form])->render()
        ]);
    }

    public function create(PurchaseRequest $request, $item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();
        $form = $request->only('merchandise_id', 'profile_id', 'pay');
        Purchase::create($form);

        return redirect('/')->with(compact('merchandise'));
    }
}
