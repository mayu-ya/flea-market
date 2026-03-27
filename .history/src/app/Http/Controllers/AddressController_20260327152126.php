<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Merchandise;
use App\Models\Profile;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    public function index($item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();
        $profile = Profile::where('id', '=', Auth::id())->first();
        
        return view('address', compact('merchandise', 'profile'));
    }

    public function upsert(AddressRequest $request, $item)
    {
        $merchandise = Merchandise::where('id', '=', $item)->first();

        $profile = $request->only(['post_code', 'address', 'building']);
        $profile = Profile::updateOrCreate(
            ['user_id' => auth()->Id()],
            [
                'post_code' => $profile['post_code'],
                'address' => $profile['address'],
                'building' => $profile['building'],
            ]
        );

        return redirect()->route('purchase.index', ['item' => $merchandise->id])->with([
            'merchandise' => $merchandise,
            'profile' => $profile
        ]);
    }
}
