<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function create(Request $request)
    {
        $form = $request->all();
        Merchandise::create($form);
        return redirect('/');
    }
}
