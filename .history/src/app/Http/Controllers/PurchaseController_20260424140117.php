<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Models\User;
use App\Models\Profile;
use App\Models\Merchandise;
use App\Models\Purchase;
use Stripe\Stripe;
use Stripe\Charge;

class PurchaseController extends Controller
{
    public function index($item)
    {
        $merchandise = Merchandise::findOrFail($item);
        $profile = Profile::where('user_id', Auth::id())->first();

        return view('purchase', compact('merchandise', 'profile'));
    }

    public function ajax(Request $request)
    {
        $ajax_form = $request->input('ajax_select');

        return response()->json([
            'form' => view('pay')->with(['input_data' => $ajax_form])->render()
        ]);
    }

    //public function create(PurchaseRequest $request, $item)
    //{
        //$merchandise = Merchandise::where('id', '=', $item)->first();
        //$form = $request->only('merchandise_id', 'profile_id', 'pay');
        //Purchase::create($form);

        //return redirect('/')->with(compact('merchandise'));
    //}

    public function charge(PurchaseRequest $request, $item)
    {
        
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $merchandise = Merchandise::where('id', '=', $item)->first();
        $form = $request->only('merchandise_id', 'profile_id', 'pay');

        $charge = Charge::create(array(
            'amount' => $merchandise->price,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));

        Purchase::create($form);

        return redirect('/')->with(compact('merchandise'));
    }
}
