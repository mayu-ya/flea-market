<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Models\User;
use App\Models\Profile;
use App\Models\Merchandise;
use App\Models\Purchase;
use Stripe\StripeClient;

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
        $stripe = new StripeClient(config('services.stripe.secret'));

        $merchandise = Merchandise::where('id', '=', $item)->first();
        $form = $request->only('merchandise_id', 'profile_id', 'pay');

        $checkout = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card', 'konbini'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $merchandise->price,
                    'product_data' => [
                        'name' => $merchandise->merchandise_name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('purchase.success');
            'cancel_url' => route('purchase.cancel');
        ]);

        Purchase::create($form);

        return redirect('/')->with(compact('merchandise'));
    }
}
